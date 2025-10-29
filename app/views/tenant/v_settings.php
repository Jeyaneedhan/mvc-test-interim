<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Settings</h2>
            <p>Manage your account preferences and settings</p>
        </div>
    </div>

    <!-- Profile Settings -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Profile Information</h3>
        </div>

        <form class="settings-form">
            <div class="profile-avatar">
                <div class="avatar-preview">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="avatar-actions">
                    <button type="button" class="btn btn-secondary btn-sm">Change Photo</button>
                    <button type="button" class="btn btn-danger btn-sm">Remove</button>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" value="<?php echo $_SESSION['user_name'] ?? 'John'; ?>" class="form-input">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" value="Doe" class="form-input">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="john.doe@example.com" class="form-input">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" value="+1 (555) 123-4567" class="form-input">
                </div>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea class="form-textarea" placeholder="Enter your current address">123 Main Street, City, State 12345</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-input">
                </div>
                <div class="form-group">
                    <label>Emergency Contact</label>
                    <input type="text" placeholder="Emergency contact name and phone" class="form-input">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>

    <!-- Account Preferences -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Account Preferences</h3>
        </div>

        <div class="preferences-list">
            <div class="preference-item">
                <div class="preference-info">
                    <h4>Language</h4>
                    <p>Choose your preferred language</p>
                </div>
                <select class="form-select">
                    <option value="en">English</option>
                    <option value="es">Spanish</option>
                    <option value="fr">French</option>
                </select>
            </div>

            <div class="preference-item">
                <div class="preference-info">
                    <h4>Time Zone</h4>
                    <p>Set your local time zone</p>
                </div>
                <select class="form-select">
                    <option value="PST">Pacific Standard Time</option>
                    <option value="EST">Eastern Standard Time</option>
                    <option value="CST">Central Standard Time</option>
                    <option value="MST">Mountain Standard Time</option>
                </select>
            </div>

            <div class="preference-item">
                <div class="preference-info">
                    <h4>Currency</h4>
                    <p>Display prices in your preferred currency</p>
                </div>
                <select class="form-select">
                    <option value="USD">US Dollar ($)</option>
                    <option value="EUR">Euro (€)</option>
                    <option value="GBP">British Pound (£)</option>
                    <option value="CAD">Canadian Dollar (C$)</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Notification Preferences -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Notification Preferences</h3>
        </div>

        <div class="notification-settings">
            <div class="notification-item">
                <div class="notification-info">
                    <h4>Email Notifications</h4>
                    <p>Receive notifications via email</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="notification-item">
                <div class="notification-info">
                    <h4>SMS Notifications</h4>
                    <p>Receive notifications via SMS</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="notification-item">
                <div class="notification-info">
                    <h4>Rent Payment Reminders</h4>
                    <p>Get reminded before rent is due</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="notification-item">
                <div class="notification-info">
                    <h4>Maintenance Updates</h4>
                    <p>Updates on maintenance requests</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="notification-item">
                <div class="notification-info">
                    <h4>Property Recommendations</h4>
                    <p>Receive new property suggestions</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="notification-item">
                <div class="notification-info">
                    <h4>Marketing Communications</h4>
                    <p>Promotional emails and updates</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <button class="btn btn-primary">Save Preferences</button>
        </div>
    </div>

    <!-- Security Settings -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Security Settings</h3>
        </div>

        <div class="security-settings">
            <div class="security-item">
                <h4>Change Password</h4>
                <div class="password-form">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" class="form-input">
                    </div>
                    <button class="btn btn-primary">Update Password</button>
                </div>
            </div>

            <div class="security-item">
                <div class="security-option">
                    <div class="security-info">
                        <h4>Two-Factor Authentication</h4>
                        <p>Add an extra layer of security to your account</p>
                        <span class="security-status">Status: Not enabled</span>
                    </div>
                    <button class="btn btn-secondary">Enable 2FA</button>
                </div>
            </div>

            <div class="security-item">
                <div class="security-option">
                    <div class="security-info">
                        <h4>Login Alerts</h4>
                        <p>Get notified when someone logs into your account</p>
                        <span class="security-status">Status: Enabled</span>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>

            <div class="security-item">
                <h4>Active Sessions</h4>
                <div class="sessions-list">
                    <div class="session-item">
                        <div class="session-info">
                            <div class="session-device">
                                <i class="fas fa-desktop"></i>
                                <span>Windows PC - Chrome</span>
                            </div>
                            <div class="session-details">
                                <span>Last active: 2 minutes ago</span>
                                <span>IP: 192.168.1.100</span>
                            </div>
                        </div>
                        <span class="session-status current">Current Session</span>
                    </div>

                    <div class="session-item">
                        <div class="session-info">
                            <div class="session-device">
                                <i class="fas fa-mobile-alt"></i>
                                <span>iPhone - Safari</span>
                            </div>
                            <div class="session-details">
                                <span>Last active: 2 days ago</span>
                                <span>IP: 192.168.1.105</span>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-sm">Revoke</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Actions -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Account Actions</h3>
        </div>

        <div class="account-actions">
            <div class="action-item">
                <div class="action-info">
                    <h4>Download Account Data</h4>
                    <p>Download a copy of your account information</p>
                </div>
                <button class="btn btn-secondary">Download</button>
            </div>

            <div class="action-item">
                <div class="action-info">
                    <h4>Deactivate Account</h4>
                    <p>Temporarily disable your account</p>
                </div>
                <button class="btn btn-warning">Deactivate</button>
            </div>

            <div class="action-item danger">
                <div class="action-info">
                    <h4>Delete Account</h4>
                    <p>Permanently delete your account and all data</p>
                </div>
                <button class="btn btn-danger">Delete Account</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Add interactivity for settings
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle switches
        document.querySelectorAll('.toggle-switch input').forEach(toggle => {
            toggle.addEventListener('change', function() {
                showNotification(`Setting ${this.checked ? 'enabled' : 'disabled'}`, 'info');
            });
        });

        // Form submissions
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                showNotification('Settings saved successfully!', 'success');
            });
        });

        // Dangerous actions confirmation
        document.querySelectorAll('.btn-danger').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to perform this action?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>