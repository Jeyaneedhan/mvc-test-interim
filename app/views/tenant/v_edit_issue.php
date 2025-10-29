<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Edit Issue</h2>
            <p>Update your reported issue details</p>
        </div>
    </div>

    <!-- Edit Issue Form -->
    <div id="issueForm" class="dashboard-section">
        <div class="section-header">
            <h3>Issue Details</h3>
        </div>

        <form action="<?php echo URLROOT; ?>/tenant/edit_issue/<?php echo $data['issue']->id; ?>" method="POST" enctype="multipart/form-data" class="issue-form">
            <div class="form-group">
                <label>Property</label>
                <select name="property_id" id="property" class="form-select" required>
                    <option value="">Select Property</option>
                    <?php foreach ($data['properties'] as $property): ?>
                        <option value="<?php echo $property->id; ?>" <?php echo ($property->id == $data['issue']->property_id) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($property->address); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Issue Title</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($data['issue']->title); ?>" placeholder="Brief title for the issue..." class="form-input" required>
            </div>

            <div class="form-group">
                <label>Issue Category</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <option value="Plumbing" <?php echo ($data['issue']->category == 'Plumbing') ? 'selected' : ''; ?>>Plumbing</option>
                    <option value="Electrical" <?php echo ($data['issue']->category == 'Electrical') ? 'selected' : ''; ?>>Electrical</option>
                    <option value="Heating/Cooling" <?php echo ($data['issue']->category == 'Heating/Cooling') ? 'selected' : ''; ?>>Heating/Cooling</option>
                    <option value="Appliances" <?php echo ($data['issue']->category == 'Appliances') ? 'selected' : ''; ?>>Appliances</option>
                    <option value="Locks/Security" <?php echo ($data['issue']->category == 'Locks/Security') ? 'selected' : ''; ?>>Locks/Security</option>
                    <option value="Pest Control" <?php echo ($data['issue']->category == 'Pest Control') ? 'selected' : ''; ?>>Pest Control</option>
                    <option value="Maintenance" <?php echo ($data['issue']->category == 'Maintenance') ? 'selected' : ''; ?>>General Maintenance</option>
                    <option value="Other" <?php echo ($data['issue']->category == 'Other') ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Priority Level</label>
                <select name="priority" id="priority" class="form-select" required>
                    <option value="low" <?php echo ($data['issue']->priority == 'low') ? 'selected' : ''; ?>>Low - Can wait a few days</option>
                    <option value="medium" <?php echo ($data['issue']->priority == 'medium') ? 'selected' : ''; ?>>Medium - Within 24-48 hours</option>
                    <option value="high" <?php echo ($data['issue']->priority == 'high') ? 'selected' : ''; ?>>High - Urgent, needs immediate attention</option>
                    <option value="emergency" <?php echo ($data['issue']->priority == 'emergency') ? 'selected' : ''; ?>>Emergency - Safety concern, immediate action required</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" id="issueStatus" class="form-select" required>
                    <option value="pending" <?php echo ($data['issue']->status == 'pending') ? 'selected' : ''; ?>>Pending</option>
                    <option value="in_progress" <?php echo ($data['issue']->status == 'in_progress') ? 'selected' : ''; ?>>In Progress</option>
                    <option value="resolved" <?php echo ($data['issue']->status == 'resolved') ? 'selected' : ''; ?>>Resolved</option>
                    <option value="cancelled" <?php echo ($data['issue']->status == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </div>

            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="description" id="description" placeholder="Please describe the issue in detail..." class="form-textarea" required><?php echo htmlspecialchars($data['issue']->description); ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Issue
                </button>
                <a href="<?php echo URLROOT; ?>/tenant/track_issues" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>