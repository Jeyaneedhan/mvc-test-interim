<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Account Type - Rentigo</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/auth.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="auth-usertype-container">
        <div class="auth-card wide">
            <!-- Logo Section -->
            <div class="auth-header">
                <div class="logo">
                    <h1>Rentigo</h1>
                    <p class="tagline"> RENTAL PROPERTY MANAGEMENT SYSTEM</p>
                </div>
            </div>

            <!-- Illustration -->
            <div class="illustration">
                <div class="illustration-content">
                    <i class="fas fa-mobile-alt"></i>
                    <i class="fas fa-user"></i>
                    <i class="fas fa-search"></i>
                    <i class="fas fa-home"></i>
                </div>
            </div>

            <div class="selection-content">
                <h2>Account Type</h2>
                <p class="description">Choose the account type that suits your needs.</p>
                <p class="sub-description">Each has a different set of tools and features.</p>

                <!-- Error Message -->
                <?php if (!empty($data['user_type_err'])): ?>
                    <div class="flash-message error">
                        <?php echo $data['user_type_err']; ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo URLROOT; ?>/users/usertype" method="POST" id="userTypeForm">
                    <div class="user-type-grid">
                        <div class="user-type-card" data-type="tenant">
                            <div class="card-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <h3>Tenant</h3>
                            <p>Find a place & pay rent online.</p>
                            <div class="selection-indicator"></div>
                        </div>

                        <div class="user-type-card" data-type="landlord">
                            <div class="card-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <h3>Landlord</h3>
                            <p>Accept rent online & manage rental.</p>
                            <div class="selection-indicator"></div>
                        </div>

                        <div class="user-type-card" data-type="property_manager">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3>Manager</h3>
                            <p>Manage landlords & property.</p>
                            <div class="selection-indicator"></div>
                        </div>
                    </div>

                    <input type="hidden" name="user_type" id="selectedUserType" value="">

                    <div class="form-actions">
                        <button type="submit" class="auth-btn" id="nextBtn" disabled>Next</button>
                    </div>
                </form>

                <div class="auth-footer">
                    <p>Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Login Here</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userTypeCards = document.querySelectorAll('.user-type-card');
            const selectedUserTypeInput = document.getElementById('selectedUserType');
            const nextBtn = document.getElementById('nextBtn');

            userTypeCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    userTypeCards.forEach(c => c.classList.remove('active'));

                    // Add active class to clicked card
                    this.classList.add('active');

                    // Set the selected user type
                    const userType = this.getAttribute('data-type');
                    selectedUserTypeInput.value = userType;

                    // Enable next button
                    nextBtn.disabled = false;
                    nextBtn.style.opacity = '1';
                    nextBtn.style.cursor = 'pointer';
                });
            });

            // Form submission validation
            document.getElementById('userTypeForm').addEventListener('submit', function(e) {
                if (!selectedUserTypeInput.value) {
                    e.preventDefault();
                    alert('Please select an account type before proceeding.');
                }
            });
        });
    </script>
</body>

</html>