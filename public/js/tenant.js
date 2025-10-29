// Tenant Dashboard JavaScript - Complete
document.addEventListener("DOMContentLoaded", () => {
  // Sidebar toggle functionality
  const sidebarToggle = document.getElementById("sidebarToggle")
  const mobileMenuToggle = document.getElementById("mobileMenuToggle")
  const sidebar = document.getElementById("sidebar")

  // Desktop sidebar toggle
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed")
    })
  }

  // Mobile sidebar toggle
  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("open")
    })
  }

  // Close sidebar when clicking outside on mobile
  document.addEventListener("click", (event) => {
    if (window.innerWidth <= 1024) {
      if (!sidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
        sidebar.classList.remove("open")
      }
    }
  })

  // User dropdown functionality
  const userMenuToggle = document.getElementById("userMenuToggle")
  const userDropdown = document.getElementById("userDropdown")

  if (userMenuToggle && userDropdown) {
    userMenuToggle.addEventListener("click", (e) => {
      e.preventDefault()
      userDropdown.style.display = userDropdown.style.display === "block" ? "none" : "block"
    })

    // Close dropdown when clicking outside
    document.addEventListener("click", (event) => {
      if (!userMenuToggle.contains(event.target)) {
        userDropdown.style.display = "none"
      }
    })
  }

  // Responsive sidebar handling
  function handleResize() {
    if (window.innerWidth > 1024) {
      sidebar.classList.remove("open")
    }
  }

  window.addEventListener("resize", handleResize)

  // Form validation enhancement
  const forms = document.querySelectorAll("form")
  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      const requiredFields = form.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          field.classList.add("error")
          isValid = false
        } else {
          field.classList.remove("error")
        }
      })

      if (!isValid) {
        e.preventDefault()
        showNotification("Please fill in all required fields.", "error")
      }
    })
  })

  // Add focus states for better accessibility
  document.querySelectorAll("input, select, textarea").forEach((field) => {
    field.addEventListener("focus", function () {
      this.parentElement.classList.add("focused")
    })

    field.addEventListener("blur", function () {
      this.parentElement.classList.remove("focused")
    })
  })
})

// Property Search Functions
function reserveProperty(propertyId) {
  const modal = document.getElementById('reservationModal')
  const modalBody = document.getElementById('modalBody')
  
  if (!modal || !modalBody) return
  
  // Find property data
  const propertyCard = document.querySelector(`[onclick="reserveProperty(${propertyId})"]`)?.closest('.property-card')
  if (!propertyCard) return
  
  const title = propertyCard.querySelector('.property-title')?.textContent || 'Property'
  const price = propertyCard.querySelector('.property-price')?.textContent || '$0/mo'
  
  modalBody.innerHTML = `
    <div class="text-center">
      <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: var(--warning-color); margin-bottom: 1rem;"></i>
      <h4 style="margin-bottom: 1rem;">Reservation Confirmation</h4>
      <p style="margin-bottom: 0.5rem;"><strong>Property:</strong> ${title}</p>
      <p style="margin-bottom: 1.5rem;"><strong>Monthly Rent:</strong> ${price}</p>
      <div style="background-color: #fef3c7; border: 1px solid #fbbf24; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1.5rem;">
        <p style="color: #92400e; font-size: 0.875rem; margin: 0;">
          Your reservation will be held for 48 hours. Please visit our office to complete the rental agreement.
        </p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="btn btn-secondary" onclick="closeModal()">Cancel</button>
      <button class="btn btn-primary" onclick="confirmReservation(${propertyId})">Confirm Reservation</button>
    </div>
  `
  
  modal.classList.remove('hidden')
}

function closeModal() {
  const modal = document.getElementById('reservationModal')
  if (modal) {
    modal.classList.add('hidden')
  }
}

function confirmReservation(propertyId) {
  showNotification('Reservation confirmed! You will receive a confirmation email shortly.', 'success')
  closeModal()
}

