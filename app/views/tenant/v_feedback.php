<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Platform Feedback</h2>
            <p>Help us improve your experience</p>
        </div>
    </div>

    <!-- Success Message (Hidden by default) -->
    <div id="successMessage" class="dashboard-section text-center hidden">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3>Thank You!</h3>
        <p>Your feedback has been submitted successfully. We appreciate your input!</p>
        <button onclick="submitMoreFeedback()" class="btn btn-primary">Submit More Feedback</button>
    </div>

    <!-- Feedback Statistics -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Community Feedback Overview</h3>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">4.6</h3>
                    <p class="stat-label">Average Platform Rating</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">1,247</h3>
                    <p class="stat-label">Total Feedback Received</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">89</h3>
                    <p class="stat-label">Features Implemented</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-info">
                    <h3 class="stat-number">98%</h3>
                    <p class="stat-label">User Satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feedback Form -->
<div id="feedbackForm" class="dashboard-section">
    <div class="section-header">
        <h3>Rate Your Experience</h3>
    </div>

    <form onsubmit="submitFeedback(event)" class="feedback-form">
        <!-- Overall Rating -->
        <div class="rating-section text-center">
            <label>How would you rate your overall experience with our platform?</label>
            <div class="feedback-stars" id="feedbackStars">
                <button type="button" onclick="setFeedbackRating(1)" class="feedback-star" data-rating="1">
                    <i class="fas fa-star"></i>
                </button>
                <button type="button" onclick="setFeedbackRating(2)" class="feedback-star" data-rating="2">
                    <i class="fas fa-star"></i>
                </button>
                <button type="button" onclick="setFeedbackRating(3)" class="feedback-star" data-rating="3">
                    <i class="fas fa-star"></i>
                </button>
                <button type="button" onclick="setFeedbackRating(4)" class="feedback-star" data-rating="4">
                    <i class="fas fa-star"></i>
                </button>
                <button type="button" onclick="setFeedbackRating(5)" class="feedback-star" data-rating="5">
                    <i class="fas fa-star"></i>
                </button>
            </div>
        </div>

        <!-- Feedback Categories -->
        <div class="feedback-categories">
            <h4>What aspects would you like to comment on?</h4>
            <div class="category-checkboxes">
                <label class="category-checkbox">
                    <input type="checkbox" name="categories" value="search">
                    Property Search Experience
                </label>
                <label class="category-checkbox">
                    <input type="checkbox" name="categories" value="booking">
                    Booking Process
                </label>
                <label class="category-checkbox">
                    <input type="checkbox" name="categories" value="payment">
                    Payment System
                </label>
                <label class="category-checkbox">
                    <input type="checkbox" name="categories" value="communication">
                    Communication
                </label>
                <label class="category-checkbox">
                    <input type="checkbox" name="categories" value="support">
                    Customer Support
                </label>
                <label class="category-checkbox">
                    <input type="checkbox" name="categories" value="interface">
                    User Interface
                </label>
            </div>
        </div>

        <!-- Comments -->
        <div class="form-group">
            <label>Comments & Suggestions</label>
            <textarea id="feedbackComment" placeholder="Share your thoughts, suggestions, or report any issues..." class="form-textarea" required></textarea>
        </div>

        <!-- Feature Requests -->
        <div class="form-group">
            <label>Feature Requests (Optional)</label>
            <textarea placeholder="Any new features you'd like to see?" class="form-textarea"></textarea>
        </div>

        <!-- Contact Permission -->
        <div class="contact-permission">
            <label class="category-checkbox">
                <input type="checkbox" name="contact_permission">
                I'm open to being contacted for follow-up questions about my feedback
            </label>
        </div>

        <button type="submit" id="submitFeedbackBtn" class="btn btn-primary w-full" disabled>
            <i class="fas fa-paper-plane"></i>
            Submit Feedback
        </button>
    </form>
</div>

<!-- Previous Feedback -->
<div class="dashboard-section">
    <div class="section-header">
        <h3>Your Previous Feedback</h3>
    </div>

    <div class="feedback-history">
        <div class="feedback-item">
            <div class="feedback-header">
                <div class="feedback-rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span>5/5 stars</span>
                </div>
                <span class="feedback-date">January 15, 2024</span>
            </div>
            <div class="feedback-content">
                <p>"Great platform! The property search is very intuitive and the booking process was smooth. Love the payment tracking feature."</p>
            </div>
            <div class="feedback-status">
                <span class="status-badge approved">Reviewed</span>
            </div>
        </div>

        <div class="feedback-item">
            <div class="feedback-header">
                <div class="feedback-rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span>4/5 stars</span>
                </div>
                <span class="feedback-date">December 20, 2023</span>
            </div>
            <div class="feedback-content">
                <p>"The issue reporting system could be improved. It would be nice to have photo upload for maintenance requests."</p>
            </div>
            <div class="feedback-status">
                <span class="status-badge pending">Under Review</span>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>