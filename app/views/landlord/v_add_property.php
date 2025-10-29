<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<!-- Page Header -->
<div class="page-header">
    <div class="header-left">
        <h1 class="page-title">Add New Property</h1>
        <p class="page-subtitle">Choose your property management type</p>
    </div>
    <div class="header-actions">
        <a href="<?php echo URLROOT; ?>/landlord/properties" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Back to Properties
        </a>
    </div>
</div>

<!-- Property Type Tabs -->
<div class="property-type-selector">
    <div class="tabs-container">
        <button class="tab-btn active" onclick="switchPropertyType('rent')" id="rentTab">
            <div class="tab-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="tab-content">
                <h3>For Rent</h3>
                <p>List property for tenants with full rental details</p>
            </div>
        </button>
        <button class="tab-btn" onclick="switchPropertyType('maintenance')" id="maintenanceTab">
            <div class="tab-icon">
                <i class="fas fa-tools"></i>
            </div>
            <div class="tab-content">
                <h3>Maintenance Only</h3>
                <p>Track property maintenance without rental listing</p>
            </div>
        </button>
    </div>
</div>

<!-- Upload Limits Warning -->
<div class="upload-limits-warning">
    <div class="warning-icon">
        <i class="fas fa-info-circle"></i>
    </div>
    <div class="warning-content">
        <h4>File Upload Limits</h4>
        <p>
            <strong>Maximum per image:</strong> 2MB &nbsp;•&nbsp;
            <strong>Maximum images:</strong> 5 &nbsp;•&nbsp;
            <strong>Total upload limit:</strong> <?php echo isset($data['max_post_size']) ? number_format($data['max_post_size'] / 1024 / 1024, 1) . 'MB' : '8MB'; ?>
        </p>
        <p><small>For best results, compress images before uploading. Supported formats: JPG, PNG, GIF, WebP</small></p>
    </div>
</div>

