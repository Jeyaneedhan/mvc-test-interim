<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rentigo</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/auth.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="auth-login-container">
        <div class="auth-card">
            <!-- Logo Section -->
            <div class="auth-header">
                <div class="logo">
                    <h1>Rentigo</h1>
                </div>
                <h2>Welcome to</h2>
                <h3>Rental Property Management System</h3>
                <p class="subtitle">Please Login your account.</p>
            </div>

            <!-- Flash Messages -->
            <?php if (isset($_SESSION['reg_flash'])): ?>
                <div class="flash-message success">
                    <?php
                    echo $_SESSION['reg_flash'];
                    unset($_SESSION['reg_flash']);
                    ?>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form class="auth-form" action="<?php echo URLROOT; ?>/users/login" method="POST">
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
                    <label for="password">Password</label>
                    <div class="password-input">
                        <input type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="password-eye"></i>
                        </button>
                    </div>
                    <?php if (!empty($data['password_err'])): ?>
                        <span class="error-message"><?php echo $data['password_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-options">
                    <label class="checkbox-container">
                        <input type="checkbox" name="remember_me">
                        <span class="checkmark"></span>
                        Remember me
                    </label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" class="auth-btn">Log In</button>

                <div class="auth-footer">
                    <p>New member here? <a href="<?php echo URLROOT; ?>/users/usertype">Register Now</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordEye = document.getElementById('password-eye');

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
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all fields!');
                return false;
            }
        });
    </script>
</body>

</html>