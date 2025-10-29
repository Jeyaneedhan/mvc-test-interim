<?php require APPROOT . '/views/inc/admin_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Properties Management</h2>
            <p>Manage, approve, and oversee all property listings</p>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <div class="search-filter-content">
            <div class="search-input-wrapper">
                <input type="text" class="form-input" placeholder="Search properties..." id="searchProperties">
            </div>
            <div class="filter-dropdown-wrapper">
                <select class="form-select" id="filterProperties">
                    <option value="">All Properties</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Property Listings Table -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Property Listings (4)</h3>
        </div>

        <div class="table-container">
            <table class="data-table properties-table">
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>Location</th>
                        <th>Owner</th>
                        <th>Manager</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Property 1 - Luxury Apartment Downtown -->
                    <tr>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Luxury Apartment Downtown</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-location">
                                <div>Downtown,</div>
                                <div>City Center</div>
                            </div>
                        </td>
                        <td>
                            <div class="owner-info">
                                <div class="owner-name">John Smith</div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-name">Sarah Wilson</div>
                            </div>
                        </td>
                        <td>Apartment</td>
                        <td>Rs 25,500/month</td>
                        <td><span class="status-badge approved">Approved</span></td>
                        <td>
                            <div class="property-actions">
                                <button class="action-btn view-btn" onclick="viewProperty('P001')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit-btn" onclick="editProperty('P001')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn danger-btn" onclick="removeProperty('P001')" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Property 2 - Family House Suburbs -->
                    <tr>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Family House Suburbs</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-location">
                                <div>Westside,</div>
                                <div>Suburbs</div>
                            </div>
                        </td>
                        <td>
                            <div class="owner-info">
                                <div class="owner-name">Jane Doe</div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-name">Mike Brown</div>
                            </div>
                        </td>
                        <td>House</td>
                        <td>Rs 45,500/month</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="property-actions">
                                <button class="action-btn view-btn" onclick="viewProperty('P002')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn approve-btn" onclick="approveProperty('P002')" title="Approve">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="action-btn reject-btn" onclick="rejectProperty('P002')" title="Reject">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button class="action-btn danger-btn" onclick="removeProperty('P002')" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Property 3 - Studio Near University -->
                    <tr>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Studio Near University</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-location">
                                <div>University District</div>
                            </div>
                        </td>
                        <td>
                            <div class="owner-info">
                                <div class="owner-name">Mike Johnson</div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-name">Lisa Davis</div>
                            </div>
                        </td>
                        <td>Studio</td>
                        <td>Rs 55,500/month</td>
                        <td><span class="status-badge approved">Approved</span></td>
                        <td>
                            <div class="property-actions">
                                <button class="action-btn view-btn" onclick="viewProperty('P003')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn edit-btn" onclick="editProperty('P003')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn danger-btn" onclick="removeProperty('P003')" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Property 4 - Modern Condo -->
                    <tr>
                        <td>
                            <div class="property-info">
                                <div class="property-name">Modern Condo</div>
                            </div>
                        </td>
                        <td>
                            <div class="property-location">
                                <div>Midtown</div>
                            </div>
                        </td>
                        <td>
                            <div class="owner-info">
                                <div class="owner-name">Anna Lee</div>
                            </div>
                        </td>
                        <td>
                            <div class="manager-info">
                                <div class="manager-name">Tom Garcia</div>
                            </div>
                        </td>
                        <td>Condo</td>
                        <td>Rs 35,500/month</td>
                        <td><span class="status-badge rejected">Rejected</span></td>
                        <td>
                            <div class="property-actions">
                                <button class="action-btn view-btn" onclick="viewProperty('P004')" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="action-btn approve-btn" onclick="approveProperty('P004')" title="Re-approve">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="action-btn danger-btn" onclick="removeProperty('P004')" title="Remove">
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
    // Property Management Functions - Global scope for onclick handlers
    function viewProperty(propertyId) {
        console.log('Viewing property:', propertyId);
        showNotification('Opening property details...', 'info');
        // Here you would typically open a modal or navigate to property details page
    }

    function editProperty(propertyId) {
        console.log('Editing property:', propertyId);
        showNotification('Opening property editor...', 'info');
        // Here you would typically navigate to edit page or open edit modal
    }

    function approveProperty(propertyId) {
        if (confirm('Are you sure you want to approve this property?')) {
            const row = event.target.closest('tr');
            const statusCell = row.querySelector('.status-badge');
            const actionsCell = row.querySelector('.property-actions');

            // Update status
            statusCell.textContent = 'Approved';
            statusCell.className = 'status-badge approved';

            // Update actions - remove approve/reject, keep view, edit, remove
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="viewProperty('${propertyId}')" title="View">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-btn edit-btn" onclick="editProperty('${propertyId}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="action-btn danger-btn" onclick="removeProperty('${propertyId}')" title="Remove">
                <i class="fas fa-trash"></i>
            </button>
        `;

            showNotification('Property approved successfully!', 'success');
            updatePropertyStats();
        }
    }

    function rejectProperty(propertyId) {
        if (confirm('Are you sure you want to reject this property?')) {
            const row = event.target.closest('tr');
            const statusCell = row.querySelector('.status-badge');
            const actionsCell = row.querySelector('.property-actions');

            // Update status
            statusCell.textContent = 'Rejected';
            statusCell.className = 'status-badge rejected';

            // Update actions - show view, re-approve, remove
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="viewProperty('${propertyId}')" title="View">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-btn approve-btn" onclick="approveProperty('${propertyId}')" title="Re-approve">
                <i class="fas fa-check"></i>
            </button>
            <button class="action-btn danger-btn" onclick="removeProperty('${propertyId}')" title="Remove">
                <i class="fas fa-trash"></i>
            </button>
        `;

            showNotification('Property rejected successfully!', 'warning');
            updatePropertyStats();
        }
    }

    function removeProperty(propertyId) {
        if (confirm('Are you sure you want to remove this property? This action cannot be undone.')) {
            const row = event.target.closest('tr');
            row.remove();

            // Update property count
            const header = document.querySelector('.section-header h3');
            if (header) {
                const currentCount = parseInt(header.textContent.match(/\d+/)?.[0] || 0);
                header.textContent = `Property Listings (${Math.max(0, currentCount - 1)})`;
            }

            showNotification('Property removed successfully!', 'success');
        }
    }

    function updatePropertyStats() {
        // Add any stats update logic here if needed
        console.log('Property stats updated');
    }

    // Search and filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchProperties');
        const filterDropdown = document.getElementById('filterProperties');

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('.properties-table tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        }

        if (filterDropdown) {
            filterDropdown.addEventListener('change', function() {
                const filterValue = this.value.toLowerCase();
                const rows = document.querySelectorAll('.properties-table tbody tr');

                rows.forEach(row => {
                    if (filterValue === '') {
                        row.style.display = '';
                    } else {
                        const statusElement = row.querySelector('.status-badge');
                        if (statusElement) {
                            const status = statusElement.textContent.toLowerCase();
                            row.style.display = status.includes(filterValue) ? '' : 'none';
                        }
                    }
                });
            });
        }
    });
</script>

<?php require APPROOT . '/views/inc/admin_footer.php'; ?>