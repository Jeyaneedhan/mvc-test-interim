// Property Manager JavaScript Functions

// Modal Functions
function openAddPropertyModal() {
  document.getElementById("addPropertyModal").classList.add("active")
}

function closeAddPropertyModal() {
  document.getElementById("addPropertyModal").classList.remove("active")
  document.getElementById("addPropertyForm").reset()
}

function openAddTenantModal() {
  document.getElementById("addTenantModal").classList.add("active")
}

function closeAddTenantModal() {
  document.getElementById("addTenantModal").classList.remove("active")
  document.getElementById("addTenantForm").reset()
}

function openNewRequestModal() {
  // Implementation for new maintenance request modal
  console.log("Opening new maintenance request modal")
}

function openScheduleInspectionModal() {
  // Implementation for schedule inspection modal
  console.log("Opening schedule inspection modal")
}

function openReportIssueModal() {
  // Implementation for report issue modal
  console.log("Opening report issue modal")
}

function openAddProviderModal() {
  // Implementation for add provider modal
  console.log("Opening add provider modal")
}

function openAddAgreementModal() {
  // Implementation for add agreement modal
  console.log("Opening add agreement modal")
}

// Tab Functions
function showTab(tabName) {
  // Hide all tab contents
  const tabContents = document.querySelectorAll(".tab-content")
  tabContents.forEach((content) => content.classList.remove("active"))

  // Remove active class from all tab buttons
  const tabButtons = document.querySelectorAll(".tab-button")
  tabButtons.forEach((button) => button.classList.remove("active"))

  // Show selected tab content
  const targetTab = document.getElementById(tabName + "-tab")
  if (targetTab) {
    targetTab.classList.add("active")
  }

  // Add active class to clicked button
  if (event && event.target) {
    event.target.classList.add("active")
  }
}

function showMaintenanceTab(tabName) {
  showTab(tabName)
  // Additional maintenance-specific logic can be added here
}

function showInspectionTab(tabName) {
  showTab(tabName)
  // Additional inspection-specific logic can be added here
}

function showIssueTab(tabName) {
  showTab(tabName)
  // Additional issue-specific logic can be added here
}

function showLeaseTab(tabName) {
  showTab(tabName)
  // Additional lease-specific logic can be added here
}

// Search and Filter Functions
function initializeSearch() {
  const propertySearch = document.getElementById("propertySearch")
  const tenantSearch = document.getElementById("tenantSearch")
  const maintenanceSearch = document.getElementById("maintenanceSearch")
  const inspectionSearch = document.getElementById("inspectionSearch")
  const issueSearch = document.getElementById("issueSearch")
  const providerSearch = document.getElementById("providerSearch")
  const agreementSearch = document.getElementById("agreementSearch")
  const globalSearch = document.getElementById("globalSearch")
  const typeFilter = document.getElementById("typeFilter")

  if (propertySearch) {
    propertySearch.addEventListener("input", function () {
      filterTable(this.value, "property")
    })
  }

  if (tenantSearch) {
    tenantSearch.addEventListener("input", function () {
      filterTable(this.value, "tenant")
    })
  }

  if (maintenanceSearch) {
    maintenanceSearch.addEventListener("input", function () {
      filterTable(this.value, "maintenance")
    })
  }

  if (inspectionSearch) {
    inspectionSearch.addEventListener("input", function () {
      filterTable(this.value, "inspection")
    })
  }

  if (issueSearch) {
    issueSearch.addEventListener("input", function () {
      filterIssues(this.value)
    })
  }

  if (providerSearch) {
    providerSearch.addEventListener("input", function () {
      filterProviders(this.value)
    })
  }

  if (agreementSearch) {
    agreementSearch.addEventListener("input", function () {
      filterTable(this.value, "agreement")
    })
  }

  if (globalSearch) {
    globalSearch.addEventListener("input", function () {
      // Global search functionality can be implemented here
      console.log("Global search:", this.value)
    })
  }

  if (typeFilter) {
    typeFilter.addEventListener("change", function () {
      filterByType(this.value)
    })
  }
}

function filterTable(searchTerm, type) {
  const table = document.querySelector(".data-table tbody")
  if (!table) return

  const rows = table.querySelectorAll("tr")

  rows.forEach((row) => {
    const text = row.textContent.toLowerCase()
    if (text.includes(searchTerm.toLowerCase())) {
      row.style.display = ""
    } else {
      row.style.display = "none"
    }
  })
}

function filterByType(type) {
  const table = document.querySelector(".data-table tbody")
  if (!table) return

  const rows = table.querySelectorAll("tr")

  rows.forEach((row) => {
    if (type === "" || row.cells[2].textContent.toLowerCase() === type.toLowerCase()) {
      row.style.display = ""
    } else {
      row.style.display = "none"
    }
  })
}

