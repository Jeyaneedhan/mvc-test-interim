<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Manager Registration - Rentigo</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/auth.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* File Upload Styles */
        .file-upload-area {
            border: 2px dashed var(--border-color, #e5e7eb);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            background: #f9fafb;
            cursor: pointer;
        }

        .file-upload-area.drag-over {
            border-color: #45a9ea;
            background: rgba(69, 169, 234, 0.05);
        }

        .file-upload-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .file-upload-icon {
            font-size: 2.5rem;
            color: #45a9ea;
            margin-bottom: 0.5rem;
        }

        .file-upload-text {
            font-size: 0.9rem;
            color: #374151;
            font-weight: 500;
            margin: 0;
        }

        .file-upload-hint {
            font-size: 0.75rem;
            color: #9ca3af;
            margin: 0;
        }

        .btn-upload {
            margin-top: 0.75rem;
            padding: 0.5rem 1.5rem;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-upload:hover {
            background: #f9fafb;
            border-color: #45a9ea;
            color: #45a9ea;
        }

        .file-preview {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 1rem;
            border-radius: 6px;
            gap: 1rem;
        }

        .file-preview i {
            font-size: 1.5rem;
            color: #45a9ea;
        }

        .file-name {
            flex: 1;
            font-size: 0.875rem;
            color: #374151;
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .btn-remove {
            background: #fee2e2;
            border: none;
            padding: 0.5rem;
            border-radius: 4px;
            cursor: pointer;
            color: #dc2626;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-remove:hover {
            background: #fecaca;
        }

        .info-box {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(69, 169, 234, 0.1);
            border: 1px solid rgba(69, 169, 234, 0.2);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
        }

        .info-box i {
            color: #45a9ea;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .info-box span {
            font-size: 0.8rem;
            color: #374151;
            line-height: 1.4;
        }

        .text-muted {
            color: #9ca3af;
            font-weight: 400;
            font-size: 0.75rem;
        }
    </style>
</head>

<body>
    <div class="auth-register-container" style="height: 780px;">
        <div class="auth-card">
            <!-- Logo Section -->
            <div class="auth-header">
                <div class="logo">
                    <h1>Rentigo</h1>
                </div>
                <h2>Property Manager Registration</h2>
                <h3>Rental Property Management System</h3>
                <p class="subtitle">Complete your registration with employment verification</p>
            </div>

            <!-- Progress Indicator -->
            <div class="progress-indicator">
                <div class="progress-step completed">
                    <div class="step-number">1</div>
                    <div class="step-label">Account Type</div>
                </div>
                <div class="progress-line completed"></div>
                <div class="progress-step active">
                    <div class="step-number">2</div>
                    <div class="step-label">Your Details</div>
                </div>
            </div>

            <!-- Selected User Type Display -->
            <div class="selected-type-display">
                <div class="selected-type-info">
                    <i class="fas fa-users"></i>
                    <span>Creating Property Manager Account</span>
                </div>
                <a href="<?php echo URLROOT; ?>/users/usertype" class="change-type-btn">Change</a>
            </div>

            <!-- Registration Form -->
            <form class="auth-form" action="<?php echo URLROOT; ?>/users/register_pm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                        id="email"
                        name="email"
                        placeholder="manager@company.com"
                        value="<?php echo $data['email']; ?>"
                        required>
                    <?php if (!empty($data['email_err'])): ?>
                        <span class="error-message"><?php echo $data['email_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text"
                        id="name"
                        name="name"
                        placeholder="John Manager"
                        value="<?php echo $data['name']; ?>"
                        required>
                    <?php if (!empty($data['name_err'])): ?>
                        <span class="error-message"><?php echo $data['name_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Create Password</label>
                        <div class="password-input">
                            <input type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                required>
                            <button type="button" class="password-toggle" onclick="togglePassword('password', 'password-eye1')">
                                <i class="fas fa-eye" id="password-eye1"></i>
                            </button>
                        </div>
                        <?php if (!empty($data['password_err'])): ?>
                            <span class="error-message"><?php echo $data['password_err']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="password-input">
                            <input type="password"
                                id="confirm_password"
                                name="confirm_password"
                                placeholder="••••••••"
                                required>
                            <button type="button" class="password-toggle" onclick="togglePassword('confirm_password', 'password-eye2')">
                                <i class="fas fa-eye" id="password-eye2"></i>
                            </button>
                        </div>
                        <?php if (!empty($data['confirm_password_err'])): ?>
                            <span class="error-message"><?php echo $data['confirm_password_err']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Employee ID Upload Section -->
                <div class="form-group">
                    <label for="employee_id">Employee ID Card <span class="text-muted">(Required for verification)</span></label>
                    <div class="file-upload-area" id="fileUploadArea">
                        <div class="file-upload-content">
                            <i class="fas fa-id-card file-upload-icon"></i>
                            <p class="file-upload-text">Click to upload or drag and drop</p>
                            <p class="file-upload-hint">PNG, JPG or PDF (Max 5MB)</p>
                            <input type="file"
                                id="employee_id"
                                name="employee_id"
                                accept=".jpg,.jpeg,.png,.pdf"
                                hidden
                                required>
                            <button type="button" class="btn-upload" onclick="document.getElementById('employee_id').click()">
                                Choose File
                            </button>
                        </div>
                        <div class="file-preview" id="filePreview" style="display: none;">
                            <i class="fas fa-file-alt"></i>
                            <span class="file-name" id="fileName"></span>
                            <button type="button" class="btn-remove" onclick="removeFile()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <?php if (!empty($data['employee_id_err'])): ?>
                        <span class="error-message"><?php echo $data['employee_id_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <span>Your account will be reviewed and approved by our admin team within 24-48 hours.</span>
                </div>

                <?php require APPROOT . '/views/inc/components/terms_checkbox.php'; ?>

                <?php if (!empty($data['terms_err'])): ?>
                    <span class="error-message" style="display: block; margin-top: -0.5rem; margin-bottom: 1rem;">
                        <?php echo $data['terms_err']; ?>
                    </span>
                <?php endif; ?>

                <div class="form-actions-row">
                    <a href="<?php echo URLROOT; ?>/users/usertype" class="auth-btn secondary">Back</a>
                    <button type="submit" class="auth-btn primary">Create Account</button>
                </div>

                <div class="auth-footer">
                    <p>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Login Here</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId, eyeId) {
            const passwordInput = document.getElementById(inputId);
            const passwordEye = document.getElementById(eyeId);

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

        // File upload handling
        const fileInput = document.getElementById('employee_id');
        const fileUploadArea = document.getElementById('fileUploadArea');
        const filePreview = document.getElementById('filePreview');
        const fileName = document.getElementById('fileName');

        if (fileInput) {
            fileInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const fileSize = file.size / 1024 / 1024; // in MB

                    // Check file size
                    if (fileSize > 5) {
                        alert('File size must not exceed 5MB');
                        this.value = '';
                        return;
                    }

                    // Check file type
                    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
                    if (!allowedTypes.includes(file.type)) {
                        alert('Only JPG, PNG, and PDF files are allowed');
                        this.value = '';
                        return;
                    }

                    fileName.textContent = file.name;
                    fileUploadArea.querySelector('.file-upload-content').style.display = 'none';
                    filePreview.style.display = 'flex';
                }
            });
        }

        function removeFile() {
            fileInput.value = '';
            fileUploadArea.querySelector('.file-upload-content').style.display = 'flex';
            filePreview.style.display = 'none';
        }

        // Drag and drop functionality
        if (fileUploadArea) {
            fileUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('drag-over');
            });

            fileUploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('drag-over');
            });

            fileUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('drag-over');

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(files[0]);
                    fileInput.files = dataTransfer.files;

                    // Trigger change event
                    const event = new Event('change', {
                        bubbles: true
                    });
                    fileInput.dispatchEvent(event);
                }
            });
        }

        // Form validation on submit
        const form = document.querySelector('.auth-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const email = document.getElementById('email').value.trim();
                const name = document.getElementById('name').value.trim();
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm_password').value;
                const fileInput = document.getElementById('employee_id');

                // Validate email
                if (!email) {
                    e.preventDefault();
                    alert('Please enter your email address!');
                    return false;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    e.preventDefault();
                    alert('Please enter a valid email address!');
                    return false;
                }

                // Validate name
                if (!name) {
                    e.preventDefault();
                    alert('Please enter your full name!');
                    return false;
                }

                if (name.length < 2) {
                    e.preventDefault();
                    alert('Name must be at least 2 characters long!');
                    return false;
                }

                // Validate password
                if (!password) {
                    e.preventDefault();
                    alert('Please enter a password!');
                    return false;
                }

                if (password.length < 6) {
                    e.preventDefault();
                    alert('Password must be at least 6 characters long!');
                    return false;
                }

                // Validate confirm password
                if (!confirmPassword) {
                    e.preventDefault();
                    alert('Please confirm your password!');
                    return false;
                }

                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                    return false;
                }

                // Validate file upload
                if (!fileInput.files || fileInput.files.length === 0) {
                    e.preventDefault();
                    alert('Please upload your employee ID card!');
                    return false;
                }

                const file = fileInput.files[0];
                const fileSize = file.size / 1024 / 1024; // in MB

                if (fileSize > 5) {
                    e.preventDefault();
                    alert('File size must not exceed 5MB!');
                    return false;
                }

                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
                if (!allowedTypes.includes(file.type)) {
                    e.preventDefault();
                    alert('Only JPG, PNG, and PDF files are allowed!');
                    return false;
                }

                // All validations passed
                return true;
            });
        }
    </script>
</body>

</html>