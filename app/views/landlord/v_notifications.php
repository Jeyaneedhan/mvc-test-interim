<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<!-- Page Header -->
<div class="page-header">
    <div class="header-left">
        <h1 class="page-title">Notifications</h1>
        <p class="page-subtitle">Manage and send notifications to tenants</p>
    </div>
    <div class="header-actions">
        <button class="btn btn-primary" onclick="createNotification()">
            <i class="fas fa-plus"></i> Create Notification
        </button>
    </div>
</div>

<!-- Notification Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--primary-color);">
            <i class="fas fa-paper-plane"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Total Sent</h3>
            <div class="stat-value">89</div>
            <div class="stat-change">This month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--success-color);">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Delivered</h3>
            <div class="stat-value">84</div>
            <div class="stat-change positive">94% delivery rate</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--warning-color);">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Pending</h3>
            <div class="stat-value">3</div>
            <div class="stat-change">In queue</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--danger-color);">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Failed</h3>
            <div class="stat-value">2</div>
            <div class="stat-change">Retry needed</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="content-card">
    <div class="card-header">
        <h2 class="card-title">Quick Actions</h2>
    </div>
    <div class="card-body">
        <div class="quick-actions" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            <button class="quick-action-btn" onclick="sendRentReminder()">
                <i class="fas fa-dollar-sign" style="font-size: 1.5rem; color: var(--primary-color); margin-bottom: 0.5rem;"></i>
                <span>Rent Reminder</span>
            </button>
            <button class="quick-action-btn" onclick="sendMaintenanceUpdate()">
                <i class="fas fa-tools" style="font-size: 1.5rem; color: var(--primary-color); margin-bottom: 0.5rem;"></i>
                <span>Maintenance Update</span>
            </button>
            <button class="quick-action-btn" onclick="sendAnnouncement()">
                <i class="fas fa-bullhorn" style="font-size: 1.5rem; color: var(--primary-color); margin-bottom: 0.5rem;"></i>
                <span>Announcement</span>
            </button>
            <button class="quick-action-btn" onclick="sendEmergencyAlert()">
                <i class="fas fa-exclamation-triangle" style="font-size: 1.5rem; color: var(--danger-color); margin-bottom: 0.5rem;"></i>
                <span>Emergency Alert</span>
            </button>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="content-card">
    <div class="card-body" style="padding: 1rem 1.5rem;">
        <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
            <div class="search-box" style="flex: 1; min-width: 200px;">
                <input type="text" placeholder="Search notifications..." id="notificationSearch" class="form-control">
            </div>
            <select id="typeFilter" class="form-control" style="min-width: 150px;">
                <option value="">All Types</option>
                <option value="rent">Rent Reminder</option>
                <option value="maintenance">Maintenance</option>
                <option value="announcement">Announcement</option>
                <option value="emergency">Emergency</option>
            </select>
            <select id="statusFilter" class="form-control" style="min-width: 120px;">
                <option value="">All Status</option>
                <option value="delivered">Delivered</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
            </select>
            <input type="date" id="dateFilter" class="form-control" style="min-width: 140px;">
        </div>
    </div>
</div>

