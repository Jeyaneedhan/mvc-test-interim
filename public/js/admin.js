// Admin Dashboard JavaScript - Complete Updated Version with Financial Management
document.addEventListener("DOMContentLoaded", () => {
  // Sidebar toggle functionality
  const sidebarToggle = document.getElementById("sidebarToggle")
  const mobileMenuToggle = document.getElementById("mobileMenuToggle")
  const sidebar = document.getElementById("sidebar")

  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed")
    })
  }

  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("mobile-open")
    })
  }

  // Close mobile menu when clicking outside
  document.addEventListener("click", (e) => {
    if (window.innerWidth <= 768) {
      if (!sidebar.contains(e.target) && !mobileMenuToggle?.contains(e.target)) {
        sidebar.classList.remove("mobile-open")
      }
    }
  })

  // Table row selection
  const selectAllCheckbox = document.querySelector(".select-all")
  const rowCheckboxes = document.querySelectorAll(".row-select")

  if (selectAllCheckbox) {
    selectAllCheckbox.addEventListener("change", function () {
      rowCheckboxes.forEach((checkbox) => {
        checkbox.checked = this.checked
      })
    })
  }

  // Individual row selection
  rowCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      const checkedCount = document.querySelectorAll(".row-select:checked").length
      const totalCount = rowCheckboxes.length

      if (selectAllCheckbox) {
        selectAllCheckbox.checked = checkedCount === totalCount
        selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < totalCount
      }
    })
  })

  // Initialize specific modules
  initializeManagerManagement()
  initializePropertiesManagement()
  initializeFinancialManagement()
  initializeUI()
})

// Tab Switching Function - Global scope for onclick handlers
function switchTab(tabName) {
  // Hide all tab contents
  const allTabs = document.querySelectorAll('.tab-content')
  allTabs.forEach(tab => {
    tab.classList.remove('active')
  })

  // Remove active class from all tab buttons
  const allButtons = document.querySelectorAll('.tab-btn')
  allButtons.forEach(btn => {
    btn.classList.remove('active')
  })

  // Show selected tab content
  const selectedTab = document.getElementById(tabName + '-tab')
  if (selectedTab) {
    selectedTab.classList.add('active')
  }

  // Add active class to clicked button
  const clickedButton = document.getElementById(tabName + '-btn')
  if (clickedButton) {
    clickedButton.classList.add('active')
  }

  console.log('Switched to tab:', tabName)
}

// Manager Management Functions
function initializeManagerManagement() {
  // Search functionality for managers
  const searchInput = document.getElementById('searchManagers')
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase()
      const rows = document.querySelectorAll('.managers-table tbody tr')
      
      rows.forEach(row => {
        const text = row.textContent.toLowerCase()
        row.style.display = text.includes(searchTerm) ? '' : 'none'
      })
    })
  }

  // Filter functionality for managers
  const filterDropdown = document.getElementById('filterManagers')
  if (filterDropdown) {
    filterDropdown.addEventListener('change', function() {
      const filterValue = this.value.toLowerCase()
      const rows = document.querySelectorAll('.managers-table tbody tr')
      
      rows.forEach(row => {
        if (filterValue === '') {
          row.style.display = ''
        } else {
          const statusSpan = row.querySelector('[class*="status-"]')
          if (statusSpan) {
            const status = statusSpan.textContent.toLowerCase()
            row.style.display = status.includes(filterValue) ? '' : 'none'
          }
        }
      })
    })
  }
}

// Manager Action Functions - Global scope for onclick handlers

function approveManager(managerId) {
  if (confirm('Are you sure you want to approve this manager application?')) {
    const row = event.target.closest('tr')
    const statusCell = row.querySelector('[class*="status-"]')
    const actionsCell = row.querySelector('td:last-child')
    
    // Update status
    statusCell.textContent = 'Approved'
    statusCell.className = 'status-approved'
    
    // Update actions
    actionsCell.innerHTML = `
      <div class="action-buttons">
        <button class="action-btn view-btn" onclick="viewManager('${managerId}')">View</button>
      </div>
    `
    
    showNotification('Manager approved successfully!', 'success')
    updateManagerStats()
  }
}


