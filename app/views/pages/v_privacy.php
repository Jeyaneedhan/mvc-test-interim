<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
    .privacy-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
        background-color: #f9fafb;
        min-height: 100vh;
    }

    .privacy-header {
        text-align: center;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 3px solid #45a9ea;
    }

    .privacy-header h1 {
        font-size: 2.5rem;
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .privacy-header .subtitle {
        color: #6b7280;
        font-size: 1rem;
    }

    .privacy-header .last-updated {
        display: inline-block;
        margin-top: 1rem;
        padding: 0.5rem 1.5rem;
        background: rgba(69, 169, 234, 0.1);
        color: #45a9ea;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .privacy-content {
        background: white;
        border-radius: 1rem;
        padding: 3rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .privacy-section {
        margin-bottom: 2.5rem;
    }

    .privacy-section h2 {
        font-size: 1.75rem;
        color: #1f2937;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
    }

    .privacy-section h2 i {
        color: #45a9ea;
        font-size: 1.5rem;
    }

    .privacy-section h3 {
        font-size: 1.25rem;
        color: #374151;
        margin: 1.5rem 0 0.75rem 0;
        font-weight: 600;
    }

    .privacy-section p {
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 1rem;
        font-size: 1rem;
    }

    .privacy-section ul,
    .privacy-section ol {
        margin-left: 2rem;
        margin-bottom: 1rem;
    }

    .privacy-section li {
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

    .privacy-table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
    }

    .privacy-table th,
    .privacy-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .privacy-table th {
        background: rgba(69, 169, 234, 0.1);
        color: #1f2937;
        font-weight: 600;
    }

    .privacy-table td {
        color: #4b5563;
    }

    .privacy-footer {
        text-align: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #e5e7eb;
    }

    .privacy-footer p {
        color: #6b7280;
        font-size: 0.938rem;
    }

    .privacy-footer a {
        color: #45a9ea;
        text-decoration: none;
        font-weight: 500;
    }

    .privacy-footer a:hover {
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
        .privacy-container {
            padding: 2rem 1rem;
        }

        .privacy-content {
            padding: 2rem 1.5rem;
        }

        .privacy-header h1 {
            font-size: 2rem;
        }

        .privacy-section h2 {
            font-size: 1.5rem;
        }

        .privacy-table {
            font-size: 0.875rem;
        }
    }
</style>

<div class="privacy-container">
    <a href="javascript:history.back()" class="back-button">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    <div class="privacy-header">
        <h1>Privacy Policy</h1>
        <p class="subtitle">Rentigo - Rental Property Management System</p>
        <span class="last-updated">
            <i class="fas fa-calendar-alt"></i> Last Updated: October 18, 2025
        </span>
    </div>

    <div class="privacy-content">
        <!-- Introduction -->
        <div class="privacy-section">
            <h2><i class="fas fa-shield-alt"></i> 1. Introduction</h2>
            <p>
                At Rentigo, we take your privacy seriously. This Privacy Policy explains how we collect,
                use, disclose, and safeguard your information when you use our rental property management
                platform. Please read this policy carefully to understand our practices regarding your
                personal information.
            </p>
            <div class="highlight-box">
                <p>
                    <i class="fas fa-lock"></i> Your privacy is important to us. We are committed to
                    protecting your personal information and your right to privacy.
                </p>
            </div>
        </div>

        <!-- Information We Collect -->
        <div class="privacy-section">
            <h2><i class="fas fa-database"></i> 2. Information We Collect</h2>

            <h3>2.1 Personal Information</h3>
            <p>We collect personal information that you voluntarily provide to us when you:</p>
            <ul>
                <li>Register for an account</li>
                <li>Complete your user profile</li>
                <li>List a property (for landlords/managers)</li>
                <li>Apply for a rental (for tenants)</li>
                <li>Make payments through the platform</li>
                <li>Contact our support team</li>
            </ul>

            <h3>2.2 Types of Data Collected</h3>
            <table class="privacy-table">
                <thead>
                    <tr>
                        <th>Data Type</th>
                        <th>Examples</th>
                        <th>Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Identity Data</td>
                        <td>Full name, date of birth</td>
                        <td>Account creation and verification</td>
                    </tr>
                    <tr>
                        <td>Contact Data</td>
                        <td>Email, phone number, address</td>
                        <td>Communication and service delivery</td>
                    </tr>
                    <tr>
                        <td>Financial Data</td>
                        <td>Payment information, bank details</td>
                        <td>Processing payments and transactions</td>
                    </tr>
                    <tr>
                        <td>Property Data</td>
                        <td>Property details, photos, documents</td>
                        <td>Property listings and management</td>
                    </tr>
                    <tr>
                        <td>Employment Data</td>
                        <td>Employee ID (Property Managers)</td>
                        <td>Verification and authentication</td>
                    </tr>
                    <tr>
                        <td>Usage Data</td>
                        <td>Login times, features used</td>
                        <td>Platform improvement and analytics</td>
                    </tr>
                    <tr>
                        <td>Technical Data</td>
                        <td>IP address, browser type, device info</td>
                        <td>Security and troubleshooting</td>
                    </tr>
                </tbody>
            </table>

            <h3>2.3 Automated Data Collection</h3>
            <p>We automatically collect certain information when you use our platform:</p>
            <ul>
                <li><strong>Cookies:</strong> Small files stored on your device to enhance user experience</li>
                <li><strong>Log Data:</strong> Information about your visits, including IP address and browser type</li>
                <li><strong>Analytics:</strong> Usage patterns and feature interactions</li>
            </ul>
        </div>

        <!-- How We Use Your Information -->
        <div class="privacy-section">
            <h2><i class="fas fa-clipboard-list"></i> 3. How We Use Your Information</h2>
            <p>We use the information we collect for the following purposes:</p>
            <ul>
                <li><strong>Account Management:</strong> Create and manage your account</li>
                <li><strong>Service Delivery:</strong> Provide and maintain our platform services</li>
                <li><strong>Communication:</strong> Send notifications, updates, and support messages</li>
                <li><strong>Payment Processing:</strong> Handle rental payments and financial transactions</li>
                <li><strong>Verification:</strong> Verify identity and employment (for Property Managers)</li>
                <li><strong>Property Management:</strong> Facilitate property listings and rental processes</li>
                <li><strong>Analytics:</strong> Analyze usage patterns to improve our services</li>
                <li><strong>Security:</strong> Detect and prevent fraud, abuse, and security issues</li>
                <li><strong>Legal Compliance:</strong> Comply with legal obligations and enforce our terms</li>
                <li><strong>Marketing:</strong> Send promotional materials (with your consent)</li>
            </ul>
        </div>

        <!-- How We Share Your Information -->
        <div class="privacy-section">
            <h2><i class="fas fa-share-alt"></i> 4. How We Share Your Information</h2>
            <p>We may share your information in the following circumstances:</p>

            <h3>4.1 With Other Users</h3>
            <ul>
                <li>Property Managers can view tenant information for properties they manage</li>
                <li>Landlords can view information about tenants renting their properties</li>
                <li>Tenants can view property manager and landlord contact information</li>
            </ul>

            <h3>4.2 With Service Providers</h3>
            <ul>
                <li>Payment processors for handling transactions</li>
                <li>Cloud hosting providers for data storage</li>
                <li>Email service providers for communications</li>
                <li>Analytics providers for usage tracking</li>
            </ul>

            <h3>4.3 Legal Requirements</h3>
            <p>We may disclose your information if required by law or in response to:</p>
            <ul>
                <li>Legal proceedings or court orders</li>
                <li>Law enforcement requests</li>
                <li>Protection of our rights or property</li>
                <li>Investigation of potential violations</li>
            </ul>

            <h3>4.4 Business Transfers</h3>
            <p>
                In the event of a merger, acquisition, or sale of assets, your information may be
                transferred as part of that transaction.
            </p>
        </div>

        <!-- Data Security -->
        <div class="privacy-section">
            <h2><i class="fas fa-lock"></i> 5. Data Security</h2>
            <p>We implement appropriate security measures to protect your personal information:</p>
            <ul>
                <li><strong>Encryption:</strong> Data transmitted is encrypted using SSL/TLS protocols</li>
                <li><strong>Secure Storage:</strong> Data stored in secure databases with access controls</li>
                <li><strong>Password Protection:</strong> Passwords are hashed and never stored in plain text</li>
                <li><strong>Access Controls:</strong> Limited access to personal data on a need-to-know basis</li>
                <li><strong>Regular Audits:</strong> Periodic security assessments and vulnerability testing</li>
                <li><strong>Employee Training:</strong> Staff trained on data protection and privacy practices</li>
            </ul>
            <div class="highlight-box">
                <p>
                    <i class="fas fa-exclamation-triangle"></i> While we use reasonable security measures,
                    no method of transmission over the Internet is 100% secure. We cannot guarantee absolute security.
                </p>
            </div>
        </div>

        <!-- Data Retention -->
        <div class="privacy-section">
            <h2><i class="fas fa-clock"></i> 6. Data Retention</h2>
            <p>
                We retain your personal information for as long as necessary to fulfill the purposes
                outlined in this Privacy Policy, unless a longer retention period is required by law.
            </p>
            <ul>
                <li><strong>Active Accounts:</strong> Data retained while your account is active</li>
                <li><strong>Closed Accounts:</strong> Data may be retained for up to 7 years for legal compliance</li>
                <li><strong>Financial Records:</strong> Retained for 7 years as required by law</li>
                <li><strong>Employee ID Documents:</strong> Retained while Property Manager account is active</li>
            </ul>
        </div>

        <!-- Your Rights -->
        <div class="privacy-section">
            <h2><i class="fas fa-user-check"></i> 7. Your Privacy Rights</h2>
            <p>You have the following rights regarding your personal information:</p>
            <ul>
                <li><strong>Access:</strong> Request a copy of your personal data</li>
                <li><strong>Correction:</strong> Update or correct inaccurate information</li>
                <li><strong>Deletion:</strong> Request deletion of your personal data</li>
                <li><strong>Portability:</strong> Receive your data in a structured format</li>
                <li><strong>Objection:</strong> Object to certain processing of your data</li>
                <li><strong>Restriction:</strong> Request limitation of data processing</li>
                <li><strong>Withdraw Consent:</strong> Withdraw consent for data processing</li>
                <li><strong>Opt-Out:</strong> Unsubscribe from marketing communications</li>
            </ul>
            <p>
                To exercise these rights, please contact us at
                <a href="mailto:privacy@rentigo.com" style="color: #45a9ea;">privacy@rentigo.com</a>
            </p>
        </div>

        <!-- Cookies -->
        <div class="privacy-section">
            <h2><i class="fas fa-cookie-bite"></i> 8. Cookies and Tracking</h2>
            <p>We use cookies and similar tracking technologies to:</p>
            <ul>
                <li>Remember your login credentials and preferences</li>
                <li>Analyze platform usage and performance</li>
                <li>Provide personalized content and features</li>
                <li>Enhance security and prevent fraud</li>
            </ul>
            <p>You can control cookie settings through your browser preferences.</p>
        </div>

        <!-- Children's Privacy -->
        <div class="privacy-section">
            <h2><i class="fas fa-child"></i> 9. Children's Privacy</h2>
            <p>
                Rentigo is not intended for users under the age of 18. We do not knowingly collect
                personal information from children under 18. If you believe we have collected information
                from a child, please contact us immediately.
            </p>
        </div>

        <!-- International Users -->
        <div class="privacy-section">
            <h2><i class="fas fa-globe"></i> 10. International Data Transfers</h2>
            <p>
                Your information may be transferred to and processed in countries other than your country
                of residence. These countries may have different data protection laws. By using Rentigo,
                you consent to such transfers.
            </p>
        </div>

        <!-- Third-Party Links -->
        <div class="privacy-section">
            <h2><i class="fas fa-link"></i> 11. Third-Party Links</h2>
            <p>
                Our platform may contain links to third-party websites. We are not responsible for the
                privacy practices of these websites. We encourage you to read their privacy policies.
            </p>
        </div>

        <!-- Changes to Privacy Policy -->
        <div class="privacy-section">
            <h2><i class="fas fa-edit"></i> 12. Changes to This Privacy Policy</h2>
            <p>
                We may update this Privacy Policy from time to time. We will notify you of significant
                changes via email or platform notification. The "Last Updated" date at the top indicates
                when the policy was last revised.
            </p>
        </div>

        <!-- Contact Us -->
        <div class="privacy-section">
            <h2><i class="fas fa-envelope"></i> 13. Contact Us</h2>
            <p>
                If you have any questions or concerns about this Privacy Policy or our data practices,
                please contact us:
            </p>
            <ul>
                <li><strong>Email:</strong> privacy@rentigo.com</li>
                <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                <li><strong>Address:</strong> 123 Property Street, City, State 12345</li>
                <li><strong>Data Protection Officer:</strong> dpo@rentigo.com</li>
            </ul>
        </div>

        <!-- Footer -->
        <div class="privacy-footer">
            <p>
                By using Rentigo, you acknowledge that you have read and understood this Privacy Policy
                and agree to its terms.
            </p>
            <p>
                <a href="<?php echo URLROOT; ?>/pages/terms">Terms and Conditions</a> |
                <a href="<?php echo URLROOT; ?>/pages/index">Home</a> |
                <a href="<?php echo URLROOT; ?>/users/register">Sign Up</a>
            </p>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>