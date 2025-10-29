<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<!-- Page Header -->
<div class="page-header">
    <div class="header-left">
        <h1 class="page-title">Maintenance Requests</h1>
        <p class="page-subtitle">Manage property maintenance and repairs</p>
    </div>
    <div class="header-actions">
        <select class="form-control" id="statusFilter">
            <option value="">All Requests</option>
            <option value="pending">Pending</option>
            <option value="in-progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
        <button>
            <a href="<?php echo URLROOT; ?>/landlord/new_maintenance_request" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Request
            </a>
        </button>
    </div>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Pending Requests</h3>
            <div class="stat-value">8</div>
            <div class="stat-change">Awaiting action</div>
        </div>
    </div>
    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-tools"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">In Progress</h3>
            <div class="stat-value">3</div>
            <div class="stat-change">Being worked on</div>
        </div>
    </div>
    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Completed This Month</h3>
            <div class="stat-value">15</div>
            <div class="stat-change positive">+3 from last month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Average Response Time</h3>
            <div class="stat-value">2.4</div>
            <div class="stat-change">days</div>
        </div>
    </div>
</div>

<!-- Maintenance Requests -->
<div class="request-card urgent" data-status="pending" data-priority="urgent">
    <div class="request-header">
        <div>
            <h3 style="margin: 0; color: var(--text-primary);">Water Leak in Bathroom</h3>
            <p style="margin: 0.5rem 0 0 0; color: var(--text-secondary);">123 Main St, Apt 2A • Submitted 2 hours ago</p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <span class="priority-badge priority-urgent">URGENT</span>
            <span class="badge badge-warning">Pending</span>
        </div>
    </div>
    <div class="request-body">
        <p><strong>Tenant:</strong> Sarah Johnson</p>
        <p><strong>Description:</strong> There's a significant water leak coming from under the bathroom sink. Water is pooling on the floor and may cause damage to the unit below.</p>
        <p><strong>Contact:</strong> (555) 123-4567</p>
        <div style="margin-top: 1rem;">
            <button class="btn btn-primary btn-sm" onclick="assignContractor('REQ001')">
                <i class="fas fa-user-plus"></i> Assign Contractor
            </button>
            <button class="btn btn-warning btn-sm" onclick="scheduleVisit('REQ001')">
                <i class="fas fa-calendar"></i> Schedule Visit
            </button>
            <button class="btn btn-outline btn-sm" onclick="contactTenant('REQ001')">
                <i class="fas fa-phone"></i> Contact Tenant
            </button>
        </div>
    </div>
</div>

<div class="request-card high" data-status="in-progress" data-priority="high">
    <div class="request-header">
        <div>
            <h3 style="margin: 0; color: var(--text-primary);">Heating System Not Working</h3>
            <p style="margin: 0.5rem 0 0 0; color: var(--text-secondary);">456 Oak Ave • Submitted 1 day ago</p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <span class="priority-badge priority-high">HIGH</span>
            <span class="badge badge-info">In Progress</span>
        </div>
    </div>
    <div class="request-body">
        <p><strong>Tenant:</strong> Mike Davis</p>
        <p><strong>Description:</strong> The heating system stopped working yesterday evening. Temperature in the unit is dropping and it's getting uncomfortable.</p>
        <p><strong>Assigned to:</strong> ABC Heating Services</p>
        <p><strong>Scheduled:</strong> Tomorrow, 10:00 AM</p>
        <div style="margin-top: 1rem;">
            <button class="btn btn-success btn-sm" onclick="markComplete('REQ002')">
                <i class="fas fa-check"></i> Mark Complete
            </button>
            <button class="btn btn-outline btn-sm" onclick="updateStatus('REQ002')">
                <i class="fas fa-edit"></i> Update Status
            </button>
            <button class="btn btn-outline btn-sm" onclick="viewQuote('REQ002')">
                <i class="fas fa-file-invoice"></i> View Quote
            </button>
        </div>
    </div>
</div>

