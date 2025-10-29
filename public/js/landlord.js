// Landlord Dashboard JavaScript
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
      if (!sidebar.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
        sidebar.classList.remove("mobile-open")
      }
    }
  })

  // Initialize tooltips and other UI enhancements
  initializeUI()
})

// Initialize UI enhancements
function initializeUI() {
  // Add hover effects to cards
  document.querySelectorAll(".stat-card").forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-2px)"
      this.style.boxShadow = "0 4px 12px rgba(0, 0, 0, 0.1)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
      this.style.boxShadow = "0 1px 3px rgba(0, 0, 0, 0.1)"
    })
  })

  // Add hover effects to property cards
  document.querySelectorAll(".property-card").forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-2px)"
      this.style.boxShadow = "0 4px 12px rgba(0, 0, 0, 0.15)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
      this.style.boxShadow = "0 1px 3px rgba(0, 0, 0, 0.1)"
    })
  })
}

// Notification system
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.textContent = message

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
  })

  const colors = {
    success: "#10b981",
    warning: "#f59e0b",
    error: "#ef4444",
    info: "#3b82f6",
  }
  notification.style.backgroundColor = colors[type] || colors.info

  document.body.appendChild(notification)

  setTimeout(() => {
    notification.style.opacity = "1"
    notification.style.transform = "translateY(0)"
  }, 100)

  setTimeout(() => {
    notification.style.opacity = "0"
    notification.style.transform = "translateY(-20px)"
    setTimeout(() => {
      if (document.body.contains(notification)) {
        document.body.removeChild(notification)
      }
    }, 300)
  }, 3000)
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