<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<div class="page-header">
    <div class="header-left">
        <h1 class="page-title">Payment History</h1>
        <p class="page-subtitle">Track rent payments and financial records</p>
    </div>
    <div class="header-actions">
        <select class="form-control" id="monthFilter">
            <option value="">All Months</option>
            <option value="2024-03">March 2024</option>
            <option value="2024-02">February 2024</option>
            <option value="2024-01">January 2024</option>
        </select>
        <select class="form-control" id="statusFilter">
            <option value="">All Payments</option>
            <option value="paid">Paid</option>
            <option value="pending">Pending</option>
            <option value="overdue">Overdue</option>
        </select>
    </div>
</div>

<!-- Payment Stats -->
<div class="stats-grid">
    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Collected This Month</h3>
            <div class="stat-value">Rs14,200</div>
            <div class="stat-change positive">92% collection rate</div>
        </div>
    </div>
    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Pending Payments</h3>
            <div class="stat-value">Rs10,200</div>
            <div class="stat-change">1 tenant</div>
        </div>
    </div>
    <div class="stat-card danger">
        <div class="stat-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Overdue</h3>
            <div class="stat-value">Rs 0</div>
            <div class="stat-change">0 tenants</div>
        </div>
    </div>
    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Average Payment Time</h3>
            <div class="stat-value">2.3</div>
            <div class="stat-change">days early</div>
        </div>
    </div>
</div>

<!-- Payment History Table -->
<div class="content-card">
    <div class="card-header">
        <h2 class="card-title">Recent Payments</h2>
        <div class="card-actions">
            <button class="btn btn-outline btn-sm">Export CSV</button>
            <button class="btn btn-primary btn-sm">Generate Report</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Tenant</th>
                        <th>Property</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="payment-row">
                        <td>Mar 1, 2024</td>
                        <td>John Doe</td>
                        <td>123 Main St, Apt 1A</td>
                        <td>Rs 10,350</td>
                        <td>Bank Transfer</td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td>
                            <button class="btn btn-outline btn-sm">View Receipt</button>
                        </td>
                    </tr>
                    <tr class="payment-row">
                        <td>Mar 1, 2024</td>
                        <td>Sarah Wilson</td>
                        <td>789 Pine St, Unit 5</td>
                        <td>Rs 10,350</td>
                        <td>Credit Card</td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td>
                            <button class="btn btn-outline btn-sm">View Receipt</button>
                        </td>
                    </tr>
                    <tr class="payment-row">
                        <td>Mar 1, 2024</td>
                        <td>Mike Davis</td>
                        <td>456 Oak Avenue</td>
                        <td>Rs 10,350</td>
                        <td>Check</td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td>
                            <button class="btn btn-outline btn-sm">View Receipt</button>
                        </td>
                    </tr>
                    <tr class="payment-row">
                        <td>Mar 5, 2024</td>
                        <td>Lisa Chen</td>
                        <td>321 Elm Dr, Apt 3B</td>
                        <td>Rs 10,350</td>
                        <td>Bank Transfer</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Send Reminder</button>
                        </td>
                    </tr>
                    <tr class="payment-row">
                        <td>Feb 28, 2024</td>
                        <td>Robert Wilson</td>
                        <td>654 Maple Ave</td>
                        <td>Rs 10,350</td>
                        <td>Cash</td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td>
                            <button class="btn btn-outline btn-sm">View Receipt</button>
                        </td>
                    </tr>
                    <tr class="payment-row">
                        <td>Feb 28, 2024</td>
                        <td>Emma Thompson</td>
                        <td>987 Cedar St</td>
                        <td>Rs 10,350</td>
                        <td>Bank Transfer</td>
                        <td><span class="badge badge-success">Paid</span></td>
                        <td>
                            <button class="btn btn-outline btn-sm">View Receipt</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Payment Analytics -->
<div class="content-card">
    <div class="card-header">
        <h2 class="card-title">Payment Analytics</h2>
    </div>
    <div class="card-body">
        <div class="analytics-grid">
            <div class="analytics-item">
                <h4>Payment Methods</h4>
                <div class="method-stats">
                    <div class="method-item">
                        <span class="method-label">Bank Transfer</span>
                        <span class="method-percentage">45%</span>
                    </div>
                    <div class="method-item">
                        <span class="method-label">Credit Card</span>
                        <span class="method-percentage">30%</span>
                    </div>
                    <div class="method-item">
                        <span class="method-label">Check</span>
                        <span class="method-percentage">20%</span>
                    </div>
                    <div class="method-item">
                        <span class="method-label">Cash</span>
                        <span class="method-percentage">5%</span>
                    </div>
                </div>
            </div>
            <div class="analytics-item">
                <h4>Monthly Trends</h4>
                <div class="trend-stats">
                    <div class="trend-item">
                        <span class="trend-month">March 2024</span>
                        <span class="trend-amount">Rs 10,350</span>
                        <span class="trend-change positive">+5%</span>
                    </div>
                    <div class="trend-item">
                        <span class="trend-month">February 2024</span>
                        <span class="trend-amount">Rs 10,350</span>
                        <span class="trend-change positive">+2%</span>
                    </div>
                    <div class="trend-item">
                        <span class="trend-month">January 2024</span>
                        <span class="trend-amount">Rs 10,350</span>
                        <span class="trend-change neutral">0%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize filters
        initFilter('#statusFilter', '.payment-row', '.badge');

        // Month filter
        const monthFilter = document.getElementById('monthFilter');
        if (monthFilter) {
            monthFilter.addEventListener('change', function() {
                const selectedMonth = this.value;
                const rows = document.querySelectorAll('.payment-row');

                rows.forEach(row => {
                    if (selectedMonth === '') {
                        row.style.display = 'table-row';
                    } else {
                        const dateCell = row.querySelector('td').textContent;
                        const rowMonth = new Date(dateCell).toISOString().slice(0, 7);

                        if (rowMonth === selectedMonth) {
                            row.style.display = 'table-row';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            });
        }

        // Button handlers
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                const action = this.textContent.trim();

                switch (action) {
                    case 'View Receipt':
                        showNotification('Opening payment receipt', 'info');
                        break;
                    case 'Send Reminder':
                        showNotification('Payment reminder sent to tenant', 'success');
                        break;
                    case 'Export CSV':
                        showNotification('Exporting payment data to CSV', 'info');
                        break;
                    case 'Generate Report':
                        showNotification('Generating payment report', 'info');
                        break;
                }
            });
        });
    });
</script>

<?php require APPROOT . '/views/inc/landlord_footer.php'; ?>