function rejectManager(managerId) {
  if (confirm('Are you sure you want to reject this manager application?')) {
    const row = event.target.closest('tr')
    const statusCell = row.querySelector('[class*="status-"]')
    const actionsCell = row.querySelector('td:last-child')
    
    // Update status
    statusCell.textContent = 'Rejected'
    statusCell.className = 'status-rejected'
    
    // Update actions
    actionsCell.innerHTML = `
      <div class="action-buttons">
        <button class="action-btn reject-btn" onclick="removeManager('${managerId}')">Remove</button>
      </div>
    `
    
    showNotification('Manager application rejected.', 'warning')
    updateManagerStats()
  }
}

function viewManager(managerId) {
  console.log('Viewing manager:', managerId)
  showNotification('Opening manager details...', 'info')
  // Here you would typically open a modal or navigate to a details page
}

function removeManager(managerId) {
  if (confirm('Are you sure you want to remove this manager? This action cannot be undone.')) {
    const row = event.target.closest('tr')
    row.remove()
    
    updateManagerStats()
    showNotification('Manager removed successfully!', 'info')
  }
}

function addManager() {
  showNotification('Add Manager functionality to be implemented', 'info')
  // Here you would open a modal or navigate to add manager page
}

function manageAssignments(managerId) {
  console.log('Managing assignments for:', managerId)
  showNotification('Opening assignment manager...', 'info')
  // Here you would open assignment management interface
}

// Property Assignment Functions - Global scope for onclick handlers
function openAssignModal() {
  console.log('Opening assign property modal')
  showNotification('Opening property assignment interface...', 'info')
  // Here you would open a modal to assign properties to managers
  // This could show available properties and approved managers for selection
}

function unassignProperty(assignmentId) {
  if (confirm('Are you sure you want to unassign this property from the manager?')) {
    const row = event.target.closest('tr')
    row.remove()
    
    // Update assignment count
    updateAssignmentCount()
    showNotification('Property unassigned successfully!', 'success')
  }
}

function updateAssignmentCount() {
  const rows = document.querySelectorAll('.assignments-table tbody tr')
  const assignmentCount = rows.length
  
  // Update assignments title
  const assignmentsTitle = document.querySelector('.assignments-title')
  if (assignmentsTitle) {
    assignmentsTitle.textContent = `Current Property Assignments (${assignmentCount})`
  }
  
  // Update the stat card for Property Assignments
  const statCards = document.querySelectorAll('.stat-card')
  if (statCards.length >= 4) {
    const assignmentStatCard = statCards[3]
    const statNumber = assignmentStatCard.querySelector('.stat-number')
    if (statNumber) {
      statNumber.textContent = assignmentCount
    }
  }
}

function updateManagerStats() {
  const rows = document.querySelectorAll('.managers-table tbody tr')
  const totalManagers = rows.length
  
  let pendingCount = 0
  let approvedCount = 0
  
  rows.forEach(row => {
    const statusElement = row.querySelector('[class*="status-"]')
    if (statusElement) {
      const status = statusElement.textContent.toLowerCase()
      if (status === 'pending') pendingCount++
      if (status === 'approved') approvedCount++
    }
  })
  
  // Update stat cards
  const statCards = document.querySelectorAll('.stat-card')
  if (statCards.length >= 4) {
    // Total Managers
    const totalStatNumber = statCards[0].querySelector('.stat-number')
    if (totalStatNumber) totalStatNumber.textContent = totalManagers
    
    // Pending
    const pendingStatNumber = statCards[1].querySelector('.stat-number')
    if (pendingStatNumber) pendingStatNumber.textContent = pendingCount
    
    // Approved
    const approvedStatNumber = statCards[2].querySelector('.stat-number')
    if (approvedStatNumber) approvedStatNumber.textContent = approvedCount
  }
  
  // Update table title
  const tableTitle = document.querySelector('.table-title')
  if (tableTitle && tableTitle.textContent.includes('Manager Applications')) {
    tableTitle.textContent = `Manager Applications (${totalManagers})`
  }
}

