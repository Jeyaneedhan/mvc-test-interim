<?php require APPROOT . '/views/inc/manager_header.php'; ?>

<div class="edit-inspection-content">
    <div class="page-header">
        <div class="header-left">
            <h1 class="page-title">Edit Inspection</h1>
            <p class="page-subtitle">Update the details of the inspection</p>
        </div>
    </div>

    <div class="form-container">
        <form action="<?php echo URLROOT; ?>/inspection/edit/<?php echo $data['inspection']->id; ?>" method="post" class="inspection-form">

            <div class="form-group">
                <label for="property_id">Property <span style="color:red;">*</span></label>
                <select id="property_id" name="property_id" class="form-control" required>
                    <option value="">-- Select Property with Issues --</option>
                    <?php
                    // Fetch properties with issues for edit form
                    $M_Inspection = new M_Inspection();
                    $properties = $M_Inspection->getPropertiesWithIssues();

                    if (!empty($properties)):
                        foreach ($properties as $property):
                            // Check if this property matches the current inspection's property
                            $selected = (trim($property->address) === trim($data['inspection']->property)) ? 'selected' : '';
                    ?>
                            <option value="<?php echo $property->id; ?>" <?php echo $selected; ?>>
                                <?php echo htmlspecialchars($property->address); ?>
                                (<?php echo $property->issue_count; ?> issue<?php echo $property->issue_count > 1 ? 's' : ''; ?>)
                            </option>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </select>
                <small class="form-text text-muted">Current: <?php echo htmlspecialchars($data['inspection']->property); ?></small>
            </div>

            <div class="form-group">
                <label for="issue_id">Issue <span style="color:red;">*</span></label>
                <select id="issue_id" name="issue_id" class="form-control" required>
                    <option value="<?php echo $data['inspection']->issues; ?>" selected>
                        Current Issue ID: <?php echo $data['inspection']->issues; ?>
                    </option>
                </select>
                <small class="form-text text-muted" id="issue-helper">Change property to see other issues</small>
                <div id="issue-loader" style="display: none; margin-top: 10px;">
                    <i class="fas fa-spinner fa-spin"></i> Loading issues...
                </div>
            </div>

            <div class="form-group">
                <label for="type">Inspection Type <span style="color:red;">*</span></label>
                <select id="type" name="type" class="form-control" required>
                    <option value="Issue" <?php echo $data['inspection']->type == 'Issue' ? 'selected' : ''; ?>>Issue</option>
                    <option value="Maintenance" <?php echo $data['inspection']->type == 'Maintenance' ? 'selected' : ''; ?>>Maintenance</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Scheduled Date <span style="color:red;">*</span></label>
                <input type="date" id="date" name="date" class="form-control" value="<?php echo $data['inspection']->scheduled_date; ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status <span style="color:red;">*</span></label>
                <select id="status" name="status" class="form-control" required>
                    <option value="scheduled" <?php echo $data['inspection']->status == 'scheduled' ? 'selected' : ''; ?>>Scheduled</option>
                    <option value="in-progress" <?php echo $data['inspection']->status == 'in-progress' ? 'selected' : ''; ?>>In Progress</option>
                    <option value="completed" <?php echo $data['inspection']->status == 'completed' ? 'selected' : ''; ?>>Completed</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Inspection</button>
                <a href="<?php echo URLROOT; ?>/inspection/index" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const propertySelect = document.getElementById('property_id');
        const issueSelect = document.getElementById('issue_id');
        const issueLoader = document.getElementById('issue-loader');
        const issueHelper = document.getElementById('issue-helper');

        // Store the original issue ID
        const originalIssueId = <?php echo $data['inspection']->issues; ?>;
        let currentPropertyId = propertySelect.value;

        propertySelect.addEventListener('change', function() {
            const propertyId = this.value;

            if (!propertyId) {
                issueSelect.innerHTML = '<option value="' + originalIssueId + '" selected>Current Issue ID: ' + originalIssueId + '</option>';
                issueHelper.textContent = 'Select a property to see available issues';
                return;
            }

            // Show loader
            issueLoader.style.display = 'block';
            issueSelect.disabled = true;
            issueSelect.innerHTML = '<option value="">Loading...</option>';
            issueHelper.textContent = 'Loading issues...';

            // Fetch issues via AJAX
            fetch('<?php echo URLROOT; ?>/inspection/getIssuesByProperty/' + propertyId)
                .then(response => response.json())
                .then(data => {
                    issueLoader.style.display = 'none';

                    if (data.success && data.issues.length > 0) {
                        issueSelect.innerHTML = '<option value="">-- Select an Issue --</option>';

                        data.issues.forEach(issue => {
                            const option = document.createElement('option');
                            option.value = issue.id;

                            // Select the current issue if it's in the list
                            if (issue.id == originalIssueId) {
                                option.selected = true;
                            }

                            // Format the option text with issue details
                            let priorityBadge = '';
                            switch (issue.priority) {
                                case 'emergency':
                                    priorityBadge = '🔴 Emergency';
                                    break;
                                case 'high':
                                    priorityBadge = '🟠 High';
                                    break;
                                case 'medium':
                                    priorityBadge = '🟡 Medium';
                                    break;
                                case 'low':
                                    priorityBadge = '🟢 Low';
                                    break;
                            }

                            option.textContent = `${issue.title} - ${issue.category} [${priorityBadge}] - ${issue.status}`;
                            option.title = `${issue.description} | Reported by: ${issue.tenant_name || 'N/A'}`;

                            issueSelect.appendChild(option);
                        });

                        issueSelect.disabled = false;
                        issueHelper.textContent = `${data.issues.length} issue(s) found. Select one to inspect.`;
                        issueHelper.style.color = '#28a745';
                    } else {
                        issueSelect.innerHTML = '<option value="">No issues found for this property</option>';
                        issueHelper.textContent = 'No pending issues found for this property';
                        issueHelper.style.color = '#6c757d';
                    }
                })
                .catch(error => {
                    console.error('Error fetching issues:', error);
                    issueLoader.style.display = 'none';
                    issueSelect.innerHTML = '<option value="' + originalIssueId + '" selected>Current Issue ID: ' + originalIssueId + ' (Error loading)</option>';
                    issueHelper.textContent = 'Error loading issues. Please try again.';
                    issueHelper.style.color = '#dc3545';
                });
        });

        // Load issues for the currently selected property on page load
        if (currentPropertyId) {
            propertySelect.dispatchEvent(new Event('change'));
        }
    });
</script>

<style>
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        font-size: 1rem;
    }

    .form-control:disabled {
        background-color: #e9ecef;
        opacity: 0.6;
        cursor: not-allowed;
    }

    .form-text {
        display: block;
        margin-top: 0.25rem;
        font-size: 0.875rem;
        color: #6c757d;
    }

    label span {
        color: #dc3545;
    }

    #issue_id option {
        padding: 0.5rem;
    }

    #issue-loader {
        color: #007bff;
        font-size: 0.9rem;
    }
</style>

<?php require APPROOT . '/views/inc/manager_footer.php'; ?>