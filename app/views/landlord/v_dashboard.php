<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-home"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Total Properties</h3>
            <div class="stat-value">12</div>
            <div class="stat-change positive">+2 this month</div>
        </div>
    </div>
    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Occupied Units</h3>
            <div class="stat-value">10</div>
            <div class="stat-change positive">83% occupancy</div>
        </div>
    </div>
    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Vacant Units</h3>
            <div class="stat-value">2</div>
            <div class="stat-change">Available for rent</div>
        </div>
    </div>
    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Monthly Revenue</h3>
            <div class="stat-value">Rs15,400</div>
            <div class="stat-change positive">+8% from last month</div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="content-card">
    <div class="card-header">
        <h2 class="card-title">Recent Activity</h2>
        <button class="btn btn-outline btn-sm">View All</button>
    </div>
    <div class="card-body">
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon warning">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="activity-content">
                    <strong>New maintenance request</strong>
                    <div class="activity-meta">Apartment 3B - Leaky faucet</div>
                </div>
                <span class="badge badge-warning">Pending</span>
            </div>
            <div class="activity-item">
                <div class="activity-icon success">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="activity-content">
                    <strong>Rent payment received</strong>
                    <div class="activity-meta">John Doe - Rs 30,000</div>
                </div>
                <span class="badge badge-success">Completed</span>
            </div>
            <div class="activity-item">
                <div class="activity-icon info">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="activity-content">
                    <strong>New inquiry</strong>
                    <div class="activity-meta">Sarah Johnson interested in 2BR unit</div>
                </div>
                <span class="badge badge-info">New</span>
            </div>
        </div>
    </div>
</div>

<!-- Property Overview -->
<div class="content-card">
    <div class="card-header">
        <h2 class="card-title">Property Overview</h2>
        <a href="<?php echo URLROOT; ?>/landlord/properties" class="btn btn-primary btn-sm">Manage Properties</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>Status</th>
                        <th>Tenant</th>
                        <th>Monthly Rent</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123 Main St, Apt 1A</td>
                        <td><span class="badge badge-success">Occupied</span></td>
                        <td>John Doe</td>
                        <td>Rs 25,500</td>
                        <td><button class="btn btn-outline btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>123 Main St, Apt 2B</td>
                        <td><span class="badge badge-warning">Vacant</span></td>
                        <td>-</td>
                        <td>Rs 35,500</td>
                        <td><button class="btn btn-primary btn-sm">List</button></td>
                    </tr>
                    <tr>
                        <td>456 Oak Ave, Unit 5</td>
                        <td><span class="badge badge-success">Occupied</span></td>
                        <td>Sarah Wilson</td>
                        <td>Rs 45,500</td>
                        <td><button class="btn btn-outline btn-sm">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/landlord_footer.php'; ?>