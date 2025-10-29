<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Report an Issue</h2>
            <p>Report maintenance issues with your property</p>
        </div>
    </div>

    <!-- Success Message (Hidden by default) -->
    <div id="successMessage" class="dashboard-section text-center hidden">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3>Issue Reported Successfully!</h3>
        <p>Your issue has been reported and assigned ticket #<span id="ticketNumber">ISS-2024-001</span>. We'll notify you when it's updated.</p>
        <button onclick="reportAnother()" class="btn btn-primary">Report Another Issue</button>
    </div>

    <!-- Issue Form -->
    <div id="issueForm" class="dashboard-section">
        <div class="section-header">
            <h3>Issue Details</h3>
        </div>

        <form action="<?php echo URLROOT; ?>/tenant/report_issue" method="POST" enctype="multipart/form-data" class="issue-form">
            <div class="form-group">
                <label>Property</label>
                <select name="property_id" id="property" class="form-select" required>
                    <option value="">Select Property</option>
                    <?php foreach ($data['properties'] as $property): ?>
                        <option value="<?php echo $property->id; ?>"><?php echo htmlspecialchars($property->address); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Issue Title</label>
                <input type="text" name="title" id="title" placeholder="Brief title for the issue..." class="form-input" required>
            </div>

            <div class="form-group">
                <label>Issue Category</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <option value="Plumbing">Plumbing</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Heating/Cooling">Heating/Cooling</option>
                    <option value="Appliances">Appliances</option>
                    <option value="Locks/Security">Locks/Security</option>
                    <option value="Pest Control">Pest Control</option>
                    <option value="Maintenance">General Maintenance</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Priority Level</label>
                <select name="priority" id="priority" class="form-select" required>
                    <option value="low">Low - Can wait a few days</option>
                    <option value="medium" selected>Medium - Within 24-48 hours</option>
                    <option value="high">High - Urgent, needs immediate attention</option>
                    <option value="emergency">Emergency - Safety concern, immediate action required</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" id="issueStatus" class="form-select" required>
                    <option value="pending" selected>Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="resolved">Resolved</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="description" id="description" placeholder="Please describe the issue in detail..." class="form-textarea" required></textarea>
            </div>

            <button type="submit" id="submitBtn" class="btn btn-primary w-full">
                <i class="fas fa-paper-plane"></i> Report Issue
            </button>
        </form>
    </div>

    <!-- Recent Issues -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Recent Issues</h3>
            <a href="<?php echo URLROOT; ?>/tenant/track_issues" class="btn btn-secondary btn-sm">View All</a>
        </div>

        <div class="recent-issues">
            <?php if (!empty($data['recentIssues']) && count($data['recentIssues']) > 0): ?>
                <?php foreach ($data['recentIssues'] as $issue): ?>
                    <div class="issue-item">
                        <div class="issue-status">
                            <span class="status-badge <?php echo htmlspecialchars($issue->status); ?>">
                                <?php echo ucfirst(str_replace('_', ' ', htmlspecialchars($issue->status))); ?>
                            </span>
                        </div>

                        <div class="issue-details">
                            <h4><?php echo htmlspecialchars($issue->title ?? 'Untitled Issue'); ?></h4>
                            <p><?php echo htmlspecialchars(substr($issue->description ?? 'No description provided', 0, 100)) . (strlen($issue->description) > 100 ? '...' : ''); ?></p>
                            <span class="issue-date">Reported: <?php echo date("F d, Y", strtotime($issue->created_at)); ?></span>
                        </div>

                        <div class="issue-priority">
                            <span class="priority-badge <?php echo htmlspecialchars($issue->priority); ?>">
                                <?php echo ucfirst(htmlspecialchars($issue->priority)); ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-issues">
                    <p style="text-align: center; padding: 2rem; color: #6b7280;">No issues reported yet.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>