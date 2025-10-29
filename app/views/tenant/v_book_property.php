<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="content-wrapper">
    <div class="page-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-content">
                <h2>Book Property</h2>
                <p>Complete your rental agreement and finalize your booking</p>
            </div>
        </div>

        <!-- Reserved Properties -->
        <div class="dashboard-section">
            <div class="section-header">
                <h3>Reserved Properties</h3>
            </div>

            <div class="bookings-list">
                <!-- Property 1 - Waiting for Verification -->
                <div class="booking-card">
                    <div class="booking-details">
                        <h4>Oak Street Apartment</h4>
                        <p class="booking-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Downtown
                        </p>
                        <p class="booking-price">$1,200/month</p>
                        <div class="booking-dates">
                            <span><i class="fas fa-calendar"></i> Reserved on: January 15, 2024</span>
                        </div>
                        <div class="booking-dates warning">
                            <span><i class="fas fa-clock"></i> Expires: January 17, 2024</span>
                        </div>
                    </div>
                    <div class="booking-status">
                        <span class="status-badge pending">Waiting for Verification</span>
                    </div>
                </div>

                <!-- Upload Section -->
                <div class="dashboard-section mb-4">
                    <div class="section-header">
                        <div class="info-notice">
                            <div class="info-notice-content">
                                <i class="fas fa-clock info-notice-icon"></i>
                                <div>
                                    <h4 class="info-notice-title">Upload Required</h4>
                                    <p class="info-notice-text">
                                        Please upload your signed lease agreement to complete the booking process.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 1.5rem;">
                        <!-- File Upload Form -->
                        <form id="agreementUploadForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Upload Signed Agreement</label>
                                <div class="upload-area" id="uploadArea">
                                    <div class="upload-content">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Choose a file or drag it here</p>
                                        <p class="upload-note">PDF, DOC, or DOCX files only (max 10MB)</p>
                                    </div>
                                    <input type="file" accept=".pdf,.doc,.docx" id="fileInput" name="agreement_file" class="hidden">
                                    <label for="fileInput" class="btn btn-secondary mt-4">Browse Files</label>
                                </div>

                                <div id="selectedFile" class="hidden">
                                    <div class="file-selection-display">
                                        <i class="fas fa-file-alt file-icon"></i>
                                        <span class="file-name" id="fileName"></span>
                                        <button type="button" onclick="removeFile()" class="btn btn-danger btn-sm file-remove-btn">Remove</button>
                                    </div>
                                </div>

                                <button type="submit" id="submitBtn" disabled class="btn btn-primary w-full mt-4">
                                    <i class="fas fa-upload"></i>
                                    Submit Agreement
                                </button>

                                <div id="uploadSuccess" class="hidden upload-success-notice">
                                    <div class="success-notice">
                                        <div class="success-notice-content">
                                            <i class="fas fa-check-circle success-notice-icon"></i>
                                            <div>
                                                <h4 class="success-notice-title">Upload Successful</h4>
                                                <p class="success-notice-text">
                                                    Agreement uploaded successfully! We'll review it within 24 hours.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Property 2 - Completed Booking -->
                <div class="booking-card">
                    <div class="booking-details">
                        <h4>Maple Avenue Studio</h4>
                        <p class="booking-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Midtown
                        </p>
                        <p class="booking-price">$800/month</p>
                        <div class="booking-dates">
                            <span><i class="fas fa-calendar"></i> Reserved on: January 10, 2024</span>
                        </div>
                    </div>
                    <div class="booking-status">
                        <span class="status-badge approved">Booked</span>
                    </div>
                </div>

                <!-- Success Message for Completed Booking -->
                <div class="success-notice mt-4">
                    <div class="success-notice-content">
                        <i class="fas fa-check-circle success-notice-icon"></i>
                        <div>
                            <h4 class="success-notice-title">Booking Complete</h4>
                            <p class="success-notice-text">
                                Your rental agreement has been approved. You can move in on your lease start date.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Process Steps -->
        <div class="dashboard-section">
            <div class="section-header">
                <h3>Booking Process</h3>
            </div>

            <div class="process-steps-grid">
                <div class="process-step">
                    <div class="process-step-icon completed">
                        <i class="fas fa-check"></i>
                    </div>
                    <h4 class="process-step-title">1. Property Reserved</h4>
                    <p class="process-step-description">Property is reserved for 48 hours</p>
                </div>

                <div class="process-step">
                    <div class="process-step-icon current">
                        <i class="fas fa-upload"></i>
                    </div>
                    <h4 class="process-step-title">2. Upload Agreement</h4>
                    <p class="process-step-description">Upload signed lease agreement</p>
                </div>

                <div class="process-step">
                    <div class="process-step-icon pending">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4 class="process-step-title">3. Review Process</h4>
                    <p class="process-step-description">We review your documents</p>
                </div>

                <div class="process-step">
                    <div class="process-step-icon pending">
                        <i class="fas fa-key"></i>
                    </div>
                    <h4 class="process-step-title">4. Move In</h4>
                    <p class="process-step-description">Get your keys and move in</p>
                </div>
            </div>
        </div>

        <!-- Important Notes -->
        <div class="dashboard-section">
            <div class="section-header">
                <h3>Important Notes</h3>
            </div>

            <div class="guidelines-content">
                <div class="guideline-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h4>Reservation Expiry</h4>
                        <p>Your property reservation is valid for 48 hours. Please upload your documents within this timeframe.</p>
                    </div>
                </div>

                <div class="guideline-item">
                    <i class="fas fa-file-contract"></i>
                    <div>
                        <h4>Required Documents</h4>
                        <p>Please ensure your lease agreement is properly signed and all required fields are completed.</p>
                    </div>
                </div>

                <div class="guideline-item">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h4>Document Security</h4>
                        <p>All uploaded documents are encrypted and stored securely. Only authorized personnel can access them.</p>
                    </div>
                </div>

                <div class="guideline-item">
                    <i class="fas fa-headset"></i>
                    <div>
                        <h4>Need Help?</h4>
                        <p>If you have any questions about the booking process, please contact our support team.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Single, clean file upload handler
    (function() {
        let uploadStatus = 'idle';
        const maxFileSize = 10 * 1024 * 1024; // 10MB
        const allowedTypes = ['.pdf', '.doc', '.docx'];

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeFileUpload();
        });

        function initializeFileUpload() {
            const uploadArea = document.getElementById('uploadArea');
            const fileInput = document.getElementById('fileInput');
            const form = document.getElementById('agreementUploadForm');

            if (!uploadArea || !fileInput || !form) return;

            // Make upload area clickable
            uploadArea.addEventListener('click', () => fileInput.click());

            // Handle file selection
            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) handleFileSelection(file);
            });

            // Handle form submission
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                submitAgreement();
            });

            // Setup drag and drop
            setupDragAndDrop(uploadArea);
        }

        function setupDragAndDrop(uploadArea) {
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });

            uploadArea.addEventListener('dragleave', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                const files = e.dataTransfer.files;
                if (files.length > 0) handleFileSelection(files[0]);
            });
        }

        function handleFileSelection(file) {
            // Validate file type
            const fileExtension = '.' + file.name.split('.').pop().toLowerCase();
            if (!allowedTypes.includes(fileExtension)) {
                showNotification('Please select a PDF, DOC, or DOCX file.', 'error');
                return;
            }

            // Validate file size
            if (file.size > maxFileSize) {
                showNotification('File size must be less than 10MB.', 'error');
                return;
            }

            // Display selected file
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('selectedFile').classList.remove('hidden');

            // Enable submit button
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');

            uploadStatus = 'ready';
            showNotification('File selected successfully!', 'success');
        }

        // Make removeFile global so the onclick works
        window.removeFile = function() {
            document.getElementById('fileInput').value = '';
            document.getElementById('selectedFile').classList.add('hidden');
            document.getElementById('uploadSuccess').classList.add('hidden');

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitBtn.innerHTML = '<i class="fas fa-upload"></i> Submit Agreement';
            submitBtn.classList.remove('btn-success');
            submitBtn.classList.add('btn-primary');

            uploadStatus = 'idle';
        };

        function submitAgreement() {
            if (uploadStatus !== 'ready') return;

            uploadStatus = 'uploading';
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading...';
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');

            // Simulate upload process (replace with actual AJAX when ready)
            setTimeout(() => {
                uploadStatus = 'success';
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Uploaded Successfully';
                submitBtn.classList.remove('btn-primary');
                submitBtn.classList.add('btn-success');

                document.getElementById('uploadSuccess').classList.remove('hidden');
                showNotification('Agreement uploaded successfully! We will review it within 24 hours.', 'success');

                // Update status badge
                setTimeout(() => {
                    const statusBadge = document.querySelector('.status-badge.pending');
                    if (statusBadge) {
                        statusBadge.textContent = 'Under Review';
                        statusBadge.classList.remove('pending');
                        statusBadge.classList.add('warning');
                    }
                }, 1000);
            }, 3000);

            /* Uncomment when ready to implement actual upload
            const formData = new FormData(document.getElementById('agreementUploadForm'));
            fetch('<?php echo URLROOT; ?>/tenant/uploadAgreement', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Handle success
                } else {
                    // Handle error
                }
            })
            .catch(error => {
                console.error('Upload error:', error);
            });
            */
        }

        function showNotification(message, type = "info") {
            const notification = document.createElement("div");
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas ${getNotificationIcon(type)}"></i>
                <span>${message}</span>
            </div>
        `;

            Object.assign(notification.style, {
                position: "fixed",
                top: "20px",
                right: "20px",
                padding: "1rem 1.5rem",
                borderRadius: "0.5rem",
                color: "white",
                fontWeight: "500",
                zIndex: "9999",
                opacity: "0",
                transform: "translateY(-20px)",
                transition: "all 0.3s ease",
                maxWidth: "400px",
                boxShadow: "0 4px 12px rgba(0, 0, 0, 0.15)"
            });

            const colors = {
                success: "#10b981",
                warning: "#f59e0b",
                error: "#ef4444",
                info: "#3b82f6",
            };
            notification.style.backgroundColor = colors[type] || colors.info;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.opacity = "1";
                notification.style.transform = "translateY(0)";
            }, 100);

            setTimeout(() => {
                notification.style.opacity = "0";
                notification.style.transform = "translateY(-20px)";
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 4000);
        }

        function getNotificationIcon(type) {
            const icons = {
                success: "fa-check-circle",
                warning: "fa-exclamation-triangle",
                error: "fa-times-circle",
                info: "fa-info-circle"
            };
            return icons[type] || icons.info;
        }
    })();
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>