// Property Filter Functions
function filterProperties() {
  const location = document.getElementById('locationFilter')?.value.toLowerCase() || ''
  const minPrice = parseInt(document.getElementById('minPriceFilter')?.value) || 0
  const maxPrice = parseInt(document.getElementById('maxPriceFilter')?.value) || 999999
  const type = document.getElementById('typeFilter')?.value || ''
  
  const properties = document.querySelectorAll('.property-card')
  let visibleCount = 0
  
  properties.forEach(property => {
    const propLocation = property.dataset.location || ''
    const propType = property.dataset.type || ''
    const propPrice = parseInt(property.dataset.price) || 0
    
    const matchesLocation = !location || propLocation.includes(location)
    const matchesPrice = propPrice >= minPrice && propPrice <= maxPrice
    const matchesType = !type || propType === type
    
    if (matchesLocation && matchesPrice && matchesType) {
      property.style.display = 'block'
      visibleCount++
    } else {
      property.style.display = 'none'
    }
  })
  
  const resultHeader = document.querySelector('.section-header h3')
  if (resultHeader) {
    resultHeader.textContent = `${visibleCount} Properties Found`
  }
}

// Payment Functions
let paymentStatus = 'idle'

function togglePaymentFields() {
  const method = document.getElementById('paymentMethod')?.value
  const cardFields = document.getElementById('cardFields')
  
  if (cardFields) {
    cardFields.style.display = method === 'card' ? 'block' : 'none'
  }
}

function processPayment(event) {
  if (event) event.preventDefault()
  
  if (paymentStatus === 'processing') return
  
  paymentStatus = 'processing'
  const payButton = document.getElementById('payButton')
  
  if (payButton) {
    payButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing Payment...'
    payButton.disabled = true
    payButton.classList.add('processing')
  }
  
  // Simulate payment processing
  setTimeout(() => {
    paymentStatus = 'success'
    const paymentForm = document.getElementById('paymentForm')
    const paymentSuccess = document.getElementById('paymentSuccess')
    
    if (paymentForm) paymentForm.classList.add('hidden')
    if (paymentSuccess) paymentSuccess.classList.remove('hidden')
    
    // Update rent status
    const statusBadge = document.querySelector('.status-badge.due')
    if (statusBadge) {
      statusBadge.textContent = 'Paid'
      statusBadge.className = 'status-badge paid'
    }
    
    showNotification('Payment processed successfully!', 'success')
  }, 3000)
}

// Review Functions
let currentRating = 0
let submitStatus = 'idle'

function openReviewModal(propertyName, location) {
  const modal = document.getElementById('reviewModal')
  const modalPropertyName = document.getElementById('modalPropertyName')
  const modalPropertyLocation = document.getElementById('modalPropertyLocation')
  
  if (modal && modalPropertyName && modalPropertyLocation) {
    modalPropertyName.textContent = propertyName
    modalPropertyLocation.textContent = location
    modal.classList.remove('hidden')
    currentRating = 0
    updateStarDisplay()
    updateSubmitButton()
  }
}

function closeReviewModal() {
  const modal = document.getElementById('reviewModal')
  const reviewComment = document.getElementById('reviewComment')
  
  if (modal) modal.classList.add('hidden')
  if (reviewComment) reviewComment.value = ''
  
  currentRating = 0
  updateStarDisplay()
}

function setRating(rating) {
  currentRating = rating
  updateStarDisplay()
  updateSubmitButton()
}

function updateStarDisplay() {
  const stars = document.querySelectorAll('.star-btn')
  stars.forEach((star, index) => {
    if (index < currentRating) {
      star.classList.remove('text-muted-foreground')
      star.classList.add('text-warning')
    } else {
      star.classList.remove('text-warning')
      star.classList.add('text-muted-foreground')
    }
  })
}

function updateSubmitButton() {
  const submitBtn = document.getElementById('submitReviewBtn')
  if (submitBtn) {
    if (currentRating > 0) {
      submitBtn.disabled = false
      submitBtn.classList.remove('opacity-50', 'cursor-not-allowed')
    } else {
      submitBtn.disabled = true
      submitBtn.classList.add('opacity-50', 'cursor-not-allowed')
    }
  }
}

function submitReview() {
  if (currentRating === 0 || submitStatus === 'submitting') return
  
  submitStatus = 'submitting'
  const submitBtn = document.getElementById('submitReviewBtn')
  
  if (submitBtn) {
    submitBtn.textContent = 'Submitting...'
    submitBtn.disabled = true
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed')
  }
  
  // Simulate submission
  setTimeout(() => {
    submitStatus = 'idle'
    closeReviewModal()
    showNotification('Review submitted successfully!', 'success')
    
    // Reset button
    if (submitBtn) {
      submitBtn.textContent = 'Submit Review'
    }
  }, 2000)
}

