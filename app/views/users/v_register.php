<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Rentigo</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/auth.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="auth-register-container">
        <div class="auth-card">
            <!-- Logo Section -->
            <div class="auth-header">
                <div class="logo">
                    <h1>Rentigo</h1>
                </div>
                <h2>Welcome to</h2>
                <h3>Rental Property Management System</h3>
                <p class="subtitle">Enter your information below to continue</p>
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
                    <i class="fas fa-<?php echo getUserTypeIcon($data['user_type']); ?>"></i>
                    <span>Creating <?php echo ucfirst(str_replace('_', ' ', $data['user_type'])); ?> Account</span>
                </div>
                <a href="<?php echo URLROOT; ?>/users/usertype" class="change-type-btn">Change</a>
            </div>

            <!-- Registration Form -->
            <form class="auth-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                        id="email"
                        name="email"
                        placeholder="kamrul@gmail.com"
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
                        placeholder="Kamrul Hassan"
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

        // Form validation
        document.querySelector('.auth-form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                return false;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert('Password must be at least 6 characters long!');
                return false;
            }
        });
    </script>
</body>

</html>

<?php
// Helper function to get user type icon
function getUserTypeIcon($userType)
{
    switch ($userType) {
        case 'tenant':
            return 'user';
        case 'landlord':
            return 'home';
        case 'property_manager':
            return 'users';
        case 'admin':
            return 'cog';
        default:
            return 'user';
    }
}
?>