// Properties Management Functions
function initializePropertiesManagement() {
  // Search functionality
  const searchInput = document.getElementById('searchProperties')
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase()
      const rows = document.querySelectorAll('.data-table tbody tr')
      
      rows.forEach(row => {
        const text = row.textContent.toLowerCase()
        row.style.display = text.includes(searchTerm) ? '' : 'none'
      })
    })
  }

  // Filter functionality
  const filterDropdown = document.getElementById('filterProperties')
  if (filterDropdown) {
    filterDropdown.addEventListener('change', function() {
      const filterValue = this.value.toLowerCase()
      const rows = document.querySelectorAll('.data-table tbody tr')
      
      rows.forEach(row => {
        if (filterValue === '') {
          row.style.display = ''
        } else {
          const statusBadge = row.querySelector('.status-badge')
          if (statusBadge) {
            const status = statusBadge.textContent.toLowerCase()
            row.style.display = status.includes(filterValue) ? '' : 'none'
          }
        }
      })
    })
  }
}

// Property Action Functions - Global scope for onclick handlers
function approveProperty(propertyId) {
  if (confirm('Are you sure you want to approve this property?')) {
    // Find the row and update status
    const row = event.target.closest('tr')
    const statusCell = row.querySelector('.status-badge')
    const actionsCell = row.querySelector('.property-actions')
    
    // Update status
    statusCell.textContent = 'Approved'
    statusCell.className = 'status-badge approved'
    
    // Update actions - only show remove button for approved properties
    actionsCell.innerHTML = `
      <button class="btn btn-sm btn-danger" title="Remove" onclick="removeProperty('${propertyId}')">
        Remove
      </button>
    `
    
    showNotification('Property approved successfully!', 'success')
    
    // Update property count if needed
    updatePropertyCount()
  }
}

function rejectProperty(propertyId) {
  if (confirm('Are you sure you want to reject this property?')) {
    // Find the row and update status
    const row = event.target.closest('tr')
    const statusCell = row.querySelector('.status-badge')
    const actionsCell = row.querySelector('.property-actions')
    
    // Update status
    statusCell.textContent = 'Rejected'
    statusCell.className = 'status-badge rejected'
    
    // Update actions - only show remove button for rejected properties
    actionsCell.innerHTML = `
      <button class="btn btn-sm btn-danger" title="Remove" onclick="removeProperty('${propertyId}')">
        Remove
      </button>
    `
    
    showNotification('Property rejected successfully!', 'warning')
    
    // Update property count if needed
    updatePropertyCount()
  }
}

function removeProperty(propertyId) {
  if (confirm('Are you sure you want to remove this property? This action cannot be undone.')) {
    // Remove the row
    const row = event.target.closest('tr')
    row.remove()
    
    // Update property count
    const header = document.querySelector('.section-header h3')
    if (header) {
      const currentCount = parseInt(header.textContent.match(/\d+/)?.[0] || 0)
      header.textContent = `Property Listings (${Math.max(0, currentCount - 1)})`
    }
    
    showNotification('Property removed successfully!', 'info')
  }
}

// Helper function to update property counts
function updatePropertyCount() {
  const rows = document.querySelectorAll('.data-table tbody tr')
  const totalCount = rows.length
  
  const header = document.querySelector('.section-header h3')
  if (header) {
    header.textContent = `Property Listings (${totalCount})`
  }
}

// Financial Management Functions
function initializeFinancialManagement() {
  // Basic initialization for financial management
  console.log('Financial management initialized')
}

