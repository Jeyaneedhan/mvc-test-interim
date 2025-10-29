<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>My Reviews</h2>
            <p>Rate and review your past rental experiences</p>
        </div>
    </div>

    <!-- Success Message (Hidden by default) -->
    <div id="successMessage" class="dashboard-section success-message hidden">
        <div class="success-content">
            <i class="fas fa-check-circle"></i>
            <p>Review submitted successfully! It will be published after moderation.</p>
        </div>
    </div>

    <!-- Review Stats -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Your Review Activity</h3>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">1</h3>
                    <p class="stat-label">Reviews Written</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">5.0</h3>
                    <p class="stat-label">Average Rating Given</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">1</h3>
                    <p class="stat-label">Pending Reviews</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">12</h3>
                    <p class="stat-label">Helpful Votes</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Past Properties -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Past Properties</h3>
        </div>

        <div class="reviews-list">
            <!-- Published Review -->
            <div class="review-card">
                <div class="property-info">
                    <h4>Oak Street Apartment</h4>
                    <p class="property-location">Downtown</p>
                    <p class="rental-period">January 1, 2023 - December 31, 2023</p>
                </div>
                <div class="review-content">
                    <span class="status-badge approved">Published</span>
                    <div class="review-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">5/5 stars</span>
                    </div>
                    <div class="review-text">
                        <p>"Great location and well-maintained property. The landlord was responsive to maintenance requests and the apartment was clean and modern. Would definitely recommend!"</p>
                        <span class="review-date">Reviewed on January 10, 2024</span>
                    </div>
                </div>
            </div>

            <!-- Unreviewed Property -->
            <div class="review-card unreviewed">
                <div class="property-info">
                    <h4>Maple Avenue Studio</h4>
                    <p class="property-location">Midtown</p>
                    <p class="rental-period">June 1, 2022 - November 30, 2022</p>
                </div>
                <div class="review-content">
                    <span class="status-badge">Not Reviewed</span>
                    <div class="review-actions">
                        <button onclick="openReviewModal('Maple Avenue Studio', 'Midtown')" class="btn btn-primary">
                            <i class="fas fa-star"></i> Write Review
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Guidelines -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Review Guidelines</h3>
        </div>

        <div class="guidelines-content">
            <div class="guideline-item">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h4>Be Honest and Fair</h4>
                    <p>Share your genuine experience to help other tenants make informed decisions.</p>
                </div>
            </div>

            <div class="guideline-item">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h4>Be Specific</h4>
                    <p>Include details about the property condition, location, and landlord responsiveness.</p>
                </div>
            </div>

            <div class="guideline-item">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h4>Keep it Professional</h4>
                    <p>Avoid personal attacks and focus on factual information about your rental experience.</p>
                </div>
            </div>

            <div class="guideline-item">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h4>Review Timeline</h4>
                    <p>Reviews can be submitted up to 6 months after your lease ends.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div id="reviewModal" class="modal-overlay hidden">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Write Review</h3>
            <button class="modal-close" onclick="closeReviewModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="modal-body">
            <div class="review-property-info">
                <h4 id="modalPropertyName"></h4>
                <p id="modalPropertyLocation"></p>
            </div>

            <div class="rating-section">
                <label>Overall Rating</label>
                <div class="star-rating" id="starRating">
                    <button type="button" onclick="setRating(1)" class="star-btn" data-rating="1">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" onclick="setRating(2)" class="star-btn" data-rating="2">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" onclick="setRating(3)" class="star-btn" data-rating="3">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" onclick="setRating(4)" class="star-btn" data-rating="4">
                        <i class="fas fa-star"></i>
                    </button>
                    <button type="button" onclick="setRating(5)" class="star-btn" data-rating="5">
                        <i class="fas fa-star"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label>Your Review</label>
                <textarea id="reviewComment" placeholder="Share your experience with this property..." class="form-textarea" required></textarea>
            </div>

            <div class="modal-actions">
                <button onclick="closeReviewModal()" class="btn btn-secondary">Cancel</button>
                <button onclick="submitReview()" id="submitReviewBtn" class="btn btn-primary" disabled>
                    Submit Review
                </button>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>