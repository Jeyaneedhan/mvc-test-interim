<?php require APPROOT . '/views/inc/admin_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Add Service Provider</h2>
            <p>Add a new service provider to your network</p>
        </div>
        <div class="header-actions">
            <a href="<?php echo URLROOT; ?>/admin/providers" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Providers
            </a>
        </div>
    </div>

    <!-- Add Provider Form -->
    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <h3>Provider Information</h3>
                <p>Enter the details of the new service provider</p>
            </div>

            <?php if (isset($data['error']) && !empty($data['error'])): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    <?php echo $data['error']; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo URLROOT; ?>/admin/addProvider" method="POST" class="provider-form">
                <div class="form-grid">
                    <!-- Provider Name -->
                    <div class="form-group">
                        <label for="name" class="form-label">Provider Name <span class="required">*</span></label>
                        <input type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            placeholder="Enter provider name"
                            value="<?php echo $data['name'] ?? ''; ?>"
                            required>
                    </div>

                    <!-- Company -->
                    <div class="form-group">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text"
                            id="company"
                            name="company"
                            class="form-input"
                            placeholder="Enter company name"
                            value="<?php echo $data['company'] ?? ''; ?>">
                    </div>

                    <!-- Specialty -->
                    <div class="form-group">
                        <label for="specialty" class="form-label">Specialty <span class="required">*</span></label>
                        <select id="specialty" name="specialty" class="form-select" required>
                            <option value="">Select specialty</option>
                            <option value="plumbing" <?php echo (isset($data['specialty']) && $data['specialty'] == 'plumbing') ? 'selected' : ''; ?>>Plumbing</option>
                            <option value="electrical" <?php echo (isset($data['specialty']) && $data['specialty'] == 'electrical') ? 'selected' : ''; ?>>Electrical</option>
                            <option value="hvac" <?php echo (isset($data['specialty']) && $data['specialty'] == 'hvac') ? 'selected' : ''; ?>>HVAC</option>
                            <option value="landscaping" <?php echo (isset($data['specialty']) && $data['specialty'] == 'landscaping') ? 'selected' : ''; ?>>Landscaping</option>
                            <option value="cleaning" <?php echo (isset($data['specialty']) && $data['specialty'] == 'cleaning') ? 'selected' : ''; ?>>Cleaning</option>
                            <option value="security" <?php echo (isset($data['specialty']) && $data['specialty'] == 'security') ? 'selected' : ''; ?>>Security</option>
                            <option value="pest_control" <?php echo (isset($data['specialty']) && $data['specialty'] == 'pest_control') ? 'selected' : ''; ?>>Pest Control</option>
                            <option value="general_maintenance" <?php echo (isset($data['specialty']) && $data['specialty'] == 'general_maintenance') ? 'selected' : ''; ?>>General Maintenance</option>
                        </select>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel"
                            id="phone"
                            name="phone"
                            class="form-input"
                            placeholder="Enter phone number"
                            value="<?php echo $data['phone'] ?? ''; ?>">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="Enter email address"
                            value="<?php echo $data['email'] ?? ''; ?>">
                    </div>

                    <!-- Rating -->
                    <div class="form-group">
                        <label for="rating" class="form-label">Initial Rating</label>
                        <select id="rating" name="rating" class="form-select">
                            <option value="0.0">No Rating</option>
                            <option value="1.0" <?php echo (isset($data['rating']) && $data['rating'] == '1.0') ? 'selected' : ''; ?>>1.0</option>
                            <option value="1.5" <?php echo (isset($data['rating']) && $data['rating'] == '1.5') ? 'selected' : ''; ?>>1.5</option>
                            <option value="2.0" <?php echo (isset($data['rating']) && $data['rating'] == '2.0') ? 'selected' : ''; ?>>2.0</option>
                            <option value="2.5" <?php echo (isset($data['rating']) && $data['rating'] == '2.5') ? 'selected' : ''; ?>>2.5</option>
                            <option value="3.0" <?php echo (isset($data['rating']) && $data['rating'] == '3.0') ? 'selected' : ''; ?>>3.0</option>
                            <option value="3.5" <?php echo (isset($data['rating']) && $data['rating'] == '3.5') ? 'selected' : ''; ?>>3.5</option>
                            <option value="4.0" <?php echo (isset($data['rating']) && $data['rating'] == '4.0') ? 'selected' : ''; ?>>4.0</option>
                            <option value="4.5" <?php echo (isset($data['rating']) && $data['rating'] == '4.5') ? 'selected' : ''; ?>>4.5</option>
                            <option value="5.0" <?php echo (isset($data['rating']) && $data['rating'] == '5.0') ? 'selected' : ''; ?>>5.0</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="active" <?php echo (isset($data['status']) && $data['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                            <option value="inactive" <?php echo (isset($data['status']) && $data['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>
                </div>

                <!-- Address - Full Width -->
                <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address"
                        name="address"
                        class="form-textarea"
                        placeholder="Enter complete address"
                        rows="3"><?php echo $data['address'] ?? ''; ?></textarea>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Provider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Additional form-specific styles that complement your existing CSS */
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 0.75rem;
        border: 1px solid var(--border-color);
        padding: 2rem;
    }

    .form-header {
        margin-bottom: 2rem;
        text-align: center;
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 1rem;
    }

    .form-header h3 {
        color: var(--text-color);
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .form-header p {
        color: var(--text-muted);
        margin: 0;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--text-color);
        font-size: 0.875rem;
    }

    .required {
        color: var(--danger-color);
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid var(--border-color);
    }

    .alert {
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert-error {
        background-color: #fee2e2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }
    }
</style>

<?php require APPROOT . '/views/inc/admin_footer.php'; ?>