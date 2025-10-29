<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
    .terms-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
        background-color: #f9fafb;
        min-height: 100vh;
    }

    .terms-header {
        text-align: center;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 3px solid #45a9ea;
    }

    .terms-header h1 {
        font-size: 2.5rem;
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .terms-header .subtitle {
        color: #6b7280;
        font-size: 1rem;
    }

    .terms-header .last-updated {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.5rem 1.5rem;
        background: rgba(69, 169, 234, 0.1);
        color: #45a9ea;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .terms-content {
        background: white;
        border-radius: 1rem;
        padding: 3rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .terms-section {
        margin-bottom: 2.5rem;
    }

    .terms-section h2 {
        font-size: 1.75rem;
        color: #1f2937;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
    }

    .terms-section h2 i {
        color: #45a9ea;
        font-size: 1.5rem;
    }

    .terms-section h3 {
        font-size: 1.25rem;
        color: #374151;
        margin: 1.5rem 0 0.75rem 0;
        font-weight: 600;
    }

    .terms-section p {
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 1rem;
        font-size: 1rem;
    }

    .terms-section ul,
    .terms-section ol {
        margin-left: 2rem;
        margin-bottom: 1rem;
    }

    .terms-section li {
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 0.5rem;
    }

    .highlight-box {
        background: rgba(69, 169, 234, 0.1);
        border-left: 4px solid #45a9ea;
        padding: 1.5rem;
        border-radius: 0.5rem;
        margin: 1.5rem 0;
    }

    .highlight-box p {
        margin: 0;
        color: #1f2937;
        font-weight: 500;
    }

    .terms-footer {
        text-align: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #e5e7eb;
    }

    .terms-footer p {
        color: #6b7280;
        font-size: 0.938rem;
    }

    .terms-footer a {
        color: #45a9ea;
        text-decoration: none;
        font-weight: 500;
    }

    .terms-footer a:hover {
        text-decoration: underline;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: #45a9ea;
        color: white;
        text-decoration: none;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.2s;
        margin-bottom: 2rem;
    }

    .back-button:hover {
        background: #3891d1;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(69, 169, 234, 0.3);
    }

    @media (max-width: 768px) {
        .terms-container {
            padding: 2rem 1rem;
        }

        .terms-content {
            padding: 2rem 1.5rem;
        }

        .terms-header h1 {
            font-size: 2rem;
        }

        .terms-section h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="terms-container">
    <a href="javascript:history.back()" class="back-button">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    <div class="terms-header">
        <h1>Terms and Conditions</h1>
        <p class="subtitle">Rentigo - Rental Property Management System</p>
        <span class="last-updated">
            <i class="fas fa-calendar-alt"></i> Last Updated: October 18, 2025
        </span>
    </div>

    <div class="terms-content">
        <!-- Introduction -->
        <div class="terms-section">
            <h2><i class="fas fa-file-contract"></i> 1. Introduction</h2>
            <p>
                Welcome to Rentigo! These Terms and Conditions ("Terms") govern your use of the Rentigo platform
                and services. By accessing or using our platform, you agree to be bound by these Terms.
                If you do not agree with any part of these Terms, you may not use our services.
            </p>
            <div class="highlight-box">
                <p><i class="fas fa-info-circle"></i> Please read these Terms carefully before using Rentigo.</p>
            </div>
        </div>

        <!-- Definitions -->
        <div class="terms-section">
            <h2><i class="fas fa-book"></i> 2. Definitions</h2>
            <ul>
                <li><strong>"Platform"</strong> refers to the Rentigo web application and all associated services.</li>
                <li><strong>"User"</strong> refers to any individual or entity using the Platform.</li>
                <li><strong>"Admin"</strong> refers to the platform administrators with full system access.</li>
                <li><strong>"Property Manager"</strong> refers to users managing properties on behalf of landlords.</li>
                <li><strong>"Landlord"</strong> refers to property owners using the Platform.</li>
                <li><strong>"Tenant"</strong> refers to individuals renting properties through the Platform.</li>
                <li><strong>"Services"</strong> refers to all features and functionalities provided by Rentigo.</li>
            </ul>
        </div>

        <!-- User Accounts -->
        <div class="terms-section">
            <h2><i class="fas fa-user-circle"></i> 3. User Accounts</h2>

            <h3>3.1 Account Registration</h3>
            <p>
                To use certain features of Rentigo, you must create an account. You agree to:
            </p>
            <ul>
                <li>Provide accurate, current, and complete information during registration</li>
                <li>Maintain and update your information to keep it accurate and current</li>
                <li>Maintain the security of your password and account</li>
                <li>Accept responsibility for all activities that occur under your account</li>
                <li>Notify us immediately of any unauthorized use of your account</li>
            </ul>

            <h3>3.2 Account Types</h3>
            <ul>
                <li><strong>Admin:</strong> Full platform management and oversight capabilities</li>
                <li><strong>Property Manager:</strong> Manage properties, tenants, maintenance, and inspections (requires employment verification)</li>
                <li><strong>Landlord:</strong> List and manage owned properties</li>
                <li><strong>Tenant:</strong> Search, rent, and manage rental agreements</li>
            </ul>

            <h3>3.3 Property Manager Verification</h3>
            <p>
                Property Manager accounts require verification through employment ID documentation.
                Your account will be under review for 24-48 hours. We reserve the right to approve or
                reject applications at our discretion.
            </p>
        </div>

        <!-- User Responsibilities -->
        <div class="terms-section">
            <h2><i class="fas fa-tasks"></i> 4. User Responsibilities</h2>
            <p>As a user of Rentigo, you agree to:</p>
            <ul>
                <li>Use the Platform only for lawful purposes</li>
                <li>Not violate any local, state, national, or international laws</li>
                <li>Not impersonate any person or entity</li>
                <li>Not transmit any viruses, malware, or harmful code</li>
                <li>Not interfere with or disrupt the Platform or servers</li>
                <li>Not collect or harvest any information from other users</li>
                <li>Respect the intellectual property rights of others</li>
                <li>Provide truthful and accurate property listings (for landlords/managers)</li>
                <li>Fulfill rental obligations and agreements (for tenants)</li>
            </ul>
        </div>

        <!-- Services and Features -->
        <div class="terms-section">
            <h2><i class="fas fa-cogs"></i> 5. Services and Features</h2>

            <h3>5.1 Property Management</h3>
            <p>
                Property Managers and Landlords can list properties, manage tenants, handle maintenance
                requests, schedule inspections, and manage lease agreements through the Platform.
            </p>

            <h3>5.2 Tenant Services</h3>
            <p>
                Tenants can search for properties, submit rental applications, make payments,
                submit maintenance requests, and manage their lease agreements.
            </p>

            <h3>5.3 Service Availability</h3>
            <p>
                We strive to provide uninterrupted service but do not guarantee that the Platform
                will be available at all times. We may suspend or terminate services for maintenance,
                updates, or other reasons without prior notice.
            </p>
        </div>

        <!-- Payments and Fees -->
        <div class="terms-section">
            <h2><i class="fas fa-credit-card"></i> 6. Payments and Fees</h2>
            <ul>
                <li>All payments must be made through the Platform's payment system</li>
                <li>You are responsible for any applicable taxes</li>
                <li>Payment processing fees may apply</li>
                <li>Refunds are subject to our refund policy</li>
                <li>Disputed charges must be reported within 30 days</li>
            </ul>
        </div>

        <!-- Data and Privacy -->
        <div class="terms-section">
            <h2><i class="fas fa-shield-alt"></i> 7. Data and Privacy</h2>
            <p>
                Your use of Rentigo is also governed by our Privacy Policy. We collect, use, and
                protect your personal information as described in our
                <a href="<?php echo URLROOT; ?>/pages/privacy" style="color: #45a9ea; font-weight: 500;">Privacy Policy</a>.
            </p>
            <div class="highlight-box">
                <p>
                    <i class="fas fa-lock"></i> We take data security seriously and implement industry-standard
                    measures to protect your information.
                </p>
            </div>
        </div>

        <!-- Intellectual Property -->
        <div class="terms-section">
            <h2><i class="fas fa-copyright"></i> 8. Intellectual Property</h2>
            <p>
                All content, features, and functionality on the Platform, including but not limited to
                text, graphics, logos, icons, images, and software, are the property of Rentigo and
                protected by copyright, trademark, and other intellectual property laws.
            </p>
            <p>You may not:</p>
            <ul>
                <li>Copy, modify, or distribute our content without permission</li>
                <li>Use our trademarks or branding without authorization</li>
                <li>Reverse engineer or decompile any software</li>
                <li>Create derivative works based on our Platform</li>
            </ul>
        </div>

        <!-- Limitation of Liability -->
        <div class="terms-section">
            <h2><i class="fas fa-exclamation-triangle"></i> 9. Limitation of Liability</h2>
            <p>
                TO THE MAXIMUM EXTENT PERMITTED BY LAW, RENTIGO SHALL NOT BE LIABLE FOR ANY
                INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, OR PUNITIVE DAMAGES, OR ANY LOSS
                OF PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR INDIRECTLY.
            </p>
            <p>
                We are not responsible for:
            </p>
            <ul>
                <li>Disputes between landlords and tenants</li>
                <li>Property damage or personal injury</li>
                <li>Inaccurate property listings or information</li>
                <li>Payment processing errors or delays</li>
                <li>Third-party service failures</li>
            </ul>
        </div>

        <!-- Termination -->
        <div class="terms-section">
            <h2><i class="fas fa-ban"></i> 10. Termination</h2>
            <p>
                We reserve the right to suspend or terminate your account at any time for any reason,
                including but not limited to:
            </p>
            <ul>
                <li>Violation of these Terms</li>
                <li>Fraudulent or illegal activity</li>
                <li>Providing false information</li>
                <li>Abusive or inappropriate behavior</li>
                <li>Non-payment of fees</li>
            </ul>
            <p>
                You may terminate your account at any time by contacting us or through your account settings.
            </p>
        </div>

        <!-- Changes to Terms -->
        <div class="terms-section">
            <h2><i class="fas fa-edit"></i> 11. Changes to Terms</h2>
            <p>
                We reserve the right to modify these Terms at any time. We will notify users of
                significant changes via email or platform notification. Your continued use of the
                Platform after changes constitutes acceptance of the modified Terms.
            </p>
        </div>

        <!-- Governing Law -->
        <div class="terms-section">
            <h2><i class="fas fa-gavel"></i> 12. Governing Law</h2>
            <p>
                These Terms shall be governed by and construed in accordance with the laws of
                [Your Jurisdiction], without regard to its conflict of law provisions.
            </p>
        </div>

        <!-- Contact Information -->
        <div class="terms-section">
            <h2><i class="fas fa-envelope"></i> 13. Contact Us</h2>
            <p>
                If you have any questions about these Terms and Conditions, please contact us:
            </p>
            <ul>
                <li><strong>Email:</strong> support@rentigo.com</li>
                <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                <li><strong>Address:</strong> 123 Property Street, City, State 12345</li>
            </ul>
        </div>

        <!-- Footer -->
        <div class="terms-footer">
            <p>
                By using Rentigo, you acknowledge that you have read, understood, and agree to be
                bound by these Terms and Conditions.
            </p>
            <p>
                <a href="<?php echo URLROOT; ?>/pages/privacy">Privacy Policy</a> |
                <a href="<?php echo URLROOT; ?>/pages/index">Home</a> |
                <a href="<?php echo URLROOT; ?>/users/register">Sign Up</a>
            </p>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>