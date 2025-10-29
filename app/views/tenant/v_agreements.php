<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Lease Agreements</h2>
            <p>View and manage your rental agreements</p>
        </div>
    </div>

    <!-- Your Agreements -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Your Agreements</h3>
        </div>

        <div class="agreements-list">
            <div class="agreement-card">
                <div class="agreement-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <div class="agreement-details">
                    <h4>Rental Agreement</h4>
                    <p class="agreement-property">Oak Street Apartment</p>
                    <div class="agreement-info">
                        <span><strong>Signed:</strong> January 1, 2025</span>
                        <span><strong>Expires:</strong> December 31, 2025</span>
                        <span><strong>Rent:</strong> Rs 20,000/mo</span>
                    </div>
                </div>
                <div class="agreement-status">
                    <span class="status-badge approved">Active</span>
                    <div class="agreement-actions">
                        <button class="btn btn-secondary btn-sm" onclick="viewAgreement(1)">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="downloadAgreement(1)">
                            <i class="fas fa-download"></i> Download
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agreement Terms Summary -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Agreement Terms Summary</h3>
        </div>

        <div class="terms-grid">
            <div class="term-card">
                <div class="term-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="term-content">
                    <h4>Property Type</h4>
                    <p>2 Bedroom Apartment</p>
                </div>
            </div>

            <div class="term-card">
                <div class="term-icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="term-content">
                    <h4>Lease Duration</h4>
                    <p>12 Months</p>
                </div>
            </div>

            <div class="term-card">
                <div class="term-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="term-content">
                    <h4>Security Deposit</h4>
                    <p>Rs 20,000 (1 month rent)</p>
                </div>
            </div>

            <div class="term-card">
                <div class="term-icon">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="term-content">
                    <h4>Pet Policy</h4>
                    <p>No pets allowed</p>
                </div>
            </div>

            <div class="term-card">
                <div class="term-icon">
                    <i class="fas fa-smoking-ban"></i>
                </div>
                <div class="term-content">
                    <h4>Smoking Policy</h4>
                    <p>No smoking</p>
                </div>
            </div>

            <div class="term-card">
                <div class="term-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="term-content">
                    <h4>Maintenance</h4>
                    <p>Landlord responsible</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agreement Viewer Modal -->
<div id="agreementModal" class="modal-overlay hidden">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3>Rental Agreement</h3>
            <button class="modal-close" onclick="closeAgreementModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="agreement-document">
                <h4>Rental Agreement - Oak Street Apartment</h4>
                <p>This agreement is between the landlord and tenant for the rental of the property located at Oak Street Apartment, Downtown.</p>

                <h5>Terms and Conditions:</h5>
                <ul>
                    <li>Monthly rent: $1,200</li>
                    <li>Security deposit: $1,200</li>
                    <li>Lease duration: 12 months</li>
                    <li>Pet policy: No pets allowed</li>
                    <li>Smoking policy: No smoking</li>
                    <li>Maintenance: Landlord responsible for major repairs</li>
                    <li>Utilities: Tenant responsible for electricity and gas</li>
                    <li>Parking: One assigned parking space included</li>
                </ul>

                <h5>Tenant Responsibilities:</h5>
                <ul>
                    <li>Pay rent on time (due 1st of each month)</li>
                    <li>Maintain cleanliness of the property</li>
                    <li>Report maintenance issues promptly</li>
                    <li>No unauthorized modifications to the property</li>
                </ul>

                <p><strong>Both parties agree to the terms outlined in this agreement.</strong></p>

                <div class="signature-section">
                    <div class="signature">
                        <p><strong>Tenant Signature:</strong></p>
                        <p>John Doe - January 1, 2024</p>
                    </div>
                    <div class="signature">
                        <p><strong>Landlord Signature:</strong></p>
                        <p>Property Manager - January 1, 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function viewAgreement(agreementId) {
        document.getElementById('agreementModal').classList.remove('hidden');
    }

    function closeAgreementModal() {
        document.getElementById('agreementModal').classList.add('hidden');
    }

    function downloadAgreement(agreementId) {
        // Simulate download
        showNotification('Agreement download started...', 'info');
    }
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>