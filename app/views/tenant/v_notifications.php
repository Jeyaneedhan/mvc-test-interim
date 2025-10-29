<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Notifications</h2>
            <p>Stay updated with your property activities</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-secondary" onclick="markAllAsRead()">Mark all as read</button>
        </div>
    </div>

    <!-- Notifications Stats -->
    <div class="notification-stats">
        <div class="stat-item">
            <i class="fas fa-bell"></i>
            <span>3 unread notifications</span>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="notifications-section">
        <!-- Unread Notifications -->
        <div class="notification-card unread" data-notification-id="1">
            <div class="notification-indicator warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Rent Payment Reminder</h4>
                    <div class="notification-meta">
                        <span class="notification-time">2 hours ago</span>
                        <div class="unread-indicator"></div>
                    </div>
                </div>
                <p class="notification-message">Your rent payment for Oak Street Apartment is due in 3 days</p>
            </div>
        </div>

        <div class="notification-card unread" data-notification-id="2">
            <div class="notification-indicator success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Maintenance Update</h4>
                    <div class="notification-meta">
                        <span class="notification-time">1 day ago</span>
                        <div class="unread-indicator"></div>
                    </div>
                </div>
                <p class="notification-message">Your maintenance request for broken faucet has been approved and scheduled for tomorrow</p>
            </div>
        </div>

        <div class="notification-card unread" data-notification-id="3">
            <div class="notification-indicator info">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">New Property Available</h4>
                    <div class="notification-meta">
                        <span class="notification-time">2 days ago</span>
                        <div class="unread-indicator"></div>
                    </div>
                </div>
                <p class="notification-message">A new property matching your preferences is now available in Downtown area</p>
            </div>
        </div>

        <!-- Read Notifications -->
        <div class="notification-card" data-notification-id="4">
            <div class="notification-indicator success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Payment Confirmed</h4>
                    <div class="notification-meta">
                        <span class="notification-time">3 days ago</span>
                    </div>
                </div>
                <p class="notification-message">Your rent payment of $1,200 has been successfully processed</p>
            </div>
        </div>

        <div class="notification-card" data-notification-id="5">
            <div class="notification-indicator info">
                <i class="fas fa-file-contract"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Lease Renewal Available</h4>
                    <div class="notification-meta">
                        <span class="notification-time">1 week ago</span>
                    </div>
                </div>
                <p class="notification-message">Your lease renewal documents are ready for review and signing</p>
            </div>
        </div>

        <div class="notification-card" data-notification-id="6">
            <div class="notification-indicator warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Scheduled Maintenance</h4>
                    <div class="notification-meta">
                        <span class="notification-time">2 weeks ago</span>
                    </div>
                </div>
                <p class="notification-message">Building maintenance scheduled for next Tuesday 9AM-12PM. Please ensure access to your unit</p>
            </div>
        </div>
    </div>
</div>

<script>
    function markAllAsRead() {
        const unreadCards = document.querySelectorAll('.notification-card.unread');
        const unreadCount = unreadCards.length;

        unreadCards.forEach(card => {
            card.classList.remove('unread');
            const indicator = card.querySelector('.unread-indicator');
            if (indicator) {
                indicator.remove();
            }
        });

        // Update stats
        const statItem = document.querySelector('.stat-item span');
        if (statItem) {
            statItem.textContent = '0 unread notifications';
        }

        showNotification(`Marked ${unreadCount} notifications as read`, 'success');
    }

    function showNotification(message, type = "info") {
        const notification = document.createElement("div");
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas ${getNotificationIcon(type)}"></i>
            <span>${message}</span>
        </div>
    `;

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
        });

        const colors = {
            success: "#10b981",
            warning: "#f59e0b",
            error: "#ef4444",
            info: "#3b82f6",
        };
        notification.style.backgroundColor = colors[type] || colors.info;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = "1";
            notification.style.transform = "translateY(0)";
        }, 100);

        setTimeout(() => {
            notification.style.opacity = "0";
            notification.style.transform = "translateY(-20px)";
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 4000);
    }

    function getNotificationIcon(type) {
        const icons = {
            success: "fa-check-circle",
            warning: "fa-exclamation-triangle",
            error: "fa-times-circle",
            info: "fa-info-circle"
        };
        return icons[type] || icons.info;
    }
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>