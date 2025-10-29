<?php require APPROOT . '/views/inc/manager_header.php'; ?>

<div class="maintenance-content">
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">Maintenance Tracking</h1>
        </div>
        <div class="header-right">
            <p class="page-subtitle">Track maintenance requests, quotations, and service completion status.</p>
            <!-- <button class="btn btn-primary" onclick="openNewRequestModal()">
                <i class="fas fa-plus"></i>
                New Request
            </button> -->
        </div>
    </div>

    <!-- Search Bar -->
    <div class="dashboard-section">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search maintenance requests..." id="maintenanceSearch">
        </div>
    </div>

    <!-- Maintenance Requests with Tabs -->
    <div class="dashboard-section">
        <div class="section-header">
            <div class="header-icon">
                <i class="fas fa-tools"></i>
                <h2>Maintenance Requests</h2>
            </div>
        </div>

        <div class="tabs-container">
            <div class="tabs-nav">
                <button class="tab-button active" onclick="showMaintenanceTab('all')">All</button>
                <button class="tab-button" onclick="showMaintenanceTab('requested')">Requested</button>
                <button class="tab-button" onclick="showMaintenanceTab('quoted')">Quoted</button>
                <button class="tab-button" onclick="showMaintenanceTab('approved')">Approved</button>
                <button class="tab-button" onclick="showMaintenanceTab('completed')">Completed</button>
            </div>

            <div id="all-tab" class="tab-content active">
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>REQUEST ID</th>
                                <th>PROPERTY</th>
                                <th>ISSUE</th>
                                <th>DATE</th>
                                <th>PROVIDER</th>
                                <th>QUOTATION</th>
                                <th>STATUS</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="font-medium">MNT-001</td>
                                <td>Sunset Apartments 2A</td>
                                <td>Leaking faucet in kitchen</td>
                                <td>2024-01-15</td>
                                <td>ABC Plumbing</td>
                                <td class="font-semibold text-primary">Rs 3000</td>
                                <td><span class="status-badge pending">Quoted</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-success">Approve</button>
                                        <button class="btn-icon" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-medium">MNT-002</td>
                                <td>Downtown Lofts 5B</td>
                                <td>AC unit not cooling properly</td>
                                <td>2024-01-14</td>
                                <td>Cool Air Services</td>
                                <td class="font-semibold text-primary">Rs 2000</td>
                                <td><span class="status-badge approved">Completed</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-medium">MNT-003</td>
                                <td>Garden View Condos 3C</td>
                                <td>Broken window latch</td>
                                <td>2024-01-13</td>
                                <td>Fix-It Pros</td>
                                <td class="font-semibold text-primary">Rs 5000</td>
                                <td><span class="status-badge approved">Approved</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Quotation Approvals -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Pending Quotation Approvals</h3>
        </div>
        <div class="approval-cards">
            <div class="approval-card">
                <div class="card-content">
                    <div class="card-info">
                        <h4 class="font-medium">MNT-001</h4>
                        <p class="text-muted">Sunset Apartments 2A</p>
                        <p>Leaking faucet in kitchen</p>
                        <p class="quotation-amount">Rs 1500</p>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-success">Approve Quote</button>
                        <button class="btn btn-secondary">Request Revision</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/manager_footer.php'; ?>