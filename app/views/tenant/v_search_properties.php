<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Search Properties</h2>
            <p>Find your perfect rental property</p>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="filters-section">
        <div class="filters-row">
            <div class="filter-group">
                <label>Location</label>
                <input type="text" class="form-input" placeholder="Enter location" id="locationFilter">
            </div>
            <div class="filter-group">
                <label>Min Price</label>
                <input type="number" class="form-input" placeholder="0" id="minPriceFilter">
            </div>
            <div class="filter-group">
                <label>Max Price</label>
                <input type="number" class="form-input" placeholder="50,000" id="maxPriceFilter">
            </div>
            <div class="filter-group">
                <label>Property Type</label>
                <select class="form-select" id="typeFilter">
                    <option value="">All Types</option>
                    <option value="Apartment">Apartment</option>
                    <option value="House">House</option>
                    <option value="Studio">Studio</option>
                </select>
            </div>
            <div class="filter-group">
                <button class="btn btn-primary" id="btn" onclick=" filterProperties()">Search</button>
            </div>
        </div>
    </div>

    <!-- Results Section -->
    <div class="table-section">
        <div class="section-header">
            <h3>Available Properties</h3>
        </div>

        <div class="properties-grid">
            <!-- Sample Properties -->
            <div class="property-card" data-location="downtown" data-type="Apartment" data-price="1200">
                <div class="property-image">
                    <img src="<?php echo URLROOT; ?>/images/properties/property-1.jpg" alt="Oak Street Apartment">
                    <div class="property-status">
                        <span class="status-badge available">Available</span>
                    </div>
                </div>

                <div class="property-content">
                    <div class="property-header">
                        <h4 class="property-title">Oak Street Apartment</h4>
                        <span class="property-price">Rs 20,000/mo</span>
                    </div>

                    <div class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Downtown</span>
                        <span class="separator">•</span>
                        <i class="fas fa-home"></i>
                        <span>Apartment</span>
                    </div>

                    <div class="property-features">
                        <span class="feature-tag">2 Bedrooms</span>
                        <span class="feature-tag">1 Bathroom</span>
                        <span class="feature-tag">Parking</span>
                        <span class="feature-tag">Furnished</span>
                    </div>

                    <div class="property-actions">
                        <button class="btn-property-action" onclick="reserveProperty(1)">
                            Reserve Property
                        </button>
                    </div>
                </div>
            </div>

            <div class="property-card" data-location="midtown" data-type="Studio" data-price="800">
                <div class="property-image">
                    <img src="<?php echo URLROOT; ?>/images/properties/property-3.jpg" alt=" Maple Avenue Studio">
                    <div class="property-status">
                        <span class="status-badge available">Available</span>
                    </div>
                </div>

                <div class="property-content">
                    <div class="property-header">
                        <h4 class="property-title">Maple Avenue Studio</h4>
                        <span class="property-price">Rs 40,000/mo</span>
                    </div>

                    <div class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Midtown</span>
                        <span class="separator">•</span>
                        <i class="fas fa-home"></i>
                        <span>Studio</span>
                    </div>

                    <div class="property-features">
                        <span class="feature-tag">1 Bedroom</span>
                        <span class="feature-tag">1 Bathroom</span>
                        <span class="feature-tag">Modern Kitchen</span>
                    </div>

                    <div class="property-actions">
                        <button class="btn-property-action" onclick="reserveProperty(2)">
                            Reserve Property
                        </button>
                    </div>
                </div>
            </div>

            <div class="property-card" data-location="suburbs" data-type="House" data-price="2500">
                <div class="property-image">
                    <img src="<?php echo URLROOT; ?>/images/properties/property-2.jpg" alt="Pine Street House">
                    <div class="property-status">
                        <span class="status-badge reserved">Reserved</span>
                    </div>
                </div>

                <div class="property-content">
                    <div class="property-header">
                        <h4 class="property-title">Pine Street House</h4>
                        <span class="property-price">Rs 35,000/mo</span>
                    </div>

                    <div class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Suburbs</span>
                        <span class="separator">•</span>
                        <i class="fas fa-home"></i>
                        <span>House</span>
                    </div>

                    <div class="property-features">
                        <span class="feature-tag">3 Bedrooms</span>
                        <span class="feature-tag">2 Bathrooms</span>
                        <span class="feature-tag">Garden</span>
                        <span class="feature-tag">Garage</span>
                    </div>

                    <div class="property-actions">
                        <button class="btn-property-action disabled" disabled>
                            Not Available
                        </button>
                    </div>
                </div>
            </div>

            <div class="property-card" data-location="uptown" data-type="Apartment" data-price="1500">
                <div class="property-image">
                    <img src="<?php echo URLROOT; ?>/images/properties/property-4.jpg" alt="Cedar Lane Condo">
                    <div class="property-status">
                        <span class="status-badge available">Available</span>
                    </div>
                </div>

                <div class="property-content">
                    <div class="property-header">
                        <h4 class="property-title">Cedar Lane Condo</h4>
                        <span class="property-price">Rs 25,000/mo</span>
                    </div>

                    <div class="property-location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Uptown</span>
                        <span class="separator">•</span>
                        <i class="fas fa-home"></i>
                        <span>Apartment</span>
                    </div>

                    <div class="property-features">
                        <span class="feature-tag">2 Bedrooms</span>
                        <span class="feature-tag">2 Bathrooms</span>
                        <span class="feature-tag">Balcony</span>
                        <span class="feature-tag">Gym Access</span>
                    </div>

                    <div class="property-actions">
                        <button class="btn-property-action" onclick="reserveProperty(4)">
                            Reserve Property
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reservation Modal -->
<div id="reservationModal" class="modal-overlay hidden">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Confirm Reservation</h3>
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Content will be populated by JavaScript -->
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>