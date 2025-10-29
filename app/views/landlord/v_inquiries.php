<?php require APPROOT . '/views/inc/landlord_header.php'; ?>

<div class="page-header">
    <div class="header-left">
        <h1 class="page-title">Tenant Inquiries</h1>
        <p class="page-subtitle">Manage property inquiries and potential tenants</p>
    </div>
    <div class="header-actions">
        <select class="form-control" id="statusFilter">
            <option value="">All Inquiries</option>
            <option value="new">New</option>
            <option value="contacted">Contacted</option>
            <option value="scheduled">Scheduled</option>
            <option value="completed">Completed</option>
        </select>
    </div>
</div>

<!-- Stats -->
<div class="stats-grid">
    <div class="stat-card info">
        <div class="stat-icon">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">New Inquiries</h3>
            <div class="stat-value">5</div>
            <div class="stat-change">This week</div>
        </div>
    </div>
    <div class="stat-card warning">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Pending Response</h3>
            <div class="stat-value">3</div>
            <div class="stat-change">Awaiting reply</div>
        </div>
    </div>
    <div class="stat-card success">
        <div class="stat-icon">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Scheduled Viewings</h3>
            <div class="stat-value">7</div>
            <div class="stat-change">This month</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-percentage"></i>
        </div>
        <div class="stat-content">
            <h3 class="stat-label">Conversion Rate</h3>
            <div class="stat-value">65%</div>
            <div class="stat-change positive">+5% this month</div>
        </div>
    </div>
</div>

<!-- Inquiries List -->
<div class="inquiries-container">
    <div class="inquiry-card new">
        <div class="inquiry-header">
            <div class="inquiry-info">
                <h3>Sarah Johnson</h3>
                <p class="inquiry-property">Interested in: 123 Main St, Apt 2B</p>
                <p class="inquiry-date">Submitted 2 hours ago</p>
            </div>
            <div class="inquiry-status">
                <span class="badge badge-info">New</span>
                <span class="priority-badge priority-high">High Interest</span>
            </div>
        </div>
        <div class="inquiry-body">
            <div class="inquiry-details">
                <p><strong>Email:</strong> sarah.johnson@email.com</p>
                <p><strong>Phone:</strong> (555) 123-4567</p>
                <p><strong>Move-in Date:</strong> March 1, 2024</p>
                <p><strong>Budget:</strong> Rs 25,500 - Rs 35,500</p>
            </div>
            <div class="inquiry-message">
                <p><strong>Message:</strong> Hi, I'm very interested in the 2-bedroom apartment. I'm a working professional with excellent references. Could we schedule a viewing this week?</p>
            </div>
            <div class="inquiry-actions">
                <button class="btn btn-primary btn-sm">Reply</button>
                <button class="btn btn-success btn-sm">Schedule Viewing</button>
                <button class="btn btn-outline btn-sm">View Profile</button>
            </div>
        </div>
    </div>

    <div class="inquiry-card contacted">
        <div class="inquiry-header">
            <div class="inquiry-info">
                <h3>Mike Davis</h3>
                <p class="inquiry-property">Interested in: 456 Oak Avenue</p>
                <p class="inquiry-date">Submitted 1 day ago</p>
            </div>
            <div class="inquiry-status">
                <span class="badge badge-warning">Contacted</span>
                <span class="priority-badge priority-medium">Medium Interest</span>
            </div>
        </div>
        <div class="inquiry-body">
            <div class="inquiry-details">
                <p><strong>Email:</strong> mike.davis@email.com</p>
                <p><strong>Phone:</strong> (555) 987-6543</p>
                <p><strong>Move-in Date:</strong> April 15, 2024</p>
                <p><strong>Budget:</strong> Rs 25,500 - Rs 35,500</p>
            </div>
            <div class="inquiry-message">
                <p><strong>Message:</strong> Looking for a family home with a yard. Do you allow pets? We have a small dog.</p>
            </div>
            <div class="inquiry-actions">
                <button class="btn btn-success btn-sm">Schedule Viewing</button>
                <button class="btn btn-outline btn-sm">Send Follow-up</button>
                <button class="btn btn-outline btn-sm">View Conversation</button>
            </div>
        </div>
    </div>

    <div class="inquiry-card scheduled">
        <div class="inquiry-header">
            <div class="inquiry-info">
                <h3>Lisa Chen</h3>
                <p class="inquiry-property">Interested in: 789 Pine St, Unit 5</p>
                <p class="inquiry-date">Submitted 3 days ago</p>
            </div>
            <div class="inquiry-status">
                <span class="badge badge-success">Scheduled</span>
                <span class="priority-badge priority-high">High Interest</span>
            </div>
        </div>
        <div class="inquiry-body">
            <div class="inquiry-details">
                <p><strong>Email:</strong> lisa.chen@email.com</p>
                <p><strong>Phone:</strong> (555) 456-7890</p>
                <p><strong>Viewing:</strong> Tomorrow, 2:00 PM</p>
                <p><strong>Budget:</strong> Rs 25,500 - Rs 35,500</p>
            </div>
            <div class="inquiry-message">
                <p><strong>Message:</strong> I work from home and need a quiet space. Is the unit well-insulated for sound?</p>
            </div>
            <div class="inquiry-actions">
                <button class="btn btn-primary btn-sm">Confirm Viewing</button>
                <button class="btn btn-outline btn-sm">Reschedule</button>
                <button class="btn btn-outline btn-sm">Send Directions</button>
            </div>
        </div>
    </div>

    <div class="inquiry-card completed">
        <div class="inquiry-header">
            <div class="inquiry-info">
                <h3>Robert Wilson</h3>
                <p class="inquiry-property">Interested in: 321 Elm Dr, Apt 3B</p>
                <p class="inquiry-date">Submitted 1 week ago</p>
            </div>
            <div class="inquiry-status">
                <span class="badge badge-success">Completed</span>
                <span class="priority-badge priority-low">Application Submitted</span>
            </div>
        </div>
        <div class="inquiry-body">
            <div class="inquiry-details">
                <p><strong>Email:</strong> robert.wilson@email.com</p>
                <p><strong>Phone:</strong> (555) 321-0987</p>
                <p><strong>Status:</strong> Application under review</p>
                <p><strong>Budget:</strong> Rs 25,500 - Rs 35,500</p>
            </div>
            <div class="inquiry-message">
                <p><strong>Message:</strong> Viewed the apartment and loved it! Submitting application with references.</p>
            </div>
            <div class="inquiry-actions">
                <button class="btn btn-primary btn-sm">Review Application</button>
                <button class="btn btn-outline btn-sm">Contact References</button>
                <button class="btn btn-outline btn-sm">View Documents</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize filter functionality
        initFilter('#statusFilter', '.inquiry-card', '.badge');

        // Button click handlers
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                const action = this.textContent.trim();
                const inquiryCard = this.closest('.inquiry-card');
                const tenantName = inquiryCard.querySelector('h3').textContent;

                switch (action) {
                    case 'Reply':
                        showNotification(`Opening email to reply to ${tenantName}`, 'info');
                        break;
                    case 'Schedule Viewing':
                        showNotification(`Scheduling viewing for ${tenantName}`, 'success');
                        break;
                    case 'Confirm Viewing':
                        showNotification(`Viewing confirmed for ${tenantName}`, 'success');
                        break;
                    case 'Review Application':
                        showNotification(`Opening application for ${tenantName}`, 'info');
                        break;
                }
            });
        });
    });
</script>

<?php require APPROOT . '/views/inc/landlord_footer.php'; ?>