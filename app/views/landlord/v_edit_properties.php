<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<?php
// Determine listing type
$listingType = $data['property']->listing_type ?? 'rent';
$isMaintenanceProperty = ($listingType === 'maintenance');
?>

<!-- Page Header -->
<div class="page-header">
  <div class="header-left">
    <h1 class="page-title">Edit Property</h1>
    <p class="page-subtitle">Update property details</p>

    <!-- Listing Type Badge -->
    <?php if ($isMaintenanceProperty): ?>
      <span class="badge badge-warning" style="margin-top: 0.5rem;">
        <i class="fas fa-tools"></i> Maintenance Only Property
      </span>
    <?php else: ?>
      <span class="badge badge-success" style="margin-top: 0.5rem;">
        <i class="fas fa-home"></i> Rental Property
      </span>
    <?php endif; ?>
  </div>
  <div class="header-actions">
    <a href="<?php echo URLROOT; ?>/landlord/properties" class="btn btn-outline">
      <i class="fas fa-arrow-left"></i> Back to Properties
    </a>
  </div>
</div>

<!-- Edit Property Form -->
<div class="content-card">
  <div class="card-header">
    <h2 class="card-title">Property Information</h2>
    <?php if ($isMaintenanceProperty): ?>
      <span class="badge badge-info">Simplified Form (Maintenance)</span>
    <?php endif; ?>
  </div>
  <div class="card-body">
    <form id="editPropertyForm" method="POST" action="<?php echo URLROOT; ?>/landlord/update/<?php echo $data['property']->id; ?>" enctype="multipart/form-data">

      <?php if ($isMaintenanceProperty): ?>

        <!-- MAINTENANCE PROPERTY FORM -->
        <div class="info-box">
          <i class="fas fa-info-circle"></i>
          <div>
            <h4>Maintenance Only Property</h4>
            <p>This property is tracked for maintenance purposes only and is not listed for rent.</p>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Property Address *</label>
          <input type="text" class="form-control" name="address" required
            value="<?php echo htmlspecialchars($data['property']->address ?? ''); ?>">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
          <div class="form-group">
            <label class="form-label">Property Type *</label>
            <select class="form-control" name="property_type" required>
              <option value="">Select Type</option>
              <option value="apartment" <?php echo ($data['property']->property_type ?? '') == 'apartment' ? 'selected' : ''; ?>>Apartment</option>
              <option value="house" <?php echo ($data['property']->property_type ?? '') == 'house' ? 'selected' : ''; ?>>House</option>
              <option value="condo" <?php echo ($data['property']->property_type ?? '') == 'condo' ? 'selected' : ''; ?>>Condo</option>
              <option value="townhouse" <?php echo ($data['property']->property_type ?? '') == 'townhouse' ? 'selected' : ''; ?>>Townhouse</option>
              <option value="commercial" <?php echo ($data['property']->property_type ?? '') == 'commercial' ? 'selected' : ''; ?>>Commercial</option>
              <option value="land" <?php echo ($data['property']->property_type ?? '') == 'land' ? 'selected' : ''; ?>>Land</option>
              <option value="other" <?php echo ($data['property']->property_type ?? '') == 'other' ? 'selected' : ''; ?>>Other</option>
            </select>
          </div>

          <div class="form-group">
            <label class="form-label">Square Footage (Optional)</label>
            <input type="number" class="form-control" name="sqft"
              value="<?php echo htmlspecialchars($data['property']->sqft ?? ''); ?>"
              min="1" max="50000" step="1">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Current Occupant (Optional)</label>
          <input type="text" class="form-control" name="current_occupant"
            value="<?php echo htmlspecialchars($data['property']->current_occupant ?? ''); ?>"
            placeholder="Name of current tenant or occupant">
        </div>

        <div class="form-group">
          <label class="form-label">Property Notes</label>
          <textarea class="form-control" name="description" rows="4"><?php echo htmlspecialchars($data['property']->description ?? ''); ?></textarea>
        </div>

        <!-- Hidden fields for maintenance properties -->
        <input type="hidden" name="bedrooms" value="<?php echo $data['property']->bedrooms ?? 0; ?>">
        <input type="hidden" name="bathrooms" value="<?php echo $data['property']->bathrooms ?? 1; ?>">
        <input type="hidden" name="rent" value="0">
        <input type="hidden" name="deposit" value="">
        <input type="hidden" name="available_date" value="">
        <input type="hidden" name="parking" value="0">
        <input type="hidden" name="pets" value="no">
        <input type="hidden" name="laundry" value="none">

      <?php else: ?>

        <!-- RENTAL PROPERTY FORM -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
          <!-- Left Column -->
          <div>
            <div class="form-group">
              <label class="form-label">Property Address *</label>
              <input type="text" class="form-control" name="address" required
                value="<?php echo htmlspecialchars($data['property']->address ?? ''); ?>">
            </div>

            <div class="form-group">
              <label class="form-label">Property Type *</label>
              <select class="form-control" name="property_type" required>
                <option value="">Select Type</option>
                <option value="apartment" <?php echo ($data['property']->property_type ?? '') == 'apartment' ? 'selected' : ''; ?>>Apartment</option>
                <option value="house" <?php echo ($data['property']->property_type ?? '') == 'house' ? 'selected' : ''; ?>>House</option>
                <option value="condo" <?php echo ($data['property']->property_type ?? '') == 'condo' ? 'selected' : ''; ?>>Condo</option>
                <option value="townhouse" <?php echo ($data['property']->property_type ?? '') == 'townhouse' ? 'selected' : ''; ?>>Townhouse</option>
              </select>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
              <div class="form-group">
                <label class="form-label">Bedrooms *</label>
                <select class="form-control" name="bedrooms" required>
                  <option value="">Select</option>
                  <option value="0" <?php echo ($data['property']->bedrooms ?? '') == '0' ? 'selected' : ''; ?>>Studio</option>
                  <option value="1" <?php echo ($data['property']->bedrooms ?? '') == '1' ? 'selected' : ''; ?>>1 Bedroom</option>
                  <option value="2" <?php echo ($data['property']->bedrooms ?? '') == '2' ? 'selected' : ''; ?>>2 Bedrooms</option>
                  <option value="3" <?php echo ($data['property']->bedrooms ?? '') == '3' ? 'selected' : ''; ?>>3 Bedrooms</option>
                  <option value="4" <?php echo ($data['property']->bedrooms ?? '') >= '4' ? 'selected' : ''; ?>>4+ Bedrooms</option>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label">Bathrooms *</label>
                <select class="form-control" name="bathrooms" required>
                  <option value="">Select</option>
                  <option value="1" <?php echo ($data['property']->bathrooms ?? '') == '1' ? 'selected' : ''; ?>>1 Bathroom</option>
                  <option value="2" <?php echo ($data['property']->bathrooms ?? '') == '2' ? 'selected' : ''; ?>>2 Bathrooms</option>
                  <option value="3" <?php echo ($data['property']->bathrooms ?? '') >= '3' ? 'selected' : ''; ?>>3+ Bathrooms</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Square Footage</label>
              <input type="number" class="form-control" name="sqft"
                value="<?php echo htmlspecialchars($data['property']->sqft ?? ''); ?>"
                min="1" max="50000" step="1">
            </div>

            <div class="form-group">
              <label class="form-label">Monthly Rent (Rs) *</label>
              <input type="number" step="0.01" class="form-control" name="rent" required
                value="<?php echo htmlspecialchars($data['property']->rent ?? ''); ?>"
                min="1000" max="10000000">
            </div>
          </div>

          <!-- Right Column -->
          <div>
            <div class="form-group">
              <label class="form-label">Security Deposit (Rs)</label>
              <input type="number" class="form-control" name="deposit"
                value="<?php echo htmlspecialchars($data['property']->deposit ?? ''); ?>"
                min="0" max="10000000" step="100">
            </div>

            <div class="form-group">
              <label class="form-label">Available Date</label>
              <input type="date" class="form-control" name="available_date"
                value="<?php echo htmlspecialchars($data['property']->available_date ?? ''); ?>">
            </div>

            <div class="form-group">
              <label class="form-label">Parking Spaces</label>
              <select class="form-control" name="parking">
                <option value="0" <?php echo ($data['property']->parking ?? '0') == '0' ? 'selected' : ''; ?>>No Parking</option>
                <option value="1" <?php echo ($data['property']->parking ?? '') == '1' ? 'selected' : ''; ?>>1 Space</option>
                <option value="2" <?php echo ($data['property']->parking ?? '') == '2' ? 'selected' : ''; ?>>2 Spaces</option>
                <option value="3" <?php echo ($data['property']->parking ?? '') == '3' ? 'selected' : ''; ?>>3+ Spaces</option>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label">Pet Policy</label>
              <select class="form-control" name="pets">
                <option value="no" <?php echo ($data['property']->pet_policy ?? '') == 'no' ? 'selected' : ''; ?>>No Pets</option>
                <option value="cats" <?php echo ($data['property']->pet_policy ?? '') == 'cats' ? 'selected' : ''; ?>>Cats Only</option>
                <option value="dogs" <?php echo ($data['property']->pet_policy ?? '') == 'dogs' ? 'selected' : ''; ?>>Dogs Only</option>
                <option value="both" <?php echo ($data['property']->pet_policy ?? '') == 'both' ? 'selected' : ''; ?>>Cats & Dogs</option>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label">Laundry Facilities</label>
              <select class="form-control" name="laundry">
                <option value="none" <?php echo ($data['property']->laundry ?? '') == 'none' ? 'selected' : ''; ?>>No Laundry</option>
                <option value="shared" <?php echo ($data['property']->laundry ?? '') == 'shared' ? 'selected' : ''; ?>>Shared Laundry</option>
                <option value="hookups" <?php echo ($data['property']->laundry ?? '') == 'hookups' ? 'selected' : ''; ?>>Washer/Dryer Hookups</option>
                <option value="in_unit" <?php echo ($data['property']->laundry ?? '') == 'in_unit' ? 'selected' : ''; ?>>In-Unit Washer/Dryer</option>
                <option value="included" <?php echo ($data['property']->laundry ?? '') == 'included' ? 'selected' : ''; ?>>Washer/Dryer Included</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Property Description</label>
          <textarea class="form-control" name="description" rows="4"><?php echo htmlspecialchars($data['property']->description ?? ''); ?></textarea>
        </div>

      <?php endif; ?>

      <!-- Submit Buttons -->
      <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i> Update Property
        </button>
        <a href="<?php echo URLROOT; ?>/landlord/properties" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>

<style>
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

  /* Badge Styles */
  .badge {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.375rem 0.875rem;
    border-radius: 0.375rem;
    font-size: 0.813rem;
    font-weight: 600;
  }

  .badge-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
  }

  .badge-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
  }

  .badge-info {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
  }
</style>

<?php require APPROOT . '/views/inc/landlord_footer.php'; ?>