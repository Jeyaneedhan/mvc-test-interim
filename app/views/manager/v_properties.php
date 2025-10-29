<?php require APPROOT . '/views/inc/manager_header.php'; ?>

<div class="properties-content">
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">Property Management</h1>
            <p class="page-subtitle">Manage your properties and their status</p>
        </div>
        <!-- <div class="header-right">
            <button class="btn btn-primary" onclick="openAddPropertyModal()">
                <i class="fas fa-plus"></i>
                Add Property
            </button>
        </div> -->
    </div>

    <div class="dashboard-section">
        <div class="section-header">
            <div class="search-filters">
                <input type="text" class="search-input" placeholder="Search properties..." id="propertySearch">
                <select class="filter-select" id="typeFilter">
                    <option value="">All Types</option>
                    <option value="apartment">Apartment</option>
                    <option value="house">House</option>
                    <option value="complex">Complex</option>
                    <option value="townhome">Townhome</option>
                    <option value="condo">Condo</option>
                </select>
            </div>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Address</th>
                        <th>Type</th>
                        <th>Units</th>
                        <th>Occupancy</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-medium">Oak Street Apartments</td>
                        <td>123 Oak Street</td>
                        <td>Apartment</td>
                        <td>12</td>
                        <td>
                            <span class="font-medium">10/12</span>
                            <span class="text-muted">(83%)</span>
                        </td>
                        <td><span class="status-badge approved">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-icon" title="Edit Property">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon" title="View Documents">
                                    <i class="fas fa-file-text"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-medium">Pine Avenue House</td>
                        <td>456 Pine Avenue</td>
                        <td>House</td>
                        <td>1</td>
                        <td>
                            <span class="font-medium">1/1</span>
                            <span class="text-muted">(100%)</span>
                        </td>
                        <td><span class="status-badge approved">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-icon" title="Edit Property">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon" title="View Documents">
                                    <i class="fas fa-file-text"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-medium">Maple Drive Complex</td>
                        <td>789 Maple Drive</td>
                        <td>Complex</td>
                        <td>24</td>
                        <td>
                            <span class="font-medium">22/24</span>
                            <span class="text-muted">(92%)</span>
                        </td>
                        <td><span class="status-badge approved">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-icon" title="Edit Property">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon" title="View Documents">
                                    <i class="fas fa-file-text"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-medium">Cedar Lane Townhomes</td>
                        <td>321 Cedar Lane</td>
                        <td>Townhome</td>
                        <td>8</td>
                        <td>
                            <span class="font-medium">6/8</span>
                            <span class="text-muted">(75%)</span>
                        </td>
                        <td><span class="status-badge pending">Maintenance</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn-icon" title="Edit Property">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon" title="View Documents">
                                    <i class="fas fa-file-text"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Property Modal -->
<div id="addPropertyModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Add New Property</h2>
            <p class="modal-description">Enter the details for the new property. All fields marked with * are required.</p>
            <button class="modal-close" onclick="closeAddPropertyModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="addPropertyForm">
                <!-- Enhanced form layout matching React modal structure -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="propertyName">Property Name *</label>
                        <input type="text" id="propertyName" name="propertyName" placeholder="e.g., Oak Street Apartments" required>
                    </div>
                    <div class="form-group">
                        <label for="propertyType">Property Type *</label>
                        <select id="propertyType" name="propertyType" required>
                            <option value="">Select type</option>
                            <option value="apartment">Apartment</option>
                            <option value="house">House</option>
                            <option value="complex">Complex</option>
                            <option value="townhome">Townhome</option>
                            <option value="condo">Condo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="propertyAddress">Address *</label>
                    <input type="text" id="propertyAddress" name="propertyAddress" placeholder="Full property address" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="propertyUnits">Number of Units *</label>
                        <input type="number" id="propertyUnits" name="propertyUnits" min="1" placeholder="e.g., 12" required>
                    </div>
                    <div class="form-group">
                        <label for="monthlyRent">Monthly Rent</label>
                        <input type="text" id="monthlyRent" name="monthlyRent" placeholder="e.g., $1,200">
                    </div>
                </div>

                <div class="form-group">
                    <label for="propertyDescription">Description</label>
                    <textarea id="propertyDescription" name="propertyDescription" rows="3" placeholder="Additional details about the property..."></textarea>
                </div>

                <div class="form-group">
                    <label for="propertyStatus">Status</label>
                    <select id="propertyStatus" name="propertyStatus">
                        <option value="active">Active</option>
                        <option value="maintenance">Under Maintenance</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeAddPropertyModal()">Cancel</button>
            <button type="submit" class="btn btn-primary" form="addPropertyForm">Add Property</button>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/manager_footer.php'; ?>