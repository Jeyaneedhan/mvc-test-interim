<?php
require_once '../app/helpers/helper.php'; // Include the helper file

class Tenant extends Controller
{
    private $issueModel;

    public function __construct()
    {
        // Check if user is logged in and is a tenant
        if (!isLoggedIn() || $_SESSION['user_type'] !== 'tenant') {
            redirect('users/login');
        }

        // Load the Issue model
        $this->issueModel = $this->model('Issue');
    }

    // Main dashboard page
    public function index()
    {
        $data = [
            'title' => 'Tenant Dashboard - TenantHub',
            'page' => 'dashboard',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_dashboard', $data);
    }

    // Report issue page (GET = show form, POST = save issue)
    // Report issue page (GET = show form, POST = save issue)
    public function report_issue()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'tenant_id' => $_SESSION['user_id'],
                'property_id' => trim($_POST['property_id']),
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'priority' => trim($_POST['priority']),
                'status' => trim($_POST['status'])
            ];

            if ($this->issueModel->addIssue($data)) {
                flash('issue_message', 'Issue reported successfully');
                redirect('tenant/track_issues');
            } else {
                die('Something went wrong when saving issue');
            }
        } else {
            // Load properties from database
            $properties = $this->issueModel->getProperties();

            // Get recent issues for this tenant (latest 2)
            $recentIssues = $this->issueModel->getRecentIssuesByTenant($_SESSION['user_id'], 2);

            $data = [
                'title' => 'Report Issues - TenantHub',
                'page' => 'report_issue',
                'user_name' => $_SESSION['user_name'],
                'properties' => $properties,
                'recentIssues' => $recentIssues
            ];

            $this->view('tenant/v_report_issue', $data);
        }
    }


    // Track issues page
    public function track_issues()
    {
        $issues = $this->issueModel->getIssuesByTenant($_SESSION['user_id']);

        // Calculate statistics
        $pending_issues = 0;
        $in_progress_issues = 0;
        $resolved_issues = 0;

        foreach ($issues as $issue) {
            switch ($issue->status) {
                case 'pending':
                    $pending_issues++;
                    break;
                case 'in_progress':
                    $in_progress_issues++;
                    break;
                case 'resolved':
                    $resolved_issues++;
                    break;
            }
        }

        $data = [
            'title' => 'Track Issues - TenantHub',
            'page' => 'track_issues',
            'user_name' => $_SESSION['user_name'],
            'issues' => $issues,
            'pending_issues' => $pending_issues,
            'in_progress_issues' => $in_progress_issues,
            'resolved_issues' => $resolved_issues
        ];

        $this->view('tenant/v_track_issues', $data);
    }
    public function edit_issue($id = null)
    {
        if (!$id) {
            redirect('tenant/track_issues');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'id' => $id,
                'property_id' => trim($_POST['property_id']),
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'category' => trim($_POST['category']),
                'priority' => trim($_POST['priority']),
                'status' => trim($_POST['status'])
            ];

            if ($this->issueModel->updateIssue($data)) {
                flash('issue_message', 'Issue updated successfully');
                redirect('tenant/track_issues');
            } else {
                die('Something went wrong when updating issue');
            }
        } else {
            // Get the issue by ID
            $issue = $this->issueModel->getIssueById($id);

            // Verify the issue belongs to this tenant
            if (!$issue || $issue->tenant_id != $_SESSION['user_id']) {
                redirect('tenant/track_issues');
            }

            // Load properties from database
            $properties = $this->issueModel->getProperties();

            $data = [
                'title' => 'Edit Issue - TenantHub',
                'page' => 'edit_issue',
                'user_name' => $_SESSION['user_name'],
                'issue' => $issue,
                'properties' => $properties
            ];

            $this->view('tenant/v_edit_issue', $data);
        }
    }

    // Delete issue
    public function delete_issue($id = null)
    {
        if (!$id) {
            redirect('tenant/track_issues');
        }

        // Get the issue by ID to verify ownership
        $issue = $this->issueModel->getIssueById($id);

        // Verify the issue belongs to this tenant
        if (!$issue || $issue->tenant_id != $_SESSION['user_id']) {
            flash('issue_message', 'Unauthorized action', 'alert alert-danger');
            redirect('tenant/track_issues');
        }

        // Check if issue was created within 1 minute
        $createdTime = new DateTime($issue->created_at);
        $currentTime = new DateTime();
        $timeDiff = $currentTime->getTimestamp() - $createdTime->getTimestamp();

        if ($timeDiff > 60) { // 60 seconds = 1 minute
            flash('issue_message', 'Issues can only be deleted within 1 minute of creation', 'alert alert-danger');
            redirect('tenant/track_issues');
        }

        // Delete the issue
        if ($this->issueModel->deleteIssue($id)) {
            flash('issue_message', 'Issue deleted successfully');
            redirect('tenant/track_issues');
        } else {
            flash('issue_message', 'Something went wrong. Unable to delete issue.', 'alert alert-danger');
            redirect('tenant/track_issues');
        }
    }

    // ---- KEEP YOUR OTHER PAGES UNCHANGED ----
    public function search_properties()
    {
        $data = [
            'title' => 'Search Properties - TenantHub',
            'page' => 'search_properties',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_search_properties', $data);
    }

    public function bookings()
    {
        $data = [
            'title' => 'My Bookings - TenantHub',
            'page' => 'bookings',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_bookings', $data);
    }

    public function pay_rent()
    {
        $data = [
            'title' => 'Pay Rent - TenantHub',
            'page' => 'pay_rent',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_pay_rent', $data);
    }

    public function agreements()
    {
        $data = [
            'title' => 'Lease Agreements - TenantHub',
            'page' => 'agreements',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_agreements', $data);
    }

    public function my_reviews()
    {
        $data = [
            'title' => 'My Reviews - TenantHub',
            'page' => 'my_reviews',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_my_reviews', $data);
    }

    public function notifications()
    {
        $data = [
            'title' => 'Notifications - TenantHub',
            'page' => 'notifications',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_notifications', $data);
    }

    public function feedback()
    {
        $data = [
            'title' => 'Feedback - TenantHub',
            'page' => 'feedback',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('tenant/v_feedback', $data);
    }
}
