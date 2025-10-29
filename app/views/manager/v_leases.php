<?php require APPROOT . '/views/inc/manager_header.php'; ?>

<div class="leases-content">
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">Lease Agreement Verification</h1>
            <p class="page-subtitle">Review, validate, and manage rental agreements and lease documentation.</p>
        </div>
        <div class="header-right">
            <button class="btn btn-primary" onclick="openAddAgreementModal()">
                <i class="fas fa-plus"></i>
                Add Agreement
            </button>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="dashboard-section">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search agreements..." id="agreementSearch">
        </div>
    </div>

    <div class="leases-layout">
        <!-- Lease Agreements Table -->
        <div class="agreements-list">
            <div class="dashboard-section">
                <div class="section-header">
                    <div class="header-icon">
                        <i class="fas fa-file-contract"></i>
                        <h2>Lease Agreements</h2>
                    </div>
                </div>

                <div class="tabs-container">
                    <div class="tabs-nav">
                        <button class="tab-button active" onclick="showLeaseTab('all')">All</button>
                        <button class="tab-button" onclick="showLeaseTab('pending-review')">Pending</button>
                        <button class="tab-button" onclick="showLeaseTab('validated')">Validated</button>
                        <button class="tab-button" onclick="showLeaseTab('rejected')">Rejected</button>
                    </div>

                    <div id="all-leases-tab" class="tab-content active">
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>AGREEMENT ID</th>
                                        <th>TENANT</th>
                                        <th>PROPERTY</th>
                                        <th>LEASE PERIOD</th>
                                        <th>RENT</th>
                                        <th>STATUS</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="agreement-row" onclick="selectAgreement('AGR-001')">
                                        <td class="font-medium">AGR-001</td>
                                        <td>Sarah Johnson</td>
                                        <td>Sunset Apartments 2A</td>
                                        <td>2023-06-01 to 2024-05-31</td>
                                        <td class="font-semibold text-primary">Rs 20,000</td>
                                        <td><span class="status-badge approved">Validated</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="View Agreement">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn-icon" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="agreement-row" onclick="selectAgreement('AGR-002')">
                                        <td class="font-medium">AGR-002</td>
                                        <td>Mike Chen</td>
                                        <td>Downtown Lofts 5B</td>
                                        <td>2023-09-15 to 2024-09-14</td>
                                        <td class="font-semibold text-primary">Rs 30,000</td>
                                        <td><span class="status-badge pending">Pending Review</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="View Agreement">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn-icon" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="agreement-row" onclick="selectAgreement('AGR-003')">
                                        <td class="font-medium">AGR-003</td>
                                        <td>Emma Davis</td>
                                        <td>Riverside Houses 12</td>
                                        <td>2023-03-01 to 2024-02-29</td>
                                        <td class="font-semibold text-primary">Rs 25,000</td>
                                        <td><span class="status-badge approved">Validated</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="View Agreement">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn-icon" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="agreement-row" onclick="selectAgreement('AGR-004')">
                                        <td class="font-medium">AGR-004</td>
                                        <td>Alex Rodriguez</td>
                                        <td>Garden View Condos 3C</td>
                                        <td>2024-01-15 to 2025-01-14</td>
                                        <td class="font-semibold text-primary">Rs 20,000</td>
                                        <td><span class="status-badge rejected">Rejected</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="View Agreement">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn-icon" title="Download">
                                                    <i class="fas fa-download"></i>
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
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/manager_footer.php'; ?>