// Transaction Management Functions - Global scope for onclick handlers
function viewTransaction(transactionId) {
  console.log('Viewing transaction:', transactionId)
  const modal = document.getElementById('transactionModal')
  const modalContent = document.getElementById('transactionModalContent')

  if (!modal || !modalContent) {
    showNotification('Transaction details modal not found', 'error')
    return
  }

  // Get transaction data from the row
  const transactionRow = Array.from(document.querySelectorAll('.transactions-table tbody tr')).find(row => {
    return row.innerHTML.includes(transactionId)
  })

  let transactionData = {
    id: transactionId,
    type: 'Monthly Rent Payment',
    amount: '$2,500.00',
    status: 'Approved',
    property: 'Luxury Apartment Downtown',
    tenant: 'John Doe',
    date: 'January 7, 2024',
    paymentMethod: 'Credit Card'
  }

  if (transactionRow) {
    const typeElement = transactionRow.querySelector('.type-label')
    const descElement = transactionRow.querySelector('.description-title')
    const propertyElement = transactionRow.querySelector('.property-name')
    const amountElement = transactionRow.querySelector('.amount-display')
    const statusElement = transactionRow.querySelector('.status-badge')
    const dateElement = transactionRow.cells[4]

    transactionData = {
      id: transactionId,
      type: descElement?.textContent || 'Payment',
      amount: amountElement?.textContent || '$0.00',
      status: statusElement?.textContent || 'Unknown',
      property: propertyElement?.textContent || 'Property',
      tenant: 'John Doe', // This would come from backend
      date: dateElement?.textContent || new Date().toLocaleDateString(),
      paymentMethod: 'Credit Card' // This would come from backend
    }
  }

  // Simulate transaction details
  modalContent.innerHTML = `
    <div class="transaction-details">
      <div class="detail-grid">
        <div class="detail-item">
          <label>Transaction ID</label>
          <span>${transactionData.id}</span>
        </div>
        <div class="detail-item">
          <label>Type</label>
          <span>${transactionData.type}</span>
        </div>
        <div class="detail-item">
          <label>Amount</label>
          <span class="amount-large">${transactionData.amount}</span>
        </div>
        <div class="detail-item">
          <label>Status</label>
          <span class="status-badge ${transactionData.status.toLowerCase()}">${transactionData.status}</span>
        </div>
        <div class="detail-item">
          <label>Property</label>
          <span>${transactionData.property}</span>
        </div>
        <div class="detail-item">
          <label>Tenant</label>
          <span>${transactionData.tenant}</span>
        </div>
        <div class="detail-item">
          <label>Date</label>
          <span>${transactionData.date}</span>
        </div>
        <div class="detail-item">
          <label>Payment Method</label>
          <span>${transactionData.paymentMethod}</span>
        </div>
      </div>
      <div class="detail-notes">
        <label>Notes</label>
        <p>Regular monthly transaction processed successfully.</p>
      </div>
      <div class="modal-actions">
        <button class="btn btn-primary" onclick="closeTransactionModal()">Close</button>
      </div>
    </div>
  `

  modal.classList.remove('hidden')
}

function closeTransactionModal() {
  const modal = document.getElementById('transactionModal')
  if (modal) {
    modal.classList.add('hidden')
  }
}

function approveTransaction(transactionId) {
  if (confirm('Are you sure you want to approve this transaction?')) {
    const row = event.target.closest('tr')
    const statusCell = row.querySelector('.status-badge')
    const actionsCell = row.querySelector('.transaction-actions')

    // Update status
    statusCell.textContent = 'Approved'
    statusCell.className = 'status-badge approved'

    // Update actions - remove approve/reject, keep view only
    actionsCell.innerHTML = `
      <button class="action-btn view-btn" onclick="viewTransaction('${transactionId}')" title="View">
        <i class="fas fa-eye"></i>
      </button>
    `

    showNotification('Transaction approved successfully!', 'success')
    updateFinancialStats()
  }
}

function rejectTransaction(transactionId) {
  if (confirm('Are you sure you want to reject this transaction?')) {
    const row = event.target.closest('tr')
    const statusCell = row.querySelector('.status-badge')
    const actionsCell = row.querySelector('.transaction-actions')

    // Update status
    statusCell.textContent = 'Rejected'
    statusCell.className = 'status-badge rejected'

    // Update actions - keep view only
    actionsCell.innerHTML = `
      <button class="action-btn view-btn" onclick="viewTransaction('${transactionId}')" title="View">
        <i class="fas fa-eye"></i>
      </button>
    `

    showNotification('Transaction rejected.', 'warning')
    updateFinancialStats()
  }
}