function filterIssues(searchTerm) {
  const issueCards = document.querySelectorAll(".issue-card")

  issueCards.forEach((card) => {
    const text = card.textContent.toLowerCase()
    if (text.includes(searchTerm.toLowerCase())) {
      card.style.display = ""
    } else {
      card.style.display = "none"
    }
  })
}

function filterProviders(searchTerm) {
  const providerCards = document.querySelectorAll(".provider-card")

  providerCards.forEach((card) => {
    const text = card.textContent.toLowerCase()
    if (text.includes(searchTerm.toLowerCase())) {
      card.style.display = ""
    } else {
      card.style.display = "none"
    }
  })
}

function selectIssue(issueId) {
  // Remove selected class from all issue cards
  const issueCards = document.querySelectorAll(".issue-card")
  issueCards.forEach((card) => card.classList.remove("selected"))

  // Add selected class to clicked card
  event.target.closest(".issue-card").classList.add("selected")

  // Update issue details panel
  updateIssueDetails(issueId)
}

function selectAgreement(agreementId) {
  // Remove selected class from all agreement rows
  const agreementRows = document.querySelectorAll(".agreement-row")
  agreementRows.forEach((row) => row.classList.remove("selected"))

  // Add selected class to clicked row
  event.target.closest(".agreement-row").classList.add("selected")

  // Update agreement details panel
  updateAgreementDetails(agreementId)
}

function updateIssueDetails(issueId) {
  // Implementation for updating issue details panel
  console.log("Updating issue details for:", issueId)
}

function updateAgreementDetails(agreementId) {
  // Implementation for updating agreement details panel
  console.log("Updating agreement details for:", agreementId)
}

// Form Submission Handlers
function handleAddPropertyForm() {
  const form = document.getElementById("addPropertyForm")
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault()

      // Get form data
      const formData = new FormData(this)
      const propertyData = Object.fromEntries(formData)

      // Basic validation
      if (
        !propertyData.propertyName ||
        !propertyData.propertyAddress ||
        !propertyData.propertyType ||
        !propertyData.propertyUnits
      ) {
        showNotification("Please fill in all required fields.", "error")
        return
      }

      // Here you would typically send the data to the server
      console.log("Property Data:", propertyData)

      // Show success message
      showNotification("Property added successfully!", "success")

      // Close modal and reset form
      closeAddPropertyModal()
    })
  }
}

function handleAddTenantForm() {
  const form = document.getElementById("addTenantForm")
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault()

      // Get form data
      const formData = new FormData(this)
      const tenantData = Object.fromEntries(formData)

      // Basic validation
      if (
        !tenantData.tenantFullName ||
        !tenantData.tenantEmail ||
        !tenantData.tenantPhone ||
        !tenantData.tenantProperty
      ) {
        showNotification("Please fill in all required fields.", "error")
        return
      }

      // Email validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
      if (!emailRegex.test(tenantData.tenantEmail)) {
        showNotification("Please enter a valid email address.", "error")
        return
      }

      // Here you would typically send the data to the server
      console.log("Tenant Data:", tenantData)

      // Show success message
      showNotification("Tenant added successfully!", "success")

      // Close modal and reset form
      closeAddTenantModal()
    })
  }
}

function showNotification(message, type = "info") {
  // Create notification element
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.textContent = message

  // Add to page
  document.body.appendChild(notification)

  // Remove after 3 seconds
  setTimeout(() => {
    notification.remove()
  }, 3000)
}

function initializeDropdowns() {
  const languageToggle = document.getElementById("languageToggle")
  const languageDropdown = document.getElementById("languageDropdown")
  const userMenuToggle = document.getElementById("userMenuToggle")
  const userDropdown = document.getElementById("userDropdown")

  if (languageToggle && languageDropdown) {
    languageToggle.addEventListener("click", (e) => {
      e.stopPropagation()
      languageDropdown.classList.toggle("active")
      if (userDropdown) userDropdown.classList.remove("active")
    })
  }

  if (userMenuToggle && userDropdown) {
    userMenuToggle.addEventListener("click", (e) => {
      e.stopPropagation()
      userDropdown.classList.toggle("active")
      if (languageDropdown) languageDropdown.classList.remove("active")
    })
  }

  // Close dropdowns when clicking outside
  document.addEventListener("click", () => {
    if (languageDropdown) languageDropdown.classList.remove("active")
    if (userDropdown) userDropdown.classList.remove("active")
  })
}

// Close modals when clicking outside
function initializeModalHandlers() {
  const modals = document.querySelectorAll(".modal")

  modals.forEach((modal) => {
    modal.addEventListener("click", function (e) {
      if (e.target === this) {
        this.classList.remove("active")
      }
    })
  })

  // Close modals with Escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      const activeModal = document.querySelector(".modal.active")
      if (activeModal) {
        activeModal.classList.remove("active")
      }
    }
  })
}

// Initialize all functions when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  initializeSearch()
  handleAddPropertyForm()
  handleAddTenantForm()
  initializeModalHandlers()
  initializeDropdowns()
})
