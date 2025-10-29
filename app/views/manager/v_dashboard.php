<?php require APPROOT . '/views/inc/manager_header.php'; ?>

<div class="dashboard-content">
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">Welcome back! Here's what's happening with your properties.</p>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background-color: var(--primary-color);">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Properties</div>
                <h3>24</h3>
                <div class="stat-change positive">+2 this month</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: var(--success-color);">
                <i class="fas fa-home"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Units</div>
                <h3>156</h3>
                <div class="stat-change positive">+8 this month</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: var(--success-color);">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Income</div>
                <h3>Rs 84,250</h3>
                <div class="stat-change positive">+12.5% from last month</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: var(--warning-color);">
                <i class="fas fa-arrow-down"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Expenses</div>
                <h3>Rs 42,180</h3>
                <div class="stat-change negative">-3.2% from last month</div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="dashboard-grid">
        <!-- Payment History -->
        <div class="dashboard-section">
            <div class="section-header">
                <h2>Recent Payments</h2>
                <a href="#" class="btn btn-sm btn-secondary">View All</a>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Tenant</th>
                            <th>Property</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-medium">Sarah Johnson</td>
                            <td>Oak Street Apt 2A</td>
                            <td>Rs 20,000</td>
                            <td>Dec 1, 2024</td>
                            <td><span class="status-badge approved">Paid</span></td>
                        </tr>
                        <tr>
                            <td class="font-medium">Mike Chen</td>
                            <td>Pine Avenue House</td>
                            <td>Rs 30,000</td>
                            <td>Dec 1, 2024</td>
                            <td><span class="status-badge approved">Paid</span></td>
                        </tr>
                        <tr>
                            <td class="font-medium">Emily Davis</td>
                            <td>Maple Drive Apt 1B</td>
                            <td>Rs 45,000</td>
                            <td>Nov 28, 2024</td>
                            <td><span class="status-badge pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td class="font-medium">John Smith</td>
                            <td>Cedar Lane Townhome</td>
                            <td>Rs 30,000</td>
                            <td>Nov 25, 2024</td>
                            <td><span class="status-badge approved">Paid</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Maintenance Status -->
        <div class="dashboard-section">
            <div class="section-header">
                <h2>Maintenance Status</h2>
                <a href="<?php echo URLROOT; ?>/manager/maintenance" class="btn btn-sm btn-secondary">View All</a>
            </div>
            <div class="maintenance-list">
                <div class="maintenance-item">
                    <div class="maintenance-info">
                        <h4>Plumbing Repair</h4>
                        <p class="text-muted">Oak Street Apt 2A</p>
                    </div>
                    <div class="maintenance-status">
                        <span class="status-badge pending">In Progress</span>
                        <small class="text-muted">Due: Dec 15</small>
                    </div>
                </div>
                <div class="maintenance-item">
                    <div class="maintenance-info">
                        <h4>HVAC Maintenance</h4>
                        <p class="text-muted">Maple Drive Complex</p>
                    </div>
                    <div class="maintenance-status">
                        <span class="status-badge approved">Completed</span>
                        <small class="text-muted">Completed: Dec 10</small>
                    </div>
                </div>
                <div class="maintenance-item">
                    <div class="maintenance-info">
                        <h4>Electrical Issue</h4>
                        <p class="text-muted">Pine Avenue House</p>
                    </div>
                    <div class="maintenance-status">
                        <span class="status-badge rejected">Urgent</span>
                        <small class="text-muted">Reported: Dec 12</small>
                    </div>
                </div>
                <div class="maintenance-item">
                    <div class="maintenance-info">
                        <h4>Carpet Cleaning</h4>
                        <p class="text-muted">Cedar Lane Townhome</p>
                    </div>
                    <div class="maintenance-status">
                        <span class="status-badge pending">Scheduled</span>
                        <small class="text-muted">Due: Dec 20</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="dashboard-section" style="margin-top: 2rem;">
        <div class="section-header">
            <h2>Quick Actions</h2>
        </div>
        <div style="padding: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="<?php echo URLROOT; ?>/manager/maintenance" class="btn btn-primary">
                <i class="fas fa-tools"></i>
                View Maintenance
            </a>
            <a href="<?php echo URLROOT; ?>/manager/inspections" class="btn btn-primary">
                <i class="fas fa-clipboard-check"></i>
                Schedule Inspection
            </a>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/manager_footer.php'; ?>