function updateFinancialStats() {
  const rows = document.querySelectorAll('.transactions-table tbody tr')
  
  let totalRevenue = 0
  let collectedAmount = 0
  let pendingAmount = 0
  let overdueAmount = 0

  rows.forEach(row => {
    if (row.style.display === 'none') return // Skip hidden rows
    
    const amountElement = row.querySelector('.amount-display')
    const statusElement = row.querySelector('.status-badge')
    const typeData = row.dataset.type || ''
    
    if (!amountElement || !statusElement) return
    
    const amountText = amountElement.textContent.replace(/[$,]/g, '')
    const amount = parseFloat(amountText) || 0
    const status = statusElement.textContent.toLowerCase()

    if (typeData === 'income') {
      totalRevenue += amount
      if (status === 'approved') {
        collectedAmount += amount
      } else if (status === 'pending') {
        pendingAmount += amount
      }
    }
  })

  // Update stat cards
  const statCards = document.querySelectorAll('.stat-card')
  if (statCards.length >= 4) {
    const totalStatNumber = statCards[0].querySelector('.stat-number')
    const collectedStatNumber = statCards[1].querySelector('.stat-number')
    const pendingStatNumber = statCards[2].querySelector('.stat-number')
    const overdueStatNumber = statCards[3].querySelector('.stat-number')

    if (totalStatNumber) totalStatNumber.textContent = `${totalRevenue.toLocaleString()}`
    if (collectedStatNumber) collectedStatNumber.textContent = `${collectedAmount.toLocaleString()}`
    if (pendingStatNumber) pendingStatNumber.textContent = `${pendingAmount.toLocaleString()}`
    if (overdueStatNumber) overdueStatNumber.textContent = `${overdueAmount.toLocaleString()}`
  }
}

// General Action handlers for other admin pages
function handleApprove(button) {
  const row = button.closest("tr")
  const propertyId = row.querySelector("td:first-child")?.textContent || 'Unknown'

  if (confirm(`Are you sure you want to approve item ${propertyId}?`)) {
    // Update status badge
    const statusBadge = row.querySelector(".status-badge")
    if (statusBadge) {
      statusBadge.textContent = "Approved"
      statusBadge.className = "status-badge approved"
    }

    // Update action buttons
    const actionButtons = row.querySelector(".action-buttons")
    if (actionButtons) {
      actionButtons.innerHTML = `
        <button class="btn btn-sm btn-primary" title="View">
          <i class="fas fa-eye"></i>
        </button>
        <button class="btn btn-sm btn-secondary" title="Edit">
          <i class="fas fa-edit"></i>
        </button>
      `
    }

    showNotification("Item approved successfully!", "success")
  }
}

function handleReject(button) {
  const row = button.closest("tr")
  const itemId = row.querySelector("td:first-child")?.textContent || 'Unknown'

  if (confirm(`Are you sure you want to reject item ${itemId}?`)) {
    const statusBadge = row.querySelector(".status-badge")
    if (statusBadge) {
      statusBadge.textContent = "Rejected"
      statusBadge.className = "status-badge rejected"
    }

    showNotification("Item rejected successfully!", "warning")
  }
}

function handleView(button) {
  const row = button.closest("tr")
  const itemId = row.querySelector("td:first-child")?.textContent || 'Unknown'

  // Open details modal or navigate to details page
  console.log("Viewing item:", itemId)
  showNotification("Opening item details...", "info")
}

function handleEdit(button) {
  const row = button.closest("tr")
  const itemId = row.querySelector("td:first-child")?.textContent || 'Unknown'

  // Navigate to edit page or open edit modal
  console.log("Editing item:", itemId)
  showNotification("Opening item editor...", "info")
}

// Filter functionality for general use
function applyFilters() {
  const filters = {}
  document.querySelectorAll(".form-select").forEach((select) => {
    if (select.value) {
      filters[select.name || select.id || "filter"] = select.value
    }
  })

  console.log("Applying filters:", filters)
  // Implement actual filtering logic here based on current page
  const currentPage = window.location.pathname
  if (currentPage.includes('managers')) {
    // Apply manager-specific filters
    filterManagers(filters)
  } else if (currentPage.includes('properties')) {
    // Apply property-specific filters  
    filterProperties(filters)
  } else if (currentPage.includes('financials')) {
    // Apply financial filters
    applyTransactionFilters()
  }
}

function filterManagers(filters) {
  const rows = document.querySelectorAll('.managers-table tbody tr')
  rows.forEach(row => {
    let showRow = true
    
    Object.entries(filters).forEach(([key, value]) => {
      if (key === 'status' && value) {
        const statusElement = row.querySelector('[class*="status-"]')
        if (statusElement && !statusElement.textContent.toLowerCase().includes(value.toLowerCase())) {
          showRow = false
        }
      }
    })
    
    row.style.display = showRow ? '' : 'none'
  })
}

