<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>My Bookings</h2>
            <p>View and manage your property bookings</p>
        </div>
    </div>

    <!-- Current Bookings -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Current Bookings</h3>
        </div>

        <div class="bookings-list">
            <div class="booking-card">
                <div class="booking-image">
                    <img src="<?php echo URLROOT; ?>/images/properties/property-1.jpg" alt="Oak Street Apartment">
                </div>
                <div class="booking-details">
                    <h4>Oak Street Apartment</h4>
                    <p class="booking-location">
                        <i class="fas fa-map-marker-alt"></i>
                        Downtown
                    </p>
                    <p class="booking-price">Rs 20,000/month</p>
                    <div class="booking-dates">
                        <span><i class="fas fa-calendar"></i> Jan 1, 2025 - Dec 31, 2025</span>
                    </div>
                </div>
                <div class="booking-status">
                    <span class="status-badge approved">Active</span>
                    <div class="booking-actions">
                        <button class="btn btn-primary btn-sm">View Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking History -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Booking History</h3>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>Location</th>
                        <th>Duration</th>
                        <th>Monthly Rent</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Oak Street Apartment</td>
                        <td>Downtown</td>
                        <td>Jan 2024 - Dec 2024</td>
                        <td>Rs 20,000</td>
                        <td><span class="status-badge approved">Active</span></td>
                        <td><button class="btn btn-secondary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>Maple Avenue Studio</td>
                        <td>Midtown</td>
                        <td>Jun 2023 - Nov 2023</td>
                        <td>Rs 35,000</td>
                        <td><span class="status-badge">Completed</span></td>
                        <td><button class="btn btn-secondary btn-sm">View</button></td>
                    </tr>
                </tbody>
            </table>
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
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>