<div class="request-card" data-status="pending" data-priority="medium">
    <div class="request-header">
        <div>
            <h3 style="margin: 0; color: var(--text-primary);">Kitchen Faucet Dripping</h3>
            <p style="margin: 0.5rem 0 0 0; color: var(--text-secondary);">789 Pine St, Unit 5 • Submitted 3 days ago</p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <span class="priority-badge priority-medium">MEDIUM</span>
            <span class="badge badge-warning">Pending</span>
        </div>
    </div>
    <div class="request-body">
        <p><strong>Tenant:</strong> Lisa Chen</p>
        <p><strong>Description:</strong> Kitchen faucet has been dripping constantly. It's wasting water and the sound is annoying, especially at night.</p>
        <p><strong>Estimated Cost:</strong> Rs 25,500 - Rs 35,500</p>
        <div style="margin-top: 1rem;">
            <button class="btn btn-primary btn-sm" onclick="assignContractor('REQ003')">
                <i class="fas fa-user-plus"></i> Assign Contractor
            </button>
            <button class="btn btn-warning btn-sm" onclick="scheduleVisit('REQ003')">
                <i class="fas fa-calendar"></i> Schedule Visit
            </button>
            <button class="btn btn-outline btn-sm" onclick="getQuote('REQ003')">
                <i class="fas fa-calculator"></i> Get Quote
            </button>
        </div>
    </div>
</div>

<div class="request-card" data-status="completed" data-priority="low">
    <div class="request-header">
        <div>
            <h3 style="margin: 0; color: var(--text-primary);">Light Fixture Replacement</h3>
            <p style="margin: 0.5rem 0 0 0; color: var(--text-secondary);">321 Elm Dr, Apt 3B • Submitted 1 week ago</p>
        </div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <span class="priority-badge priority-low">LOW</span>
            <span class="badge badge-success">Completed</span>
        </div>
    </div>
    <div class="request-body">
        <p><strong>Tenant:</strong> Robert Wilson</p>
        <p><strong>Description:</strong> Dining room light fixture is outdated and one of the bulbs keeps burning out quickly.</p>
        <p><strong>Completed by:</strong> XYZ Electrical</p>
        <p><strong>Cost:</strong> Rs 25,500</p>
        <div style="margin-top: 1rem;">
            <button class="btn btn-outline btn-sm" onclick="viewInvoice('REQ004')">
                <i class="fas fa-file-invoice"></i> View Invoice
            </button>
            <button class="btn btn-outline btn-sm" onclick="getTenantFeedback('REQ004')">
                <i class="fas fa-star"></i> Tenant Feedback
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const statusFilter = document.getElementById('statusFilter');
        if (statusFilter) {
            statusFilter.addEventListener('change', function() {
                const selectedStatus = this.value.toLowerCase();
                const requestCards = document.querySelectorAll('.request-card');

                requestCards.forEach(card => {
                    if (selectedStatus === '') {
                        card.style.display = 'block';
                    } else {
                        const badge = card.querySelector('.badge');
                        const status = badge.textContent.toLowerCase();

                        if (status.includes(selectedStatus) ||
                            (selectedStatus === 'in-progress' && status.includes('progress'))) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        }
    });

    // Action functions
    function assignContractor(requestId) {
        showNotification(`Opening contractor assignment for ${requestId}`, 'info');
    }

    function scheduleVisit(requestId) {
        showNotification(`Scheduling visit for ${requestId}`, 'info');
    }

    function contactTenant(requestId) {
        showNotification(`Opening contact form for ${requestId}`, 'info');
    }

    function markComplete(requestId) {
        if (confirm('Mark this maintenance request as complete?')) {
            const card = document.querySelector(`[onclick*="${requestId}"]`).closest('.request-card');
            const badge = card.querySelector('.badge');
            badge.textContent = 'Completed';
            badge.className = 'badge badge-success';
            showNotification('Request marked as completed', 'success');
        }
    }

    function updateStatus(requestId) {
        showNotification(`Opening status update for ${requestId}`, 'info');
    }

    function viewQuote(requestId) {
        showNotification(`Opening quote for ${requestId}`, 'info');
    }

    function getQuote(requestId) {
        showNotification(`Requesting quote for ${requestId}`, 'info');
    }

    function viewInvoice(requestId) {
        showNotification(`Opening invoice for ${requestId}`, 'info');
    }

    function getTenantFeedback(requestId) {
        showNotification(`Opening tenant feedback for ${requestId}`, 'info');
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