function filterProperties(filters) {
  const rows = document.querySelectorAll('.data-table tbody tr')
  rows.forEach(row => {
    let showRow = true
    
    Object.entries(filters).forEach(([key, value]) => {
      if (key === 'status' && value) {
        const statusBadge = row.querySelector('.status-badge')
        if (statusBadge && !statusBadge.textContent.toLowerCase().includes(value.toLowerCase())) {
          showRow = false
        }
      }
    })
    
    row.style.display = showRow ? '' : 'none'
  })
}

// Search functionality for general use
function performSearch(query) {
  console.log("Searching for:", query)
  const rows = document.querySelectorAll('.data-table tbody tr, .managers-table tbody tr, .transactions-table tbody tr')
  
  rows.forEach(row => {
    const text = row.textContent.toLowerCase()
    row.style.display = text.includes(query.toLowerCase()) ? '' : 'none'
  })
}

// Notification system with enhanced features
function showNotification(message, type = "info") {
  // Remove existing notifications
  const existingNotifications = document.querySelectorAll('.notification')
  existingNotifications.forEach(notification => {
    notification.remove()
  })

  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.innerHTML = `
    <div style="display: flex; align-items: center; gap: 0.5rem;">
      <i class="fas ${getNotificationIcon(type)}"></i>
      <span>${message}</span>
      <button onclick="this.parentElement.parentElement.remove()" style="margin-left: auto; background: none; border: none; color: white; cursor: pointer; font-size: 1.2rem; padding: 0;">&times;</button>
    </div>
  `

  // Style the notification
  Object.assign(notification.style, {
    position: "fixed",
    top: "20px",
    right: "20px",
    padding: "1rem 1.5rem",
    borderRadius: "0.5rem",
    color: "white",
    fontWeight: "500",
    zIndex: "9999",
    opacity: "0",
    transform: "translateY(-20px)",
    transition: "all 0.3s ease",
    maxWidth: "400px",
    boxShadow: "0 4px 12px rgba(0, 0, 0, 0.15)"
  })

  // Set background color based on type
  const colors = {
    success: "#10b981",
    warning: "#f59e0b",
    error: "#ef4444",
    info: "#3b82f6",
  }
  notification.style.backgroundColor = colors[type] || colors.info

  document.body.appendChild(notification)

  // Animate in
  setTimeout(() => {
    notification.style.opacity = "1"
    notification.style.transform = "translateY(0)"
  }, 100)

  // Remove after 4 seconds
  setTimeout(() => {
    if (document.body.contains(notification)) {
      notification.style.opacity = "0"
      notification.style.transform = "translateY(-20px)"
      setTimeout(() => {
        if (document.body.contains(notification)) {
          document.body.removeChild(notification)
        }
      }, 300)
    }
  }, 4000)
}

function getNotificationIcon(type) {
  const icons = {
    success: "fa-check-circle",
    warning: "fa-exclamation-triangle",
    error: "fa-times-circle",
    info: "fa-info-circle"
  }
  return icons[type] || icons.info
}

// Utility functions
function debounce(func, wait) {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout)
      func(...args)
    }
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
  }
}

// Initialize tooltips and other UI enhancements
function initializeUI() {
  // Add hover effects to stat cards
  document.querySelectorAll(".stat-card").forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-2px)"
      this.style.boxShadow = "0 4px 12px rgba(0, 0, 0, 0.1)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
      this.style.boxShadow = "none"
    })
  })

  // Enhanced search with debounce
  const searchInputs = document.querySelectorAll(".search-input, .search-input-global")
  searchInputs.forEach(input => {
    input.addEventListener(
      "input",
      debounce(function () {
        performSearch(this.value)
      }, 300),
    )
  })

  // Filter change handlers
  const filterSelects = document.querySelectorAll(".form-select, .filter-select")
  filterSelects.forEach((select) => {
    select.addEventListener("change", () => {
      applyFilters()
    })
  })

  // Action button handlers for general use (only for buttons without onclick)
  document.querySelectorAll(".btn:not([onclick])").forEach((button) => {
    button.addEventListener("click", function (e) {
      const action = this.getAttribute("title") || this.textContent.trim()

      switch (action.toLowerCase()) {
        case "approve":
          handleApprove(this)
          break
        case "reject":
          handleReject(this)
          break
        case "view":
          handleView(this)
          break
        case "edit":
          handleEdit(this)
          break
      }
    })
  })

  // Status badge interactions
  document.querySelectorAll(".status-badge").forEach((badge) => {
    badge.addEventListener("click", function () {
      console.log("Status clicked:", this.textContent)
    })
  })

  // Enhanced table row hover effects
  document.querySelectorAll(".data-table tbody tr, .managers-table tbody tr, .transactions-table tbody tr").forEach((row) => {
    row.addEventListener("mouseenter", function () {
      this.style.backgroundColor = "var(--light-color)"
      this.style.transform = "translateY(-1px)"
      this.style.boxShadow = "0 2px 8px rgba(0, 0, 0, 0.05)"
    })

    row.addEventListener("mouseleave", function () {
      this.style.backgroundColor = ""
      this.style.transform = ""
      this.style.boxShadow = ""
    })
  })

  // Initialize tab functionality if tabs exist
  initializeTabFunctionality()
}

