<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<!-- Page Header -->
<div class="page-header">
    <div class="header-left">
        <h1 class="page-title">Tenant Feedback</h1>
        <p class="page-subtitle">View and manage tenant feedback and reviews</p>
    </div>
    <div class="header-actions">
        <button class="btn btn-primary" onclick="exportFeedback()">
            <i class="fas fa-download"></i> Export Report
        </button>
    </div>
</div>

<!-- Feedback Stats -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--primary-color);">
            <i class="fas fa-comments"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Total Feedback</h3>
            <div class="stat-value">156</div>
            <div class="stat-change">This month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--success-color);">
            <i class="fas fa-star"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Average Rating</h3>
            <div class="stat-value">4.2</div>
            <div class="stat-change positive">+0.3 from last month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--warning-color);">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Pending Response</h3>
            <div class="stat-value">12</div>
            <div class="stat-change">Awaiting reply</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background-color: var(--info-color);">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Satisfaction Rate</h3>
            <div class="stat-value">87%</div>
            <div class="stat-change positive">+5% from last month</div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="content-card">
    <div class="card-body" style="padding: 1rem 1.5rem;">
        <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
            <div class="search-box" style="flex: 1; min-width: 200px;">
                <input type="text" placeholder="Search feedback..." id="feedbackSearch" class="form-control">
            </div>
            <select id="propertyFilter" class="form-control" style="min-width: 150px;">
                <option value="">All Properties</option>
                <option value="sunset-apartments">Sunset Apartments</option>
                <option value="downtown-loft">Downtown Loft</option>
                <option value="garden-view">Garden View Condos</option>
            </select>
            <select id="ratingFilter" class="form-control" style="min-width: 120px;">
                <option value="">All Ratings</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
            <select id="statusFilter" class="form-control" style="min-width: 140px;">
                <option value="">All Status</option>
                <option value="responded">Responded</option>
                <option value="pending">Pending Response</option>
            </select>
            <input type="date" id="dateFilter" class="form-control" style="min-width: 140px;">
        </div>
    </div>
</div>

