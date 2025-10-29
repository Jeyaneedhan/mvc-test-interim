<?php
// Determine which header to include based on user type
switch ($_SESSION['user_type']) {
    case 'admin':
        require APPROOT . '/views/inc/admin_header.php';
        break;
    case 'property_manager':
        require APPROOT . '/views/inc/manager_header.php';
        break;
    case 'landlord':
        require APPROOT . '/views/inc/landlord_header.php';
        break;
    case 'tenant':
        require APPROOT . '/views/inc/tenant_header.php';
        break;
    default:
        require APPROOT . '/views/inc/header.php';
}
?>

<div class="profile-container">
    <div class="profile-wrapper">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="profile-info">
                <h2><?php echo htmlspecialchars($data['name']); ?></h2>
                <p class="user-type-badge"><?php echo ucfirst(str_replace('_', ' ', $data['user_type'])); ?></p>
                <p class="join-date">Member since <?php echo date('F Y', strtotime($data['created_at'])); ?></p>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php flash('profile_message'); ?>

        <!-- Profile Form -->
        <div class="profile-content">
            <h3 class="section-title">
                <i class="fas fa-user-edit"></i> Edit Profile
            </h3>

            <form action="<?php echo URLROOT; ?>/users/updateProfile" method="POST" class="profile-form">
                <!-- Personal Information Section -->
                <div class="form-section">
                    <h4 class="form-section-title">Personal Information</h4>

                    <div class="form-group">
                        <label for="name">
                            <i class="fas fa-user"></i> Full Name <span class="required">*</span>
                        </label>
                        <input type="text"
                            id="name"
                            name="name"
                            class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo htmlspecialchars($data['name']); ?>"
                            required>
                        <?php if (!empty($data['name_err'])): ?>
                            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i> Email Address <span class="required">*</span>
                        </label>
                        <input type="email"
                            id="email"
                            name="email"
                            class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo htmlspecialchars($data['email']); ?>"
                            required>
                        <?php if (!empty($data['email_err'])): ?>
                            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>
                            <i class="fas fa-user-tag"></i> Account Type
                        </label>
                        <input type="text"
                            class="form-control"
                            value="<?php echo ucfirst(str_replace('_', ' ', $data['user_type'])); ?>"
                            disabled>
                        <small class="form-text">Account type cannot be changed</small>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="form-section">
                    <h4 class="form-section-title">Change Password</h4>
                    <p class="form-section-description">Leave blank if you don't want to change your password</p>

                    <div class="form-group">
                        <label for="current_password">
                            <i class="fas fa-lock"></i> Current Password
                        </label>
                        <div class="password-input-wrapper">
                            <input type="password"
                                id="current_password"
                                name="current_password"
                                class="form-control <?php echo (!empty($data['current_password_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Enter current password">
                            <button type="button" class="password-toggle-btn" onclick="togglePassword('current_password')">
                                <i class="fas fa-eye" id="current_password-eye"></i>
                            </button>
                        </div>
                        <?php if (!empty($data['current_password_err'])): ?>
                            <span class="invalid-feedback"><?php echo $data['current_password_err']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="new_password">
                            <i class="fas fa-key"></i> New Password
                        </label>
                        <div class="password-input-wrapper">
                            <input type="password"
                                id="new_password"
                                name="new_password"
                                class="form-control <?php echo (!empty($data['new_password_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Enter new password">
                            <button type="button" class="password-toggle-btn" onclick="togglePassword('new_password')">
                                <i class="fas fa-eye" id="new_password-eye"></i>
                            </button>
                        </div>
                        <?php if (!empty($data['new_password_err'])): ?>
                            <span class="invalid-feedback"><?php echo $data['new_password_err']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">
                            <i class="fas fa-check-circle"></i> Confirm New Password
                        </label>
                        <div class="password-input-wrapper">
                            <input type="password"
                                id="confirm_password"
                                name="confirm_password"
                                class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Confirm new password">
                            <button type="button" class="password-toggle-btn" onclick="togglePassword('confirm_password')">
                                <i class="fas fa-eye" id="confirm_password-eye"></i>
                            </button>
                        </div>
                        <?php if (!empty($data['confirm_password_err'])): ?>
                            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Reset and Base Styles with higher specificity */
    .profile-container,
    .profile-container * {
        box-sizing: border-box;
    }

    /* Profile Container */
    .profile-container {
        padding: 2rem;
        max-width: 900px;
        margin: 0 auto;
        min-height: 100vh;
        background-color: #f3f4f6;
        position: relative;
        z-index: 1;
    }

    .profile-wrapper {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 0 auto;
    }

    /* Profile Header - Updated to #45a9ea theme */
    .profile-container .profile-wrapper .profile-header {
        background: linear-gradient(135deg, #45a9ea 0%, #2d8bc9 100%) !important;
        padding: 3rem 2rem !important;
        text-align: center !important;
        color: white !important;
        position: relative;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* Profile Avatar - Force center alignment */
    .profile-container .profile-wrapper .profile-avatar {
        margin: 0 auto 1rem !important;
        width: 100%;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        text-align: center !important;
    }

    /* Remove any pseudo-elements that might create lines */
    .profile-container .profile-wrapper .profile-avatar::before,
    .profile-container .profile-wrapper .profile-avatar::after {
        display: none !important;
        content: none !important;
    }

    .profile-container .profile-wrapper .profile-avatar i {
        font-size: 6rem !important;
        color: white !important;
        opacity: 0.9;
        display: block !important;
        text-align: center !important;
        margin: 0 auto !important;
    }

    /* Profile Info */
    .profile-container .profile-wrapper .profile-info {
        width: 100%;
        text-align: center !important;
        display: block;
    }

    .profile-container .profile-wrapper .profile-info h2 {
        margin: 0 0 0.5rem 0 !important;
        font-size: 2rem !important;
        font-weight: 600 !important;
        color: white !important;
        text-align: center !important;
        display: block;
    }

    .profile-container .profile-wrapper .user-type-badge {
        display: inline-block !important;
        background: rgba(255, 255, 255, 0.2) !important;
        padding: 0.375rem 1rem !important;
        border-radius: 2rem !important;
        font-size: 0.875rem !important;
        font-weight: 500 !important;
        margin: 0.5rem 0 !important;
        color: white !important;
        border: none !important;
        text-align: center !important;
    }

    .profile-container .profile-wrapper .join-date {
        margin: 0.5rem 0 0 0 !important;
        opacity: 0.9;
        font-size: 0.9rem !important;
        color: white !important;
        text-align: center !important;
        display: block;
    }

    /* Profile Content */
    .profile-content {
        padding: 2rem;
        background: white;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: #45a9ea;
    }

    /* Form Sections */
    .form-section {
        margin-bottom: 2.5rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .form-section:last-of-type {
        border-bottom: none;
    }

    .form-section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-section-description {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-group label i {
        color: #45a9ea;
        width: 20px;
        flex-shrink: 0;
    }

    .required {
        color: #ef4444;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: all 0.2s;
        background-color: white;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        line-height: 1.5;
    }

    .form-control:focus {
        outline: none;
        border-color: #45a9ea;
        box-shadow: 0 0 0 3px rgba(69, 169, 234, 0.1);
    }

    .form-control:disabled {
        background-color: #f3f4f6;
        cursor: not-allowed;
        color: #6b7280;
    }

    .form-control.is-invalid {
        border-color: #ef4444;
    }

    .invalid-feedback {
        display: block;
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .form-text {
        display: block;
        color: #6b7280;
        font-size: 0.813rem;
        margin-top: 0.25rem;
    }

    /* Password Input */
    .password-input-wrapper {
        position: relative;
        display: block;
    }

    .password-input-wrapper .form-control {
        padding-right: 3rem;
    }

    .password-toggle-btn {
        position: absolute;
        right: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
        padding: 0.5rem;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .password-toggle-btn:hover {
        color: #45a9ea;
    }

    .password-toggle-btn:focus {
        outline: 2px solid #45a9ea;
        outline-offset: 2px;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
        line-height: 1.5;
    }

    .btn-primary {
        background-color: #45a9ea;
        color: white;
    }

    .btn-primary:hover {
        background-color: #3891d1;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(69, 169, 234, 0.3);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-secondary {
        background-color: #e5e7eb;
        color: #374151;
    }

    .btn-secondary:hover {
        background-color: #d1d5db;
    }

    /* Flash Messages */
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #6ee7b7;
    }

    .alert-success::before {
        content: "✓";
        font-weight: bold;
        font-size: 1.25rem;
    }

    .alert-danger {
        background-color: #fee2e2;
        color: #991b1b;
        border: 1px solid #fca5a5;
    }

    .alert-danger::before {
        content: "⚠";
        font-weight: bold;
        font-size: 1.25rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .profile-container {
            padding: 1rem;
        }

        .profile-container .profile-wrapper .profile-header {
            padding: 2rem 1rem !important;
        }

        .profile-container .profile-wrapper .profile-avatar i {
            font-size: 4rem !important;
        }

        .profile-container .profile-wrapper .profile-info h2 {
            font-size: 1.5rem !important;
        }

        .profile-content {
            padding: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }

    /* Print styles */
    @media print {
        .profile-header {
            background: #45a9ea !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }

    /* Aggressively remove any lines/borders in profile header */
    .profile-container .profile-wrapper .profile-header *,
    .profile-container .profile-wrapper .profile-header *::before,
    .profile-container .profile-wrapper .profile-header *::after {
        border: none !important;
        border-top: none !important;
        border-bottom: none !important;
        border-left: none !important;
        border-right: none !important;
    }

    /* Target the specific line that appears */
    .profile-container .profile-wrapper .profile-header>*:not(.profile-avatar):not(.profile-info)::after,
    .profile-container .profile-wrapper .profile-header>*:not(.profile-avatar):not(.profile-info)::before {
        display: none !important;
        content: none !important;
        height: 0 !important;
        width: 0 !important;
    }

    /* Remove HR or divider elements */
    .profile-container .profile-wrapper .profile-header hr,
    .profile-container .profile-wrapper .profile-header .divider {
        display: none !important;
    }
</style>

<script>
    function togglePassword(fieldId) {
        const passwordInput = document.getElementById(fieldId);
        const passwordEye = document.getElementById(fieldId + '-eye');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordEye.classList.remove('fa-eye');
            passwordEye.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordEye.classList.remove('fa-eye-slash');
            passwordEye.classList.add('fa-eye');
        }
    }
</script>

<?php
// Determine which footer to include based on user type
switch ($_SESSION['user_type']) {
    case 'admin':
        require APPROOT . '/views/inc/admin_footer.php';
        break;
    case 'property_manager':
        require APPROOT . '/views/inc/manager_footer.php';
        break;
    case 'landlord':
        require APPROOT . '/views/inc/landlord_footer.php';
        break;
    case 'tenant':
        require APPROOT . '/views/inc/tenant_footer.php';
        break;
    default:
        require APPROOT . '/views/inc/footer.php';
}
?>