// Tab functionality initialization
function initializeTabFunctionality() {
  const tabButtons = document.querySelectorAll('.tab-btn')
  
  tabButtons.forEach(button => {
    // Only add event listener if button doesn't already have onclick
    if (!button.onclick && !button.getAttribute('onclick')) {
      button.addEventListener('click', function() {
        const tabName = this.id.replace('-btn', '')
        switchTab(tabName)
      })
    }
  })
}

// Enhanced form validation
function validateForm(form) {
  const requiredFields = form.querySelectorAll('[required]')
  let isValid = true
  let firstInvalidField = null

  requiredFields.forEach(field => {
    const value = field.value.trim()
    
    // Remove existing error styling
    field.classList.remove('error')
    
    if (!value) {
      field.classList.add('error')
      isValid = false
      
      if (!firstInvalidField) {
        firstInvalidField = field
      }
    }
  })

  // Focus first invalid field and show message
  if (!isValid && firstInvalidField) {
    firstInvalidField.focus()
    showNotification('Please fill in all required fields.', 'error')
  }

  return isValid
}

// Keyboard shortcuts
function initializeKeyboardShortcuts() {
  document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + K for search
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
      e.preventDefault()
      const searchInput = document.querySelector('.search-input, #transactionSearch, #searchManagers, #searchProperties')
      if (searchInput) {
        searchInput.focus()
        searchInput.select()
      }
    }
    
    // Escape to close modals/notifications
    if (e.key === 'Escape') {
      // Close any open notifications
      document.querySelectorAll('.notification').forEach(n => n.remove())
      
      // Close any open modals
      document.querySelectorAll('.modal-overlay').forEach(modal => {
        modal.classList.add('hidden')
      })
      
      // Close any open dropdowns
      document.querySelectorAll('.user-dropdown').forEach(d => {
        d.style.display = 'none'
      })
    }
  })
}

// Data export functionality
function exportTableData(format = 'csv') {
  const tables = document.querySelectorAll('.data-table, .managers-table, .transactions-table')
  if (tables.length === 0) {
    showNotification('No table data to export', 'warning')
    return
  }

  const table = tables[0] // Export first table found
  const data = []
  
  // Get headers
  const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent.trim())
  data.push(headers)
  
  // Get visible rows only
  const rows = table.querySelectorAll('tbody tr')
  rows.forEach(row => {
    if (row.style.display !== 'none') { // Only export visible rows
      const rowData = Array.from(row.querySelectorAll('td')).map(td => {
        // Clean text content, remove action buttons
        const buttons = td.querySelectorAll('button')
        buttons.forEach(btn => btn.style.display = 'none')
        const text = td.textContent.trim().replace(/\s+/g, ' ')
        buttons.forEach(btn => btn.style.display = '') // Restore buttons
        return text
      })
      data.push(rowData)
    }
  })

  if (format === 'csv') {
    const csvContent = data.map(row => row.map(cell => `"${cell.replace(/"/g, '""')}"`).join(',')).join('\n')
    downloadFile(csvContent, 'admin-data.csv', 'text/csv')
  }
}

function downloadFile(content, filename, contentType) {
  const blob = new Blob([content], { type: contentType })
  const url = window.URL.createObjectURL(blob)
  const link = document.createElement('a')
  link.href = url
  link.download = filename
  document.body.appendChild(link)
  link.click()
  document.body.removeChild(link)
  window.URL.revokeObjectURL(url)
  
  showNotification(`${filename} downloaded successfully!`, 'success')
}

