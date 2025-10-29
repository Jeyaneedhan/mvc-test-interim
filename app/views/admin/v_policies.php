<?php require APPROOT . '/views/inc/admin_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Policy Management</h2>
            <p>Create and manage rental policies and documents</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-primary" onclick="createPolicy()">
                <i class="fas fa-plus"></i> Create Policy
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-file-text"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">3</h3>
                <p class="stat-label">Total Policies</p>
                <span class="stat-change">All documents</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">2</h3>
                <p class="stat-label">Active Policies</p>
                <span class="stat-change positive">Currently enforced</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">1</h3>
                <p class="stat-label">Draft Policies</p>
                <span class="stat-change">Under development</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">15/06/2024</h3>
                <p class="stat-label">Last Updated</p>
                <span class="stat-change">Recent policy update</span>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <div class="search-filter-content">
            <div class="search-input-wrapper">
                <input type="text" class="form-input" placeholder="Search policies..." id="searchPolicies">
            </div>
            <div class="filter-dropdown-wrapper">
                <select class="form-select" id="filterPolicies">
                    <option value="">All Policies</option>
                    <option value="active">Active</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Policy Documents -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Policy Documents (3)</h3>
        </div>

        <div class="table-container">
            <table class="data-table policies-table">
                <thead>
                    <tr>
                        <th>Policy</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Version</th>
                        <th>Last Updated</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="active">
                        <td>
                            <div class="policy-info">
                                <div class="policy-icon">
                                    <i class="fas fa-file-contract"></i>
                                </div>
                                <div class="policy-details">
                                    <div class="policy-name">Tenant Application Process</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge rental">Rental</span>
                        </td>
                        <td>
                            <div class="policy-description">Guidelines for tenant screening and application process</div>
                        </td>
                        <td>v2.1</td>
                        <td>15/06/2024</td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>
                            <div class="policy-actions">
                                <button class="action-btn view-btn" onclick="viewPolicy('POL001')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit-btn" onclick="editPolicy('POL001')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn status-btn" onclick="deactivatePolicy('POL001')" title="Deactivate">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button class="action-btn danger-btn" onclick="deletePolicy('POL001')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-status="active">
                        <td>
                            <div class="policy-info">
                                <div class="policy-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="policy-details">
                                    <div class="policy-name">Security Deposit Policy</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge security">Security</span>
                        </td>
                        <td>
                            <div class="policy-description">Rules regarding security deposit collection and return</div>
                        </td>
                        <td>v1.3</td>
                        <td>20/05/2024</td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>
                            <div class="policy-actions">
                                <button class="action-btn view-btn" onclick="viewPolicy('POL002')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit-btn" onclick="editPolicy('POL002')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn status-btn" onclick="deactivatePolicy('POL002')" title="Deactivate">
                                    <i class="fas fa-pause"></i>
                                </button>
                                <button class="action-btn danger-btn" onclick="deletePolicy('POL002')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-status="draft">
                        <td>
                            <div class="policy-info">
                                <div class="policy-icon">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="policy-details">
                                    <div class="policy-name">Maintenance Request Protocol</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="category-badge maintenance">Maintenance</span>
                        </td>
                        <td>
                            <div class="policy-description">Process for handling maintenance requests and scheduling</div>
                        </td>
                        <td>v1.0</td>
                        <td>01/07/2024</td>
                        <td><span class="status-badge draft">Draft</span></td>
                        <td>
                            <div class="policy-actions">
                                <button class="action-btn view-btn" onclick="viewPolicy('POL003')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit-btn" onclick="editPolicy('POL003')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn approve-btn" onclick="activatePolicy('POL003')" title="Activate">
                                    <i class="fas fa-play"></i>
                                </button>
                                <button class="action-btn danger-btn" onclick="deletePolicy('POL003')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Policy Management Functions - Global scope for onclick handlers
    function createPolicy() {
        showNotification('Create Policy functionality to be implemented', 'info');
        // Here you would open a create policy modal or navigate to create page
    }

    function viewPolicy(policyId) {
        console.log('Viewing policy:', policyId);
        showNotification('Opening policy viewer...', 'info');
        // Here you would open a view modal or navigate to view page
    }

    function editPolicy(policyId) {
        console.log('Editing policy:', policyId);
        showNotification('Opening policy editor...', 'info');
        // Here you would open an edit modal or navigate to edit page
    }

    function activatePolicy(policyId) {
        if (confirm('Are you sure you want to activate this policy?')) {
            const row = event.target.closest('tr');
            const statusCell = row.querySelector('.status-badge');
            const actionsCell = row.querySelector('.policy-actions');

            // Update status
            statusCell.textContent = 'Active';
            statusCell.className = 'status-badge active';

            // Update data attribute
            row.dataset.status = 'active';

            // Update actions - show deactivate instead of activate
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="viewPolicy('${policyId}')" title="View">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-btn edit-btn" onclick="editPolicy('${policyId}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="action-btn status-btn" onclick="deactivatePolicy('${policyId}')" title="Deactivate">
                <i class="fas fa-pause"></i>
            </button>
            <button class="action-btn danger-btn" onclick="deletePolicy('${policyId}')" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        `;

            showNotification('Policy activated successfully!', 'success');
            updatePolicyStats();
        }
    }

    function deactivatePolicy(policyId) {
        if (confirm('Are you sure you want to deactivate this policy?')) {
            const row = event.target.closest('tr');
            const statusCell = row.querySelector('.status-badge');
            const actionsCell = row.querySelector('.policy-actions');

            // Update status
            statusCell.textContent = 'Draft';
            statusCell.className = 'status-badge draft';

            // Update data attribute
            row.dataset.status = 'draft';

            // Update actions - show activate instead of deactivate
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="viewPolicy('${policyId}')" title="View">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-btn edit-btn" onclick="editPolicy('${policyId}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="action-btn approve-btn" onclick="activatePolicy('${policyId}')" title="Activate">
                <i class="fas fa-play"></i>
            </button>
            <button class="action-btn danger-btn" onclick="deletePolicy('${policyId}')" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        `;

            showNotification('Policy deactivated successfully!', 'warning');
            updatePolicyStats();
        }
    }

    function deletePolicy(policyId) {
        if (confirm('Are you sure you want to delete this policy? This action cannot be undone.')) {
            const row = event.target.closest('tr');
            row.remove();

            // Update count in section header
            const sectionHeader = document.querySelector('.section-header h3');
            if (sectionHeader) {
                const currentCount = parseInt(sectionHeader.textContent.match(/\((\d+)\)/)?.[1] || 0);
                sectionHeader.textContent = `Policy Documents (${Math.max(0, currentCount - 1)})`;
            }

            showNotification('Policy deleted successfully!', 'success');
            updatePolicyStats();
        }
    }

    function updatePolicyStats() {
        const rows = document.querySelectorAll('.policies-table tbody tr');
        const totalPolicies = rows.length;

        let activeCount = 0;
        let draftCount = 0;

        rows.forEach(row => {
            const status = row.dataset.status;
            if (status === 'active') activeCount++;
            if (status === 'draft') draftCount++;
        });

        // Update stat cards
        const statCards = document.querySelectorAll('.stat-card');
        if (statCards.length >= 4) {
            // Total Policies
            const totalStatNumber = statCards[0].querySelector('.stat-number');
            if (totalStatNumber) totalStatNumber.textContent = totalPolicies;

            // Active Policies
            const activeStatNumber = statCards[1].querySelector('.stat-number');
            if (activeStatNumber) activeStatNumber.textContent = activeCount;

            // Draft Policies
            const draftStatNumber = statCards[2].querySelector('.stat-number');
            if (draftStatNumber) draftStatNumber.textContent = draftCount;
        }
    }

    // Search and filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchPolicies');
        const filterDropdown = document.getElementById('filterPolicies');

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                filterPolicies(searchTerm, filterDropdown.value);
            });
        }

        if (filterDropdown) {
            filterDropdown.addEventListener('change', function() {
                const searchTerm = searchInput.value.toLowerCase();
                filterPolicies(searchTerm, this.value);
            });
        }
    });

    function filterPolicies(searchTerm, statusFilter) {
        const rows = document.querySelectorAll('.policies-table tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            const rowStatus = row.dataset.status;

            const matchesSearch = !searchTerm || rowText.includes(searchTerm);
            const matchesStatus = !statusFilter || rowStatus === statusFilter;

            if (matchesSearch && matchesStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update section header count
        const sectionHeader = document.querySelector('.section-header h3');
        if (sectionHeader) {
            const baseText = sectionHeader.textContent.replace(/\(\d+\)/, '');
            sectionHeader.textContent = `${baseText}(${visibleCount})`;
        }
    }
</script>

<?php require APPROOT . '/views/inc/admin_footer.php'; ?>