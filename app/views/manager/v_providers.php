<?php require APPROOT . '/views/inc/manager_header.php'; ?>

<div class="providers-content">
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">Service Provider Assignment</h1>
            <p class="page-subtitle">Manage service providers and assign them to maintenance requests.</p>
        </div>
        <div class="header-right">
        </div>
    </div>

    <!-- Search Bar -->
    <div class="dashboard-section">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search providers..." id="providerSearch">
        </div>
    </div>

    <!-- Service Provider Cards -->
    <div class="providers-grid">
        <div class="provider-card">
            <div class="provider-header">
                <div class="provider-info">
                    <h3 class="provider-name">ABC Plumbing Services</h3>
                    <p class="provider-specialty">Plumbing</p>
                    <div class="provider-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">4.8 (124 reviews)</span>
                    </div>
                </div>
                <span class="status-badge approved">Active</span>
            </div>

            <div class="provider-contact">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>(555) 123-4567</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>contact@abcplumbing.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>123 Service St, City</span>
                </div>
            </div>

            <div class="provider-stats">
                <span><strong>Completed Jobs:</strong> 45</span>
                <span class="status-badge approved">Available</span>
            </div>

            <div class="provider-actions">
                <button class="btn btn-secondary">View Profile</button>
                <button class="btn btn-primary">
                    <i class="fas fa-user-check"></i>
                    Assign
                </button>
            </div>
        </div>

        <div class="provider-card">
            <div class="provider-header">
                <div class="provider-info">
                    <h3 class="provider-name">Cool Air HVAC</h3>
                    <p class="provider-specialty">HVAC</p>
                    <div class="provider-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="rating-text">4.6 (89 reviews)</span>
                    </div>
                </div>
                <span class="status-badge approved">Active</span>
            </div>

            <div class="provider-contact">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>(555) 234-5678</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@coolair.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>456 Climate Ave, City</span>
                </div>
            </div>

            <div class="provider-stats">
                <span><strong>Completed Jobs:</strong> 32</span>
                <span class="status-badge approved">Available</span>
            </div>

            <div class="provider-actions">
                <button class="btn btn-secondary">View Profile</button>
                <button class="btn btn-primary">
                    <i class="fas fa-user-check"></i>
                    Assign
                </button>
            </div>
        </div>

        <div class="provider-card">
            <div class="provider-header">
                <div class="provider-info">
                    <h3 class="provider-name">ElectricPro Solutions</h3>
                    <p class="provider-specialty">Electrical</p>
                    <div class="provider-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">4.9 (156 reviews)</span>
                    </div>
                </div>
                <span class="status-badge approved">Active</span>
            </div>

            <div class="provider-contact">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>(555) 345-6789</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>hello@electricpro.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>789 Power Ln, City</span>
                </div>
            </div>

            <div class="provider-stats">
                <span><strong>Completed Jobs:</strong> 67</span>
                <span class="status-badge approved">Available</span>
            </div>

            <div class="provider-actions">
                <button class="btn btn-secondary">View Profile</button>
                <button class="btn btn-primary">
                    <i class="fas fa-user-check"></i>
                    Assign
                </button>
            </div>
        </div>
    </div>

    <!-- Manual Status Update -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Manual Status Update</h3>
        </div>
        <form class="status-update-form">
            <div class="form-grid">
                <div class="form-group">
                    <label for="requestId">Maintenance Request ID</label>
                    <select id="requestId" name="requestId" required>
                        <option value="">Select Request</option>
                        <option value="MNT-001">MNT-001</option>
                        <option value="MNT-002">MNT-002</option>
                        <option value="MNT-003">MNT-003</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="newStatus">New Status</label>
                    <select id="newStatus" name="newStatus" required>
                        <option value="">Select Status</option>
                        <option value="requested">Requested</option>
                        <option value="quoted">Quoted</option>
                        <option value="approved">Approved</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary full-width">Update Status</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/manager_footer.php'; ?>