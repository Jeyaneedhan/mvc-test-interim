<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="dashboard-content">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <h2>Welcome back, <?php echo $_SESSION['user_name']; ?>!</h2>
        <p>Here's what's happening with your properties today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">2</h3>
                <p class="stat-label">Active Bookings</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-credit-card"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">1</h3>
                <p class="stat-label">Pending Payments</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">0</h3>
                <p class="stat-label">Open Issues</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">8</h3>
                <p class="stat-label">Total Reviews</p>
            </div>
        </div>
    </div>

    <!-- Recent Notifications -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Recent Notifications</h3>
            <a href="<?php echo URLROOT; ?>/tenant/notifications" class="btn btn-primary">View All</a>
        </div>

        <div class="notifications-list">
            <div class="notification-item">
                <div class="notification-icon warning">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="notification-content">
                    <p class="notification-title">Rent Payment Due</p>
                    <p class="notification-message">Your rent payment for Oak Street Apartment is due in 3 days</p>
                    <span class="notification-time">2 hours ago</span>
                </div>
            </div>

            <div class="notification-item">
                <div class="notification-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="notification-content">
                    <p class="notification-title">Issue Update</p>
                    <p class="notification-message">Your maintenance request has been resolved</p>
                    <span class="notification-time">1 day ago</span>
                </div>
            </div>

            <div class="notification-item">
                <div class="notification-icon info">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="notification-content">
                    <p class="notification-title">New Property Available</p>
                    <p class="notification-message">A new property matching your preferences is now available</p>
                    <span class="notification-time">2 days ago</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Quick Actions</h3>
        </div>

        <div class="quick-actions-grid">
            <a href="<?php echo URLROOT; ?>/tenant/search_properties" class="quick-action-item">
                <div class="action-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="action-content">
                    <h4>Search Properties</h4>
                    <p>Find new rental properties</p>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/tenant/pay_rent" class="quick-action-item">
                <div class="action-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="action-content">
                    <h4>Pay Rent</h4>
                    <p>Make rent payments</p>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/tenant/report_issue" class="quick-action-item">
                <div class="action-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="action-content">
                    <h4>Report Issue</h4>
                    <p>Report maintenance issues</p>
                </div>
            </a>

            <a href="<?php echo URLROOT; ?>/tenant/bookings" class="quick-action-item">
                <div class="action-icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="action-content">
                    <h4>My Bookings</h4>
                    <p>View your bookings</p>
                </div>
            </a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>