// Advanced filtering with multiple criteria
function advancedFilter(criteria) {
  const rows = document.querySelectorAll('.data-table tbody tr, .managers-table tbody tr, .transactions-table tbody tr')
  let visibleCount = 0
  
  rows.forEach(row => {
    let matchesAll = true
    
    Object.entries(criteria).forEach(([key, value]) => {
      if (value && value !== '') {
        let cellText = ''
        
        switch (key) {
          case 'status':
            const statusElement = row.querySelector('.status-badge, [class*="status-"]')
            cellText = statusElement ? statusElement.textContent.toLowerCase() : ''
            break
          case 'type':
            const typeElement = row.querySelector('.type-label')
            cellText = typeElement ? typeElement.textContent.toLowerCase() : ''
            break
          case 'search':
            cellText = row.textContent.toLowerCase()
            break
          default:
            // For other criteria, search in all cells
            cellText = row.textContent.toLowerCase()
            break
        }
        
        if (!cellText.includes(value.toLowerCase())) {
          matchesAll = false
        }
      }
    })
    
    if (matchesAll) {
      row.style.display = ''
      visibleCount++
    } else {
      row.style.display = 'none'
    }
  })
  
  // Update results count
  updateResultsCount(visibleCount)
  
  return visibleCount
}

function updateResultsCount(count) {
  // Update any existing results counter
  const existingCounter = document.querySelector('.results-count')
  if (existingCounter) {
    existingCounter.textContent = `Showing ${count} results`
  }
}

// Bulk actions for selected items
function initializeBulkActions() {
  const bulkActionSelect = document.querySelector('.bulk-actions-select')
  const applyBulkButton = document.querySelector('.apply-bulk-actions')
  
  if (bulkActionSelect && applyBulkButton) {
    applyBulkButton.addEventListener('click', () => {
      const selectedAction = bulkActionSelect.value
      const selectedRows = document.querySelectorAll('.row-select:checked')
      
      if (selectedRows.length === 0) {
        showNotification('Please select items first', 'warning')
        return
      }
      
      if (!selectedAction) {
        showNotification('Please select an action', 'warning')
        return
      }
      
      if (confirm(`Apply "${selectedAction}" to ${selectedRows.length} selected items?`)) {
        selectedRows.forEach(checkbox => {
          const row = checkbox.closest('tr')
          // Apply the bulk action based on selectedAction value
          applyBulkAction(row, selectedAction)
        })
        
        showNotification(`${selectedAction} applied to ${selectedRows.length} items`, 'success')
      }
    })
  }
}

function applyBulkAction(row, action) {
  switch (action) {
    case 'approve':
      const statusBadge = row.querySelector('.status-badge, [class*="status-"]')
      if (statusBadge) {
        statusBadge.textContent = 'Approved'
        statusBadge.className = 'status-approved'
      }
      break
    case 'reject':
      const statusBadgeReject = row.querySelector('.status-badge, [class*="status-"]')
      if (statusBadgeReject) {
        statusBadgeReject.textContent = 'Rejected'
        statusBadgeReject.className = 'status-rejected'
      }
      break
    case 'delete':
      row.remove()
      break
  }
}

// Initialize all functionality
document.addEventListener('DOMContentLoaded', function() {
  initializeKeyboardShortcuts()
  initializeBulkActions()
})

// Global functions for window object (for backwards compatibility)
window.adminJS = {
  // Manager functions
  //approveManager,
  rejectManager,
  viewManager,
  removeManager,
  addManager,
  openAssignModal,
  unassignProperty,
  
  // Property functions  
  approveProperty,
  rejectProperty,
  removeProperty,
  
  // Financial functions
  viewTransaction,
  closeTransactionModal,
  approveTransaction,
  rejectTransaction,
  updateFinancialStats,
  
  // Tab functions
  switchTab,
  
  // Utility functions
  showNotification,
  performSearch,
  applyFilters,
  exportTableData,
  advancedFilter,
  
  // General handlers
  handleApprove,
  handleReject,
  handleView,
  handleEdit
}

// Export for ES6 modules if needed
if (typeof module !== 'undefined' && module.exports) {
  module.exports = window.adminJS
}