<!-- Rent Property Form -->
<div id="rentPropertyForm" class="property-form-container">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">Rental Property Information</h2>
        </div>
        <div class="card-body">
            <form id="addRentPropertyForm" action="<?php echo URLROOT; ?>/landlord/add_property" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="listing_type" value="rent">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <!-- Left Column -->
                    <div>
                        <div class="form-group">
                            <label class="form-label">Property Address *</label>
                            <input type="text" class="form-control" id="address" name="address" required
                                value="<?php echo $data['address'] ?? ''; ?>">
                            <span class="error-message" id="address-error"></span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Property Type *</label>
                            <select class="form-control" id="property_type" name="type" required>
                                <option value="">Select Type</option>
                                <option value="apartment" <?php echo ($data['type'] ?? '') == 'apartment' ? 'selected' : ''; ?>>Apartment</option>
                                <option value="house" <?php echo ($data['type'] ?? '') == 'house' ? 'selected' : ''; ?>>House</option>
                                <option value="condo" <?php echo ($data['type'] ?? '') == 'condo' ? 'selected' : ''; ?>>Condo</option>
                                <option value="townhouse" <?php echo ($data['type'] ?? '') == 'townhouse' ? 'selected' : ''; ?>>Townhouse</option>
                            </select>
                            <span class="error-message" id="type-error"></span>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group">
                                <label class="form-label">Bedrooms *</label>
                                <select class="form-control" id="bedrooms" name="bedrooms" required>
                                    <option value="">Select</option>
                                    <option value="0" <?php echo ($data['bedrooms'] ?? '') == '0' ? 'selected' : ''; ?>>Studio</option>
                                    <option value="1" <?php echo ($data['bedrooms'] ?? '') == '1' ? 'selected' : ''; ?>>1 Bedroom</option>
                                    <option value="2" <?php echo ($data['bedrooms'] ?? '') == '2' ? 'selected' : ''; ?>>2 Bedrooms</option>
                                    <option value="3" <?php echo ($data['bedrooms'] ?? '') == '3' ? 'selected' : ''; ?>>3 Bedrooms</option>
                                    <option value="4" <?php echo ($data['bedrooms'] ?? '') == '4' ? 'selected' : ''; ?>>4+ Bedrooms</option>
                                </select>
                                <span class="error-message" id="bedrooms-error"></span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Bathrooms *</label>
                                <select class="form-control" id="bathrooms" name="bathrooms" required>
                                    <option value="">Select</option>
                                    <option value="1" <?php echo ($data['bathrooms'] ?? '') == '1' ? 'selected' : ''; ?>>1 Bathroom</option>
                                    <option value="2" <?php echo ($data['bathrooms'] ?? '') == '2' ? 'selected' : ''; ?>>2 Bathrooms</option>
                                    <option value="3" <?php echo ($data['bathrooms'] ?? '') == '3' ? 'selected' : ''; ?>>3+ Bathrooms</option>
                                </select>
                                <span class="error-message" id="bathrooms-error"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Square Footage</label>
                            <input type="number" min="1"
                                max="50000" step="1" class="form-control" id="sqft" name="sqft" placeholder="e.g., 1200"
                                value="<?php echo $data['sqft'] ?? ''; ?>">
                        </div>

                        <!-- Rent Optimizer Section -->
                        <div class="form-group">
                            <div class="rent-optimizer-trigger">
                                <div class="optimizer-content">
                                    <div class="optimizer-icon">
                                        <i class="fas fa-brain"></i>
                                    </div>
                                    <div class="optimizer-text">
                                        <h4>Smart Rent Suggestion</h4>
                                        <p>Let AI analyze 100+ Colombo properties to suggest optimal rent</p>
                                    </div>
                                </div>
                                <button type="button"
                                    class="btn-optimizer"
                                    id="suggestRentBtn"
                                    onclick="getSuggestedRent()">
                                    <i class="fas fa-chart-line"></i> Get Suggestion
                                </button>
                            </div>
                        </div>

                        <!-- Rent Suggestion Result Box -->
                        <div id="rentSuggestion" class="rent-suggestion-box" style="display: none;">
                            <div class="suggestion-header">
                                <h4><i class="fas fa-robot"></i> AI Rent Analysis</h4>
                                <button type="button" class="close-btn" onclick="closeSuggestion()">×</button>
                            </div>

                            <div class="suggestion-content" id="suggestionContent">
                                <!-- Market Average -->
                                <div class="stat-item">
                                    <span class="stat-label">Market Average:</span>
                                    <span class="stat-value" id="marketAverage">-</span>
                                </div>

                                <!-- Suggested Rent (Main) -->
                                <div class="stat-item primary">
                                    <span class="stat-label">Recommended Rent:</span>
                                    <span class="stat-value" id="suggestedRent">-</span>
                                </div>

                                <!-- Rent Range -->
                                <div class="stat-item">
                                    <span class="stat-label">Competitive Range:</span>
                                    <span class="stat-value" id="rentRange">-</span>
                                </div>

                                <!-- Confidence Score -->
                                <div class="stat-item">
                                    <span class="stat-label">Confidence:</span>
                                    <span class="stat-value">
                                        <span id="confidenceScore">-</span>
                                        <div class="confidence-bar">
                                            <div id="confidenceBarFill" class="confidence-fill"></div>
                                        </div>
                                    </span>
                                </div>

                                <!-- Similar Properties Count -->
                                <div class="stat-item">
                                    <span class="stat-label">Analysis Based On:</span>
                                    <span class="stat-value" id="similarCount">-</span>
                                </div>

                                <!-- Action Buttons -->
                                <div class="suggestion-actions">
                                    <button type="button"
                                        class="btn btn-primary btn-accept"
                                        onclick="acceptSuggestion()">
                                        <i class="fas fa-check-circle"></i> Use This Rent
                                    </button>
                                    <button type="button"
                                        class="btn btn-outline"
                                        onclick="closeSuggestion()">
                                        <i class="fas fa-times"></i> Dismiss
                                    </button>
                                </div>
                            </div>

                            <div class="suggestion-loading" id="suggestionLoading" style="display: none;">
                                <div class="spinner"></div>
                                <p>🔍 Analyzing 100+ Colombo properties...</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Monthly Rent (Rs) *</label>
                            <input type="number"
                                class="form-control"
                                id="rent"
                                name="rent"
                                required
                                placeholder="e.g., 25000"
                                min="1000"
                                max="10000000"
                                step="100"
                                value="<?php echo $data['rent'] ?? ''; ?>">
                            <small style="color: var(--text-secondary); font-size: 0.875rem;">
                                <i class="fas fa-info-circle"></i> Use AI suggestion above or enter custom amount
                            </small>
                            <span class="error-message" id="rent-error"></span>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="form-group">
                            <label class="form-label">Security Deposit (Rs)</label>
                            <input type="number"
                                class="form-control"
                                id="deposit"
                                name="deposit"
                                placeholder="e.g., 25000"
                                min="0"
                                max="10000000"
                                step="100"
                                value="<?php echo $data['deposit'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Available Date</label>
                            <input type="date" class="form-control" name="available_date"
                                value="<?php echo $data['available_date'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Parking Spaces</label>
                            <select class="form-control" id="parking" name="parking">
                                <option value="0" <?php echo ($data['parking'] ?? '0') == '0' ? 'selected' : ''; ?>>No Parking</option>
                                <option value="1" <?php echo ($data['parking'] ?? '') == '1' ? 'selected' : ''; ?>>1 Space</option>
                                <option value="2" <?php echo ($data['parking'] ?? '') == '2' ? 'selected' : ''; ?>>2 Spaces</option>
                                <option value="3" <?php echo ($data['parking'] ?? '') == '3' ? 'selected' : ''; ?>>3+ Spaces</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pet Policy</label>
                            <select class="form-control" id="pet_policy" name="pets">
                                <option value="no" <?php echo ($data['pets'] ?? 'no') == 'no' ? 'selected' : ''; ?>>No Pets</option>
                                <option value="cats" <?php echo ($data['pets'] ?? '') == 'cats' ? 'selected' : ''; ?>>Cats Only</option>
                                <option value="dogs" <?php echo ($data['pets'] ?? '') == 'dogs' ? 'selected' : ''; ?>>Dogs Only</option>
                                <option value="both" <?php echo ($data['pets'] ?? '') == 'both' ? 'selected' : ''; ?>>Cats & Dogs</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Laundry Facilities</label>
                            <select class="form-control" id="laundry" name="laundry">
                                <option value="none" <?php echo ($data['laundry'] ?? 'none') == 'none' ? 'selected' : ''; ?>>No Laundry</option>
                                <option value="shared" <?php echo ($data['laundry'] ?? '') == 'shared' ? 'selected' : ''; ?>>Shared Laundry</option>
                                <option value="hookups" <?php echo ($data['laundry'] ?? '') == 'hookups' ? 'selected' : ''; ?>>Washer/Dryer Hookups</option>
                                <option value="in_unit" <?php echo ($data['laundry'] ?? '') == 'in_unit' ? 'selected' : ''; ?>>In-Unit Washer/Dryer</option>
                                <option value="included" <?php echo ($data['laundry'] ?? '') == 'included' ? 'selected' : ''; ?>>Washer/Dryer Included</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Property Description</label>
                    <textarea class="form-control" name="description" rows="4"
                        placeholder="Describe the property, amenities, neighborhood, etc."><?php echo $data['description'] ?? ''; ?></textarea>
                </div>

                <!-- Property Photos -->
                <div class="form-group">
                    <label class="form-label">Property Photos (Optional)</label>
                    <div class="upload-zone" id="uploadZoneRent">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="upload-text">
                            <h4>Drag & Drop Images Here</h4>
                            <p>or click to browse files</p>
                            <small>Max 5 images • 2MB per image • JPG, PNG, GIF, WebP</small>
                        </div>
                        <input type="file" class="form-control" name="photos[]" multiple accept="image/*"
                            id="photoInputRent" style="display: none;">
                    </div>

                    <!-- Image Preview Container -->
                    <div id="imagePreviewContainerRent" class="image-preview-container" style="display: none;">
                        <div class="preview-header">
                            <h4>Selected Images (<span id="imageCountRent">0</span>/5)</h4>
                            <div class="preview-actions">
                                <span id="totalSizeDisplayRent" class="size-display">Total: 0 MB</span>
                                <button type="button" onclick="clearImages('rent')" class="btn btn-outline btn-sm">Clear All</button>
                            </div>
                        </div>
                        <div id="imagePreviewGridRent" class="image-preview-grid"></div>
                        <div id="uploadErrorsRent" class="upload-errors" style="display: none;"></div>
                    </div>
                </div>

                <!-- Document Upload Section -->
                <div class="form-group">
                    <label class="form-label">Additional Documents (Optional)</label>
                    <div class="document-upload-zone" id="documentUploadZoneRent">
                        <div class="upload-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <div class="upload-text">
                            <h4>Upload Property Documents</h4>
                            <p>Company Agreement, floor plans, etc.</p>
                            <small>Max 3 documents • 5MB per file • PDF, DOC, DOCX, JPG, PNG</small>
                        </div>
                        <input type="file" class="form-control" name="documents[]" multiple
                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif"
                            id="documentInputRent" style="display: none;">
                    </div>

                    <!-- Document Preview Container -->
                    <div id="documentPreviewContainerRent" class="document-preview-container" style="display: none;">
                        <div class="preview-header">
                            <h4>Selected Documents (<span id="documentCountRent">0</span>/3)</h4>
                            <div class="preview-actions">
                                <span id="documentSizeDisplayRent" class="size-display">Total: 0 MB</span>
                                <button type="button" onclick="clearDocuments('rent')" class="btn btn-outline btn-sm">Clear All</button>
                            </div>
                        </div>
                        <div id="documentPreviewGridRent" class="document-preview-grid"></div>
                        <div id="documentErrorsRent" class="upload-errors" style="display: none;"></div>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" id="submitBtnRent">
                        <i class="fas fa-plus"></i> Add Rental Property
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Maintenance Property Form -->
<div id="maintenancePropertyForm" class="property-form-container" style="display: none;">
    <div class="content-card">
        <div class="card-header">
            <h2 class="card-title">Maintenance Property Information</h2>
            <span class="badge badge-info">Simplified Form</span>
        </div>
        <div class="card-body">
            <form id="addMaintenancePropertyForm" action="<?php echo URLROOT; ?>/landlord/add_property" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="listing_type" value="maintenance">

                <!-- Notice about maintenance properties -->
                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <h4>Maintenance Only Properties</h4>
                        <p>This simplified form is for properties you want to track for maintenance purposes only. These properties won't be listed for rent.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Property Address *</label>
                    <input type="text" class="form-control" name="address" required
                        placeholder="Enter the property address">
                    <span class="error-message"></span>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label class="form-label">Property Type *</label>
                        <select class="form-control" name="type" required>
                            <option value="">Select Type</option>
                            <option value="apartment">Apartment</option>
                            <option value="house">House</option>
                            <option value="condo">Condo</option>
                            <option value="townhouse">Townhouse</option>
                            <option value="commercial">Commercial</option>
                            <option value="land">Land</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="error-message"></span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Square Footage (Optional)</label>
                        <input type="number" class="form-control" name="sqft"
                            placeholder="e.g., 1200" min="1" max="50000" step="1">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Current Occupant (Optional)</label>
                    <input type="text" class="form-control" name="current_occupant"
                        placeholder="Name of current tenant or occupant">
                </div>

                <div class="form-group">
                    <label class="form-label">Property Notes</label>
                    <textarea class="form-control" name="description" rows="4"
                        placeholder="Add any relevant notes about the property, maintenance history, special considerations, etc."></textarea>
                </div>

                <!-- Property Photos -->
                <div class="form-group">
                    <label class="form-label">Property Photos (Optional)</label>
                    <div class="upload-zone" id="uploadZoneMaintenance">
                        <div class="upload-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <div class="upload-text">
                            <h4>Add Property Photos</h4>
                            <p>Upload photos for maintenance reference</p>
                            <small>Max 5 images • 2MB per image</small>
                        </div>
                        <input type="file" class="form-control" name="photos[]" multiple accept="image/*"
                            id="photoInputMaintenance" style="display: none;">
                    </div>

                    <!-- Image Preview Container -->
                    <div id="imagePreviewContainerMaintenance" class="image-preview-container" style="display: none;">
                        <div class="preview-header">
                            <h4>Selected Images (<span id="imageCountMaintenance">0</span>/5)</h4>
                            <div class="preview-actions">
                                <span id="totalSizeDisplayMaintenance" class="size-display">Total: 0 MB</span>
                                <button type="button" onclick="clearImages('maintenance')" class="btn btn-outline btn-sm">Clear All</button>
                            </div>
                        </div>
                        <div id="imagePreviewGridMaintenance" class="image-preview-grid"></div>
                        <div id="uploadErrorsMaintenance" class="upload-errors" style="display: none;"></div>
                    </div>
                </div>

                <!-- Maintenance Documents -->
                <div class="form-group">
                    <label class="form-label">Maintenance Documents (Optional)</label>
                    <div class="document-upload-zone" id="documentUploadZoneMaintenance">
                        <div class="upload-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="upload-text">
                            <h4>Upload Documents</h4>
                            <p>Company Agreement, Warranty info, manuals, service records, etc.</p>
                            <small>Max 3 documents • 5MB per file</small>
                        </div>
                        <input type="file" class="form-control" name="documents[]" multiple
                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif"
                            id="documentInputMaintenance" style="display: none;">
                    </div>

                    <!-- Document Preview Container -->
                    <div id="documentPreviewContainerMaintenance" class="document-preview-container" style="display: none;">
                        <div class="preview-header">
                            <h4>Selected Documents (<span id="documentCountMaintenance">0</span>/3)</h4>
                            <div class="preview-actions">
                                <span id="documentSizeDisplayMaintenance" class="size-display">Total: 0 MB</span>
                                <button type="button" onclick="clearDocuments('maintenance')" class="btn btn-outline btn-sm">Clear All</button>
                            </div>
                        </div>
                        <div id="documentPreviewGridMaintenance" class="document-preview-grid"></div>
                        <div id="documentErrorsMaintenance" class="upload-errors" style="display: none;"></div>
                    </div>
                </div>

                <!-- Hidden fields with default values for required database fields -->
                <input type="hidden" name="bedrooms" value="0">
                <input type="hidden" name="bathrooms" value="1">
                <input type="hidden" name="rent" value="0">
                <input type="hidden" name="parking" value="0">
                <input type="hidden" name="pets" value="no">
                <input type="hidden" name="laundry" value="none">

                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" id="submitBtnMaintenance">
                        <i class="fas fa-plus"></i> Add Maintenance Property
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Enhanced Styles -->
<style>
    /* Property Type Tabs */
    .property-type-selector {
        margin-bottom: 2rem;
    }

    .tabs-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .tab-btn {
        background: white;
        border: 3px solid #e5e7eb;
        border-radius: 1rem;
        padding: 2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        text-align: left;
    }

    .tab-btn:hover {
        border-color: #3b82f6;
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.15);
    }

    .tab-btn.active {
        border-color: #3b82f6;
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
    }

    .tab-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
        flex-shrink: 0;
    }

    .tab-btn.active .tab-icon {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
    }

    .tab-content h3 {
        margin: 0 0 0.5rem 0;
        color: #1f2937;
        font-size: 1.25rem;
    }

    .tab-content p {
        margin: 0;
        color: #6b7280;
        font-size: 0.875rem;
    }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        border: 2px solid #60a5fa;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .info-box>i {
        font-size: 1.5rem;
        color: #2563eb;
        flex-shrink: 0;
        margin-top: 0.25rem;
    }

    .info-box h4 {
        margin: 0 0 0.5rem 0;
        color: #1d4ed8;
        font-size: 1rem;
    }

    .info-box p {
        margin: 0;
        color: #1e3a8a;
        font-size: 0.875rem;
    }

    /* Upload Limits Warning (existing styles) */
    .upload-limits-warning {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border: 2px solid #f59e0b;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .warning-icon {
        width: 48px;
        height: 48px;
        background: #f59e0b;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .warning-content h4 {
        margin: 0 0 0.5rem 0;
        color: #92400e;
        font-size: 1.125rem;
    }

    .warning-content p {
        margin: 0;
        color: #92400e;
        font-size: 0.9rem;
    }

    /* Enhanced Upload Zone */
    .upload-zone,
    .document-upload-zone {
        border: 3px dashed #d1d5db;
        border-radius: 0.75rem;
        padding: 3rem 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #fafafa;
        position: relative;
    }

    .upload-zone:hover,
    .document-upload-zone:hover {
        border-color: #3b82f6;
        background: #f0f9ff;
    }

    .upload-zone.dragover,
    .document-upload-zone.dragover {
        border-color: #10b981;
        background: #f0fdf4;
        transform: scale(1.02);
    }

    .document-upload-zone {
        border-color: #f59e0b;
        background: #fffbeb;
    }

    .document-upload-zone:hover {
        border-color: #f59e0b;
        background: #fef3c7;
    }

    .document-upload-zone.dragover {
        border-color: #d97706;
        background: #fef3c7;
    }

    .upload-icon {
        font-size: 3rem;
        color: #9ca3af;
        margin-bottom: 1rem;
    }

    .upload-text h4 {
        margin: 0 0 0.5rem 0;
        color: #374151;
        font-size: 1.25rem;
    }

    .upload-text p {
        margin: 0 0 0.5rem 0;
        color: #6b7280;
    }

    .upload-text small {
        color: #9ca3af;
        font-size: 0.813rem;
    }

    /* Enhanced Image Preview */
    .image-preview-container,
    .document-preview-container {
        border: 2px solid #e5e7eb;
        border-radius: 0.75rem;
        padding: 1.5rem;
        background: white;
        margin-top: 1rem;
    }

    .document-preview-container {
        border-color: #f59e0b;
    }

    .preview-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f3f4f6;
    }

    .preview-header h4 {
        margin: 0;
        color: #374151;
        font-size: 1.125rem;
    }

    .preview-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .size-display {
        font-size: 0.875rem;
        color: #6b7280;
        font-weight: 600;
    }

    .image-preview-grid,
    .document-preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 1rem;
    }

    .document-preview-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }

    .image-preview-item,
    .document-preview-item {
        position: relative;
        border-radius: 0.5rem;
        overflow: hidden;
        border: 2px solid #e5e7eb;
        background: white;
        transition: all 0.3s ease;
    }

    .image-preview-item {
        aspect-ratio: 1;
    }

    .document-preview-item {
        aspect-ratio: auto;
        padding: 1rem;
        min-height: 120px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        border-color: #f59e0b;
        background: #fffbeb;
    }

    .image-preview-item:hover,
    .document-preview-item:hover {
        border-color: #3b82f6;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .document-preview-item:hover {
        border-color: #f59e0b;
    }

    .image-preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-preview-item .remove-btn,
    .document-preview-item .remove-btn {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background: rgba(239, 68, 68, 0.9);
        color: white;
        border: none;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.875rem;
        transition: all 0.2s;
        backdrop-filter: blur(4px);
    }

    .image-preview-item .remove-btn:hover,
    .document-preview-item .remove-btn:hover {
        background: #dc2626;
        transform: scale(1.1);
    }

    .document-preview-item .doc-icon {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
        color: #f59e0b;
    }

    .document-preview-item .doc-icon.pdf {
        color: #dc2626;
    }

    .document-preview-item .doc-icon.doc {
        color: #2563eb;
    }

    .document-preview-item .doc-icon.docx {
        color: #2563eb;
    }

    .document-preview-item .doc-icon.image {
        color: #10b981;
    }

    .image-preview-item .file-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 0.5rem;
        font-size: 0.75rem;
    }

    .file-name {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        font-weight: 600;
    }

    .file-size {
        opacity: 0.8;
        margin-top: 0.25rem;
    }

    .upload-errors {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 0.5rem;
        padding: 1rem;
        margin-top: 1rem;
    }

    .upload-errors h5 {
        color: #dc2626;
        margin: 0 0 0.5rem 0;
        font-size: 0.875rem;
    }

    .upload-errors ul {
        margin: 0;
        padding-left: 1.25rem;
        color: #dc2626;
        font-size: 0.813rem;
    }

    /* Error Messages */
    .error-message {
        color: #dc2626;
        font-size: 0.813rem;
        margin-top: 0.25rem;
        display: block;
    }

    .form-control.error {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    /* Rent Optimizer Styles (from previous version) */
    .rent-optimizer-trigger {
        background: linear-gradient(135deg, #45a9eb 0%, #1e88e5 100%);
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 20px rgba(69, 169, 235, 0.35);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .rent-optimizer-trigger:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(69, 169, 235, 0.5);
    }

    .optimizer-content {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .optimizer-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
    }

    .optimizer-text {
        flex: 1;
        color: white;
    }

    .optimizer-text h4 {
        margin: 0 0 0.25rem 0;
        font-size: 1.125rem;
        font-weight: 700;
    }

    .optimizer-text p {
        margin: 0;
        font-size: 0.875rem;
        opacity: 0.95;
    }

    .btn-optimizer {
        width: 100%;
        background: white !important;
        color: #45a9eb !important;
        border: none !important;
        padding: 0.875rem 1.5rem !important;
        border-radius: 0.75rem !important;
        font-weight: 700 !important;
        font-size: 1rem !important;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .btn-optimizer:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        background: #f8f9fa !important;
    }

    /* Rent Suggestion Box */
    .rent-suggestion-box {
        background: white;
        border: 3px solid #10b981;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.2);
        animation: slideDown 0.4s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .suggestion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.25rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #e5e7eb;
    }

    .suggestion-header h4 {
        margin: 0;
        color: #059669;
        font-size: 1.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .close-btn {
        background: none;
        border: none;
        font-size: 1.75rem;
        color: #6b7280;
        cursor: pointer;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s;
    }

    .close-btn:hover {
        background: #fee2e2;
        color: #dc2626;
    }

    .suggestion-content {
        display: flex;
        flex-direction: column;
        gap: 0.875rem;
    }

    .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.875rem 1rem;
        background: #f9fafb;
        border-radius: 0.5rem;
        border-left: 4px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        background: #f3f4f6;
    }

    .stat-item.primary {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        font-weight: 700;
        font-size: 1.125rem;
        padding: 1.25rem 1rem;
        border-left: 4px solid #047857;
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3);
    }

    .stat-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.938rem;
    }

    .stat-item.primary .stat-label {
        color: white;
        font-size: 1rem;
    }

    .stat-value {
        font-weight: 700;
        color: #1f2937;
        font-size: 1.125rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stat-item.primary .stat-value {
        color: white;
        font-size: 1.625rem;
    }

    .confidence-bar {
        width: 120px;
        height: 12px;
        background: #e5e7eb;
        border-radius: 6px;
        overflow: hidden;
        display: inline-block;
        margin-left: 0.5rem;
    }

    .confidence-fill {
        height: 100%;
        background: linear-gradient(90deg, #10b981 0%, #059669 100%);
        transition: width 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 6px;
    }

    .suggestion-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.5rem;
        padding-top: 1.25rem;
        border-top: 2px solid #e5e7eb;
    }

    .suggestion-actions .btn {
        flex: 1;
    }

    .suggestion-loading {
        text-align: center;
        padding: 3rem 2rem;
    }

    .spinner {
        width: 60px;
        height: 60px;
        border: 6px solid #e5e7eb;
        border-top-color: #10b981;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 1.5rem;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .suggestion-loading p {
        color: #6b7280;
        margin: 0;
        font-weight: 600;
        font-size: 1.125rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .tabs-container {
            grid-template-columns: 1fr;
        }

        .tab-btn {
            padding: 1.5rem;
        }

        .upload-limits-warning {
            flex-direction: column;
            text-align: center;
        }

        .preview-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .preview-actions {
            width: 100%;
            justify-content: space-between;
        }

        .image-preview-grid {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }

        .document-preview-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }

        .optimizer-content {
            flex-direction: column;
            text-align: center;
        }

        .suggestion-actions {
            flex-direction: column;
        }

        .upload-zone,
        .document-upload-zone {
            padding: 2rem 1rem;
        }

        .upload-text h4 {
            font-size: 1.125rem;
        }
    }