// Issue Tracking Functions
function viewIssue(id, title, status, priority, description, createdAt) {
  const modal = document.getElementById('issueModal')
  const modalContent = document.getElementById('modalContent')
  
  if (!modal || !modalContent) return
  
  const priorityBadge = priority === 'high' ? 
    '<span class="status-badge bg-destructive text-destructive-foreground">High</span>' :
    priority === 'medium' ? 
    '<span class="status-badge bg-warning-light text-warning">Medium</span>' :
    '<span class="status-badge bg-success-light text-success">Low</span>'
  
  const statusBadge = status === 'in_progress' ? 
    '<span class="status-badge bg-info-light text-info">In Progress</span>' :
    status === 'resolved' ? 
    '<span class="status-badge bg-success-light text-success">Resolved</span>' :
    '<span class="status-badge bg-warning-light text-warning">Pending</span>'
  
  modalContent.innerHTML = `
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
      <div>
        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Issue ID</label>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin: 0;">${id}</p>
      </div>
      <div>
        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Property</label>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin: 0;">Oak Street Apartment</p>
      </div>
      <div>
        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Category</label>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin: 0;">${title}</p>
      </div>
      <div>
        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Priority</label>
        <div style="margin-top: 0.25rem;">${priorityBadge}</div>
      </div>
      <div>
        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Status</label>
        <div style="margin-top: 0.25rem;">${statusBadge}</div>
      </div>
      <div>
        <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Report Date</label>
        <p style="font-size: 0.875rem; color: var(--text-muted); margin: 0;">${new Date(createdAt).toLocaleDateString()}</p>
      </div>
    </div>
    <div style="margin-bottom: 1rem;">
      <label style="display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.25rem;">Description</label>
      <p style="font-size: 0.875rem; color: var(--text-muted); margin: 0;">${description}</p>
    </div>
  `
  
  modal.classList.remove('hidden')
}

function closeIssueModal() {
  const modal = document.getElementById('issueModal')
  if (modal) {
    modal.classList.add('hidden')
  }
}

// Issue Reporting Functions
let selectedImages = []
let issueSubmitStatus = 'idle'

function updateImagePreview() {
  const preview = document.getElementById('imagePreview')
  if (!preview) return
  
  if (selectedImages.length === 0) {
    preview.classList.add('hidden')
    return
  }
  
  preview.classList.remove('hidden')
  preview.innerHTML = ''
  
  selectedImages.forEach((image, index) => {
    const div = document.createElement('div')
    div.className = 'relative'
    div.innerHTML = `
      <img src="${URL.createObjectURL(image)}" alt="Upload ${index + 1}" style="width: 100%; height: 96px; object-fit: cover; border-radius: 0.5rem;">
      <button type="button" onclick="removeImage(${index})" style="position: absolute; top: -8px; right: -8px; width: 24px; height: 24px; background: var(--danger-color); color: white; border-radius: 50%; border: none; cursor: pointer; font-size: 12px;">×</button>
    `
    preview.appendChild(div)
  })
}

function removeImage(index) {
  selectedImages.splice(index, 1)
  updateImagePreview()
}

function submitIssue(e) {
  if (e) e.preventDefault()
  if (issueSubmitStatus === 'submitting') return
  
  issueSubmitStatus = 'submitting'
  const submitBtn = document.getElementById('submitBtn')
  
  if (submitBtn) {
    submitBtn.textContent = 'Submitting...'
    submitBtn.disabled = true
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed')
  }
  
  // Simulate submission
  setTimeout(() => {
    issueSubmitStatus = 'success'
    const issueForm = document.getElementById('issueForm')
    const successMessage = document.getElementById('successMessage')
    
    if (issueForm) issueForm.classList.add('hidden')
    if (successMessage) successMessage.classList.remove('hidden')
    
    // Reset form
    const form = document.querySelector('form')
    if (form) form.reset()
    selectedImages = []
    updateImagePreview()
    
    showNotification('Issue reported successfully!', 'success')
  }, 2000)
}

function reportAnother() {
  issueSubmitStatus = 'idle'
  const issueForm = document.getElementById('issueForm')
  const successMessage = document.getElementById('successMessage')
  
  if (issueForm) issueForm.classList.remove('hidden')
  if (successMessage) successMessage.classList.add('hidden')
  
  const submitBtn = document.getElementById('submitBtn')
  if (submitBtn) {
    submitBtn.textContent = 'Report Issue'
    submitBtn.disabled = false}
  }