<!-- Notifications List -->
<div class="notifications-container">
    <div class="notification-item" data-type="rent" data-status="delivered">
        <div class="notification-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: rgba(37, 99, 235, 0.1); color: var(--primary-color); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="notification-content">
            <div class="notification-header">
                <h4>Monthly Rent Reminder</h4>
                <span class="notification-time">2 hours ago</span>
            </div>
            <p>Rent payment due in 3 days - Sent to 45 tenants</p>
            <div class="notification-stats">
                <span class="stat">
                    <i class="fas fa-users"></i>
                    45 recipients
                </span>
                <span class="stat">
                    <i class="fas fa-check"></i>
                    43 delivered
                </span>
                <span class="stat">
                    <i class="fas fa-eye"></i>
                    38 read
                </span>
            </div>
        </div>
        <div class="notification-actions">
            <span class="badge badge-success">Delivered</span>
            <button class="btn btn-outline btn-sm" onclick="viewNotificationDetails('NOT001')">
                <i class="fas fa-eye"></i> View Details
            </button>
        </div>
    </div>

    <div class="notification-item" data-type="maintenance" data-status="pending">
        <div class="notification-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: rgba(245, 158, 11, 0.1); color: var(--warning-color); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i class="fas fa-tools"></i>
        </div>
        <div class="notification-content">
            <div class="notification-header">
                <h4>Maintenance Schedule Update</h4>
                <span class="notification-time">1 day ago</span>
            </div>
            <p>HVAC maintenance scheduled for Building A - Sent to 28 tenants</p>
            <div class="notification-stats">
                <span class="stat">
                    <i class="fas fa-users"></i>
                    28 recipients
                </span>
                <span class="stat">
                    <i class="fas fa-clock"></i>
                    3 pending
                </span>
                <span class="stat">
                    <i class="fas fa-eye"></i>
                    25 read
                </span>
            </div>
        </div>
        <div class="notification-actions">
            <span class="badge badge-warning">Pending</span>
            <div style="display: flex; gap: 0.5rem;">
                <button class="btn btn-outline btn-sm" onclick="viewNotificationDetails('NOT002')">
                    <i class="fas fa-eye"></i> View Details
                </button>
                <button class="btn btn-primary btn-sm" onclick="resendNotification('NOT002')">
                    <i class="fas fa-redo"></i> Resend
                </button>
            </div>
        </div>
    </div>

    <div class="notification-item" data-type="announcement" data-status="delivered">
        <div class="notification-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: rgba(16, 185, 129, 0.1); color: var(--success-color); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="notification-content">
            <div class="notification-header">
                <h4>New Amenity Available</h4>
                <span class="notification-time">3 days ago</span>
            </div>
            <p>New fitness center now open for all residents - Sent to all tenants</p>
            <div class="notification-stats">
                <span class="stat">
                    <i class="fas fa-users"></i>
                    67 recipients
                </span>
                <span class="stat">
                    <i class="fas fa-check"></i>
                    67 delivered
                </span>
                <span class="stat">
                    <i class="fas fa-eye"></i>
                    52 read
                </span>
            </div>
        </div>
        <div class="notification-actions">
            <span class="badge badge-success">Delivered</span>
            <button class="btn btn-outline btn-sm" onclick="viewNotificationDetails('NOT003')">
                <i class="fas fa-eye"></i> View Details
            </button>
        </div>
    </div>

    <div class="notification-item" data-type="emergency" data-status="delivered">
        <div class="notification-icon" style="width: 48px; height: 48px; border-radius: 50%; background-color: rgba(239, 68, 68, 0.1); color: var(--danger-color); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="notification-content">
            <div class="notification-header">
                <h4>Water Service Interruption</h4>
                <span class="notification-time">1 week ago</span>
            </div>
            <p>Emergency water shut-off notification - Sent to affected units</p>
            <div class="notification-stats">
                <span class="stat">
                    <i class="fas fa-users"></i>
                    15 recipients
                </span>
                <span class="stat">
                    <i class="fas fa-check"></i>
                    15 delivered
                </span>
                <span class="stat">
                    <i class="fas fa-eye"></i>
                    15 read
                </span>
            </div>
        </div>
        <div class="notification-actions">
            <span class="badge badge-success">Delivered</span>
            <button class="btn btn-outline btn-sm" onclick="viewNotificationDetails('NOT004')">
                <i class="fas fa-eye"></i> View Details
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize filter functionality
        initFilters();

        // Search functionality
        const searchInput = document.getElementById('notificationSearch');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                filterNotifications();
            });
        }

        // Filter change events
        ['typeFilter', 'statusFilter', 'dateFilter'].forEach(filterId => {
            const filter = document.getElementById(filterId);
            if (filter) {
                filter.addEventListener('change', filterNotifications);
            }
        });
    });

    function initFilters() {
        // Initialize any filter-specific functionality here
    }

    function filterNotifications() {
        const searchTerm = document.getElementById('notificationSearch').value.toLowerCase();
        const typeFilter = document.getElementById('typeFilter').value;
        const statusFilter = document.getElementById('statusFilter').value;
        const dateFilter = document.getElementById('dateFilter').value;

        const notificationItems = document.querySelectorAll('.notification-item');

        notificationItems.forEach(item => {
            let show = true;

            // Search filter
            if (searchTerm) {
                const content = item.textContent.toLowerCase();
                if (!content.includes(searchTerm)) {
                    show = false;
                }
            }

            // Type filter
            if (typeFilter && item.dataset.type !== typeFilter) {
                show = false;
            }

            // Status filter
            if (statusFilter && item.dataset.status !== statusFilter) {
                show = false;
            }

            item.style.display = show ? 'block' : 'none';
        });
    }

    // Quick action functions
    function sendRentReminder() {
        showNotification('Opening rent reminder form...', 'info');
    }

    function sendMaintenanceUpdate() {
        showNotification('Opening maintenance update form...', 'info');
    }

    function sendAnnouncement() {
        showNotification('Opening announcement form...', 'info');
    }

    function sendEmergencyAlert() {
        showNotification('Opening emergency alert form...', 'warning');
    }

    function createNotification() {
        showNotification('Opening notification creator...', 'info');
    }

    function notificationSettings() {
        showNotification('Opening notification settings...', 'info');
    }

    function viewNotificationDetails(notificationId) {
        showNotification(`Opening details for notification ${notificationId}`, 'info');
    }

    function resendNotification(notificationId) {
        showNotification(`Resending notification ${notificationId}`, 'info');
    }

    // Notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;

        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '1rem 1.5rem',
            borderRadius: '0.5rem',
            color: 'white',
            fontWeight: '500',
            zIndex: '9999',
            opacity: '0',
            transform: 'translateY(-20px)',
            transition: 'all 0.3s ease'
        });

        const colors = {
            success: '#10b981',
            warning: '#f59e0b',
            error: '#ef4444',
            info: '#3b82f6'
        };
        notification.style.backgroundColor = colors[type] || colors.info;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateY(0)';
        }, 100);

        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
</script>

<?php require APPROOT . '/views/inc/landlord_footer.php'; ?>