</style>

<!-- Enhanced JavaScript -->
<script>
    const URLROOT = '<?php echo URLROOT; ?>';
    let currentFormType = 'rent';
    let suggestedRentValue = 0;

    // Separate file arrays for each form
    let selectedFilesRent = [];
    let selectedDocumentsRent = [];
    let selectedFilesMaintenance = [];
    let selectedDocumentsMaintenance = [];

    const MAX_FILES = 5;
    const MAX_DOCUMENTS = 3;
    const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2MB per file
    const MAX_DOCUMENT_SIZE = 5 * 1024 * 1024; // 5MB per document
    const ALLOWED_TYPES = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    const ALLOWED_DOCUMENT_TYPES = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'image/jpeg', 'image/jpg', 'image/png', 'image/gif'
    ];

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize upload functionality for both forms
        initializeUpload('rent');
        initializeUpload('maintenance');
        initializeDocumentUpload('rent');
        initializeDocumentUpload('maintenance');
        initializeFormValidation();
    });

    // Switch between property types
    function switchPropertyType(type) {
        currentFormType = type;

        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        document.getElementById(type + 'Tab').classList.add('active');

        // Show/hide forms
        document.getElementById('rentPropertyForm').style.display = type === 'rent' ? 'block' : 'none';
        document.getElementById('maintenancePropertyForm').style.display = type === 'maintenance' ? 'block' : 'none';

        // Scroll to form
        document.querySelector('.property-form-container').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    // Initialize upload functionality
    function initializeUpload(formType) {
        const uploadZone = document.getElementById('uploadZone' + capitalizeFirst(formType));
        const photoInput = document.getElementById('photoInput' + capitalizeFirst(formType));

        // Click to upload
        uploadZone.addEventListener('click', () => {
            photoInput.click();
        });

        // Drag and drop
        uploadZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadZone.classList.add('dragover');
        });

        uploadZone.addEventListener('dragleave', () => {
            uploadZone.classList.remove('dragover');
        });

        uploadZone.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadZone.classList.remove('dragover');
            handleFiles(e.dataTransfer.files, formType);
        });

        // File input change
        photoInput.addEventListener('change', (e) => {
            handleFiles(e.target.files, formType);
        });
    }

    // Initialize document upload functionality
    function initializeDocumentUpload(formType) {
        const documentUploadZone = document.getElementById('documentUploadZone' + capitalizeFirst(formType));
        const documentInput = document.getElementById('documentInput' + capitalizeFirst(formType));

        // Click to upload
        documentUploadZone.addEventListener('click', () => {
            documentInput.click();
        });

        // Drag and drop
        documentUploadZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            documentUploadZone.classList.add('dragover');
        });

        documentUploadZone.addEventListener('dragleave', () => {
            documentUploadZone.classList.remove('dragover');
        });

        documentUploadZone.addEventListener('drop', (e) => {
            e.preventDefault();
            documentUploadZone.classList.remove('dragover');
            handleDocuments(e.dataTransfer.files, formType);
        });

        // File input change
        documentInput.addEventListener('change', (e) => {
            handleDocuments(e.target.files, formType);
        });
    }

    // Handle file selection
    function handleFiles(files, formType) {
        const selectedFiles = formType === 'rent' ? selectedFilesRent : selectedFilesMaintenance;
        const errors = [];
        const validFiles = [];

        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            // Check file count
            if (selectedFiles.length + validFiles.length >= MAX_FILES) {
                errors.push(`Maximum ${MAX_FILES} images allowed`);
                break;
            }

            // Check file type
            if (!ALLOWED_TYPES.includes(file.type.toLowerCase())) {
                errors.push(`${file.name}: Invalid file type. Use JPG, PNG, GIF, or WebP`);
                continue;
            }

            // Check file size
            if (file.size > MAX_FILE_SIZE) {
                errors.push(`${file.name}: File too large. Maximum ${formatBytes(MAX_FILE_SIZE)} per image`);
                continue;
            }

            validFiles.push(file);
        }

        // Add valid files
        if (formType === 'rent') {
            selectedFilesRent = selectedFilesRent.concat(validFiles);
        } else {
            selectedFilesMaintenance = selectedFilesMaintenance.concat(validFiles);
        }

        updateFileInput(formType);
        displayImagePreviews(formType);
        displayUploadErrors(errors, formType);
    }

    // Handle document selection
    function handleDocuments(files, formType) {
        const selectedDocuments = formType === 'rent' ? selectedDocumentsRent : selectedDocumentsMaintenance;
        const errors = [];
        const validDocuments = [];

        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            // Check file count
            if (selectedDocuments.length + validDocuments.length >= MAX_DOCUMENTS) {
                errors.push(`Maximum ${MAX_DOCUMENTS} documents allowed`);
                break;
            }

            // Check file type
            if (!ALLOWED_DOCUMENT_TYPES.includes(file.type.toLowerCase())) {
                errors.push(`${file.name}: Invalid file type. Use PDF, DOC, DOCX, JPG, or PNG`);
                continue;
            }

            // Check file size
            if (file.size > MAX_DOCUMENT_SIZE) {
                errors.push(`${file.name}: File too large. Maximum ${formatBytes(MAX_DOCUMENT_SIZE)} per document`);
                continue;
            }

            validDocuments.push(file);
        }

        // Add valid documents
        if (formType === 'rent') {
            selectedDocumentsRent = selectedDocumentsRent.concat(validDocuments);
        } else {
            selectedDocumentsMaintenance = selectedDocumentsMaintenance.concat(validDocuments);
        }

        updateDocumentInput(formType);
        displayDocumentPreviews(formType);
        displayDocumentErrors(errors, formType);
    }

    // Display image previews
    function displayImagePreviews(formType) {
        const selectedFiles = formType === 'rent' ? selectedFilesRent : selectedFilesMaintenance;
        const container = document.getElementById('imagePreviewContainer' + capitalizeFirst(formType));
        const grid = document.getElementById('imagePreviewGrid' + capitalizeFirst(formType));
        const countSpan = document.getElementById('imageCount' + capitalizeFirst(formType));
        const sizeSpan = document.getElementById('totalSizeDisplay' + capitalizeFirst(formType));

        if (selectedFiles.length === 0) {
            container.style.display = 'none';
            return;
        }

        container.style.display = 'block';
        grid.innerHTML = '';
        countSpan.textContent = selectedFiles.length;

        let totalSize = 0;
        selectedFiles.forEach((file, index) => {
            totalSize += file.size;

            const reader = new FileReader();
            reader.onload = function(event) {
                const div = document.createElement('div');
                div.className = 'image-preview-item';
                div.innerHTML = `
                    <img src="${event.target.result}" alt="Preview">
                    <button type="button" class="remove-btn" onclick="removeImage(${index}, '${formType}')" title="Remove image">×</button>
                    <div class="file-info">
                        <div class="file-name">${file.name}</div>
                        <div class="file-size">${formatBytes(file.size)}</div>
                    </div>
                `;
                grid.appendChild(div);
            };
            reader.readAsDataURL(file);
        });

        sizeSpan.textContent = `Total: ${formatBytes(totalSize)}`;
    }

    // Display document previews
    function displayDocumentPreviews(formType) {
        const selectedDocuments = formType === 'rent' ? selectedDocumentsRent : selectedDocumentsMaintenance;
        const container = document.getElementById('documentPreviewContainer' + capitalizeFirst(formType));
        const grid = document.getElementById('documentPreviewGrid' + capitalizeFirst(formType));
        const countSpan = document.getElementById('documentCount' + capitalizeFirst(formType));
        const sizeSpan = document.getElementById('documentSizeDisplay' + capitalizeFirst(formType));

        if (selectedDocuments.length === 0) {
            container.style.display = 'none';
            return;
        }

        container.style.display = 'block';
        grid.innerHTML = '';
        countSpan.textContent = selectedDocuments.length;

        let totalSize = 0;
        selectedDocuments.forEach((file, index) => {
            totalSize += file.size;

            const div = document.createElement('div');
            div.className = 'document-preview-item';

            const extension = file.name.split('.').pop().toLowerCase();
            let iconClass = 'fas fa-file';
            let iconType = 'file';

            if (extension === 'pdf') {
                iconClass = 'fas fa-file-pdf';
                iconType = 'pdf';
            } else if (['doc', 'docx'].includes(extension)) {
                iconClass = 'fas fa-file-word';
                iconType = 'doc';
            } else if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                iconClass = 'fas fa-file-image';
                iconType = 'image';
            }

            div.innerHTML = `
                <button type="button" class="remove-btn" onclick="removeDocument(${index}, '${formType}')" title="Remove document">×</button>
                <div class="doc-icon ${iconType}">
                    <i class="${iconClass}"></i>
                </div>
                <div class="file-info">
                    <div class="file-name">${file.name}</div>
                    <div class="file-size">${formatBytes(file.size)}</div>
                </div>
            `;
            grid.appendChild(div);
        });

        sizeSpan.textContent = `Total: ${formatBytes(totalSize)}`;
    }

    // Remove image
    function removeImage(index, formType) {
        if (formType === 'rent') {
            selectedFilesRent.splice(index, 1);
        } else {
            selectedFilesMaintenance.splice(index, 1);
        }
        updateFileInput(formType);
        displayImagePreviews(formType);
        hideUploadErrors(formType);
    }

    // Remove document
    function removeDocument(index, formType) {
        if (formType === 'rent') {
            selectedDocumentsRent.splice(index, 1);
        } else {
            selectedDocumentsMaintenance.splice(index, 1);
        }
        updateDocumentInput(formType);
        displayDocumentPreviews(formType);
        hideDocumentErrors(formType);
    }

    // Clear all images
    function clearImages(formType) {
        if (formType === 'rent') {
            selectedFilesRent = [];
        } else {
            selectedFilesMaintenance = [];
        }
        updateFileInput(formType);
        displayImagePreviews(formType);
        hideUploadErrors(formType);
    }

    // Clear all documents
    function clearDocuments(formType) {
        if (formType === 'rent') {
            selectedDocumentsRent = [];
        } else {
            selectedDocumentsMaintenance = [];
        }
        updateDocumentInput(formType);
        displayDocumentPreviews(formType);
        hideDocumentErrors(formType);
    }

    // Update file input
    function updateFileInput(formType) {
        const selectedFiles = formType === 'rent' ? selectedFilesRent : selectedFilesMaintenance;
        const input = document.getElementById('photoInput' + capitalizeFirst(formType));
        const dt = new DataTransfer();

        selectedFiles.forEach(file => {
            dt.items.add(file);
        });

        input.files = dt.files;
    }

    // Update document input
    function updateDocumentInput(formType) {
        const selectedDocuments = formType === 'rent' ? selectedDocumentsRent : selectedDocumentsMaintenance;
        const input = document.getElementById('documentInput' + capitalizeFirst(formType));
        const dt = new DataTransfer();

        selectedDocuments.forEach(file => {
            dt.items.add(file);
        });

        input.files = dt.files;
    }

    // Display upload errors
    function displayUploadErrors(errors, formType) {
        const errorDiv = document.getElementById('uploadErrors' + capitalizeFirst(formType));

        if (errors.length === 0) {
            errorDiv.style.display = 'none';
            return;
        }

        errorDiv.style.display = 'block';
        errorDiv.innerHTML = `
            <h5><i class="fas fa-exclamation-triangle"></i> Image Upload Issues:</h5>
            <ul>
                ${errors.map(error => `<li>${error}</li>`).join('')}
            </ul>
        `;
    }

    // Display document errors
    function displayDocumentErrors(errors, formType) {
        const errorDiv = document.getElementById('documentErrors' + capitalizeFirst(formType));

        if (errors.length === 0) {
            errorDiv.style.display = 'none';
            return;
        }

        errorDiv.style.display = 'block';
        errorDiv.innerHTML = `
            <h5><i class="fas fa-exclamation-triangle"></i> Document Upload Issues:</h5>
            <ul>
                ${errors.map(error => `<li>${error}</li>`).join('')}
            </ul>
        `;
    }

    // Hide upload errors
    function hideUploadErrors(formType) {
        document.getElementById('uploadErrors' + capitalizeFirst(formType)).style.display = 'none';
    }

    // Hide document errors
    function hideDocumentErrors(formType) {
        document.getElementById('documentErrors' + capitalizeFirst(formType)).style.display = 'none';
    }

    // Format bytes
    function formatBytes(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Capitalize first letter
    function capitalizeFirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    // Initialize form validation
    function initializeFormValidation() {
        const rentForm = document.getElementById('addRentPropertyForm');
        const maintenanceForm = document.getElementById('addMaintenancePropertyForm');
        const submitBtnRent = document.getElementById('submitBtnRent');
        const submitBtnMaintenance = document.getElementById('submitBtnMaintenance');

        rentForm.addEventListener('submit', function(e) {
            if (!validateForm('rent')) {
                e.preventDefault();
                showNotification('Please fix the errors below', 'error');
                return false;
            }

            // Show loading state
            submitBtnRent.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding Property...';
            submitBtnRent.disabled = true;
        });

        maintenanceForm.addEventListener('submit', function(e) {
            if (!validateForm('maintenance')) {
                e.preventDefault();
                showNotification('Please fix the errors below', 'error');
                return false;
            }

            // Show loading state
            submitBtnMaintenance.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding Property...';
            submitBtnMaintenance.disabled = true;
        });
    }

    // Validate form
    function validateForm(formType) {
        let isValid = true;

        // Clear previous errors
        document.querySelectorAll('#' + formType + 'PropertyForm .error-message').forEach(el => el.textContent = '');
        document.querySelectorAll('#' + formType + 'PropertyForm .form-control').forEach(el => el.classList.remove('error'));

        if (formType === 'rent') {
            // Validate required fields for rent form
            const requiredFields = [{
                    name: 'address',
                    label: 'Property address'
                },
                {
                    name: 'type',
                    label: 'Property type'
                },
                {
                    name: 'bedrooms',
                    label: 'Number of bedrooms'
                },
                {
                    name: 'bathrooms',
                    label: 'Number of bathrooms'
                },
                {
                    name: 'rent',
                    label: 'Monthly rent'
                }
            ];

            requiredFields.forEach(field => {
                const element = document.querySelector(`#rentPropertyForm [name="${field.name}"]`);
                const value = element.value.trim();

                if (!value) {
                    showFieldError(element, `${field.label} is required`);
                    isValid = false;
                }
            });

            // Validate rent amount
            const rent = document.querySelector('#rentPropertyForm [name="rent"]').value;
            if (rent && (rent < 1000 || rent > 10000000)) {
                showFieldError(document.querySelector('#rentPropertyForm [name="rent"]'), 'Rent must be between Rs 1,000 and Rs 10,000,000');
                isValid = false;
            }
        } else {
            // Validate required fields for maintenance form
            const requiredFields = [{
                    name: 'address',
                    label: 'Property address'
                },
                {
                    name: 'type',
                    label: 'Property type'
                }
            ];

            requiredFields.forEach(field => {
                const element = document.querySelector(`#maintenancePropertyForm [name="${field.name}"]`);
                const value = element.value.trim();

                if (!value) {
                    showFieldError(element, `${field.label} is required`);
                    isValid = false;
                }
            });
        }

        return isValid;
    }

    // Show field error
    function showFieldError(field, message) {
        field.classList.add('error');
        const errorSpan = field.nextElementSibling;
        if (errorSpan && errorSpan.classList.contains('error-message')) {
            errorSpan.textContent = message;
        }
    }

    // Rent optimizer functions (from previous version)
    function getSuggestedRent() {
        const address = document.getElementById('address')?.value.trim() || '';
        const propertyType = document.getElementById('property_type')?.value;
        const bedrooms = document.getElementById('bedrooms')?.value;
        const bathrooms = document.getElementById('bathrooms')?.value;
        const sqft = document.getElementById('sqft')?.value;
        const parking = document.getElementById('parking')?.value;
        const petPolicy = document.getElementById('pet_policy')?.value;
        const laundry = document.getElementById('laundry')?.value;

        if (!propertyType || !bedrooms || !bathrooms) {
            showNotification('Please fill in Property Type, Bedrooms, and Bathrooms first', 'warning');
            return;
        }

        const suggestionBox = document.getElementById('rentSuggestion');
        const suggestionContent = document.getElementById('suggestionContent');
        const suggestionLoading = document.getElementById('suggestionLoading');

        suggestionBox.style.display = 'block';
        suggestionContent.style.display = 'none';
        suggestionLoading.style.display = 'block';

        suggestionBox.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });

        const formData = new URLSearchParams({
            address: address,
            property_type: propertyType,
            bedrooms: bedrooms,
            bathrooms: bathrooms,
            sqft: sqft,
            parking: parking,
            pet_policy: petPolicy,
            laundry: laundry
        });

        fetch(URLROOT + '/landlord/suggestRent', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                suggestionLoading.style.display = 'none';
                suggestionContent.style.display = 'flex';

                if (data.success) {
                    displaySuggestion(data);
                } else {
                    showNotification(data.message || 'Could not generate suggestion', 'error');
                    closeSuggestion();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('An error occurred. Please try again.', 'error');
                closeSuggestion();
            });
    }

    function displaySuggestion(data) {
        suggestedRentValue = data.suggested_rent;
        document.getElementById('marketAverage').textContent = 'Rs ' + formatNumber(data.market_average);
        document.getElementById('suggestedRent').textContent = 'Rs ' + formatNumber(data.suggested_rent);
        document.getElementById('rentRange').textContent = 'Rs ' + formatNumber(data.rent_range.min) + ' - Rs ' + formatNumber(data.rent_range.max);
        document.getElementById('confidenceScore').textContent = data.confidence + '%';
        document.getElementById('confidenceBarFill').style.width = data.confidence + '%';

        const sources = data.data_sources || {};
        const totalSimilar = (sources.real || 0) + (sources.market || 0);
        document.getElementById('similarCount').textContent = totalSimilar + ' similar Colombo properties';
    }

    function acceptSuggestion() {
        document.getElementById('rent').value = suggestedRentValue;
        document.getElementById('deposit').value = suggestedRentValue;

        const rentInput = document.getElementById('rent');
        rentInput.style.background = '#d1fae5';
        setTimeout(() => rentInput.style.background = '', 1500);

        showNotification('Suggested rent applied successfully!', 'success');
        setTimeout(() => closeSuggestion(), 2000);
    }

    function closeSuggestion() {
        document.getElementById('rentSuggestion').style.display = 'none';
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Show notification
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.textContent = message;

        const colors = {
            success: '#10b981',
            error: '#ef4444',
            warning: '#f59e0b',
            info: '#3b82f6'
        };

        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            background: ${colors[type] || colors.info};
            color: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 10000;
            font-weight: 700;
            font-size: 1rem;
            animation: slideInRight 0.4s ease;
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideOutRight 0.4s ease';
            setTimeout(() => notification.remove(), 400);
        }, 4000);
    }

    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideOutRight {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100px); }
        }
    `;
    document.head.appendChild(style);
</script>

<?php require APPROOT . '/views/inc/landlord_footer.php'; ?>