<!-- Feedback List -->
<div class="feedback-container">
    <div class="feedback-item" data-rating="5" data-property="sunset-apartments" data-status="responded">
        <div class="feedback-header">
            <div class="tenant-info">
                <div class="tenant-avatar" style="width: 48px; height: 48px; border-radius: 50%; background: var(--primary-color); color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">SJ</div>
                <div>
                    <h4>Sarah Johnson</h4>
                    <p>Sunset Apartments - Unit 204</p>
                </div>
            </div>
            <div class="feedback-meta">
                <div class="rating">
                    <span class="stars" style="color: #fbbf24;">★★★★★</span>
                    <span class="rating-number">5.0</span>
                </div>
                <span class="feedback-date">Jan 15, 2024</span>
            </div>
        </div>
        <div class="feedback-content">
            <p>"Excellent maintenance response time! The team fixed my heating issue within 24 hours. Very professional and courteous service."</p>
            <div class="feedback-tags">
                <span class="tag">Maintenance</span>
                <span class="tag">Response Time</span>
            </div>
        </div>
        <div class="feedback-actions">
            <span class="badge badge-success">Responded</span>
            <div style="display: flex; gap: 0.5rem;">
                <button class="btn btn-outline btn-sm" onclick="viewFeedbackDetails('FB001')">
                    <i class="fas fa-eye"></i> View Details
                </button>
                <button class="btn btn-primary btn-sm" onclick="respondToFeedback('FB001')">
                    <i class="fas fa-reply"></i> Add Response
                </button>
            </div>
        </div>
    </div>

    <div class="feedback-item" data-rating="3" data-property="downtown-loft" data-status="pending">
        <div class="feedback-header">
            <div class="tenant-info">
                <div class="tenant-avatar" style="width: 48px; height: 48px; border-radius: 50%; background: var(--secondary-color); color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">MC</div>
                <div>
                    <h4>Mike Chen</h4>
                    <p>Downtown Loft - Unit 12B</p>
                </div>
            </div>
            <div class="feedback-meta">
                <div class="rating">
                    <span class="stars" style="color: #fbbf24;">★★★☆☆</span>
                    <span class="rating-number">3.0</span>
                </div>
                <span class="feedback-date">Jan 12, 2024</span>
            </div>
        </div>
        <div class="feedback-content">
            <p>"The apartment is nice but the noise from upstairs neighbors is quite disturbing, especially during night hours. Would appreciate if this could be addressed."</p>
            <div class="feedback-tags">
                <span class="tag">Noise Complaint</span>
                <span class="tag">Neighbors</span>
            </div>
        </div>
        <div class="feedback-actions">
            <span class="badge badge-warning">Pending Response</span>
            <div style="display: flex; gap: 0.5rem;">
                <button class="btn btn-outline btn-sm" onclick="viewFeedbackDetails('FB002')">
                    <i class="fas fa-eye"></i> View Details
                </button>
                <button class="btn btn-primary btn-sm" onclick="respondToFeedback('FB002')">
                    <i class="fas fa-reply"></i> Respond
                </button>
            </div>
        </div>
    </div>

    <div class="feedback-item" data-rating="4" data-property="garden-view" data-status="responded">
        <div class="feedback-header">
            <div class="tenant-info">
                <div class="tenant-avatar" style="width: 48px; height: 48px; border-radius: 50%; background: var(--success-color); color: white; display: flex; align-items: center; justify-content: center; font-weight: 600;">LW</div>
                <div>
                    <h4>Lisa Wilson</h4>
                    <p>Garden View Condos - Unit 8A</p>
                </div>
            </div>
            <div class="feedback-meta">
                <div class="rating">
                    <span class="stars" style="color: #fbbf24;">★★★★☆</span>
                    <span class="rating-number">4.0</span>
                </div>
                <span class="feedback-date">Jan 10, 2024</span>
            </div>
        </div>
        <div class="feedback-content">
            <p>"Great location and amenities. The building is well-maintained and the management is responsive. Would love to see more parking spaces available."</p>
            <div class="feedback-tags">
                <span class="tag">Location</span>
                <span class="tag">Amenities</span>
                <span class="tag">Parking</span>
            </div>
        </div>
        <div class="feedback-actions">
            <span class="badge badge-success">Responded</span>
            <div style="display: flex; gap: 0.5rem;">
                <button class="btn btn-outline btn-sm" onclick="viewFeedbackDetails('FB003')">
                    <i class="fas fa-eye"></i> View Details
                </button>
                <button class="btn btn-outline btn-sm" onclick="viewResponse('FB003')">
                    <i class="fas fa-comments"></i> View Response
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize filter functionality
        initFilters();

        // Search functionality
        const searchInput = document.getElementById('feedbackSearch');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                filterFeedback();
            });
        }

        // Filter change events
        ['propertyFilter', 'ratingFilter', 'statusFilter', 'dateFilter'].forEach(filterId => {
            const filter = document.getElementById(filterId);
            if (filter) {
                filter.addEventListener('change', filterFeedback);
            }
        });
    });

    function initFilters() {
        // Initialize any filter-specific functionality here
    }

    function filterFeedback() {
        const searchTerm = document.getElementById('feedbackSearch').value.toLowerCase();
        const propertyFilter = document.getElementById('propertyFilter').value;
        const ratingFilter = document.getElementById('ratingFilter').value;
        const statusFilter = document.getElementById('statusFilter').value;
        const dateFilter = document.getElementById('dateFilter').value;

        const feedbackItems = document.querySelectorAll('.feedback-item');

        feedbackItems.forEach(item => {
            let show = true;

            // Search filter
            if (searchTerm) {
                const content = item.textContent.toLowerCase();
                if (!content.includes(searchTerm)) {
                    show = false;
                }
            }

            // Property filter
            if (propertyFilter && item.dataset.property !== propertyFilter) {
                show = false;
            }

            // Rating filter
            if (ratingFilter && item.dataset.rating !== ratingFilter) {
                show = false;
            }

            // Status filter
            if (statusFilter && item.dataset.status !== statusFilter) {
                show = false;
            }

            item.style.display = show ? 'block' : 'none';
        });
    }

    function exportFeedback() {
        showNotification('Exporting feedback report...', 'info');
    }

    function viewFeedbackDetails(feedbackId) {
        showNotification(`Opening details for feedback ${feedbackId}`, 'info');
    }

    function respondToFeedback(feedbackId) {
        showNotification(`Opening response form for feedback ${feedbackId}`, 'info');
    }

    function viewResponse(feedbackId) {
        showNotification(`Opening response for feedback ${feedbackId}`, 'info');
    }

    // Notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;

        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '1rem 1.5rem',
            borderRadius: '0.5rem',
            color: 'white',
            fontWeight: '500',
            zIndex: '9999',
            opacity: '0',
            transform: 'translateY(-20px)',
            transition: 'all 0.3s ease'
        });

        const colors = {
            success: '#10b981',
            warning: '#f59e0b',
            error: '#ef4444',
            info: '#3b82f6'
        };
        notification.style.backgroundColor = colors[type] || colors.info;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateY(0)';
        }, 100);

        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
</script>

<?php require APPROOT . '/views/inc/landlord_footer.php'; ?>