<?php
require_once '../app/helpers/helper.php';

class Manager extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('M_Users');
        // Check if user is logged in and is a property manager
        if (!isLoggedIn() || $_SESSION['user_type'] !== 'property_manager') {
            redirect('users/login');
        }
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Property Manager Dashboard',
            'page' => 'dashboard',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_dashboard', $data);
    }

    public function properties()
    {
        $data = [
            'title' => 'Property Management',
            'page' => 'properties',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_properties', $data);
    }

    public function tenants()
    {
        $data = [
            'title' => 'Tenant Management',
            'page' => 'tenants',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_tenants', $data);
    }

    public function maintenance()
    {
        $data = [
            'title' => 'Maintenance Management',
            'page' => 'maintenance',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_maintenance', $data);
    }


    // Instead of loading the view directly, just redirect to Inspection controller
    public function inspections()
    {
        redirect('inspection/index'); // ✅ route to inspection controller
    }

    public function issues()
    {
        // Load the Issue model
        $issueModel = $this->model('Issue');

        // Get all maintenance requests
        $allIssues = $issueModel->getAllIssues();

        // Calculate statistics by status
        $openIssues = array_filter($allIssues, fn($issue) => $issue->status === 'pending');
        $assignedIssues = array_filter($allIssues, fn($issue) => $issue->status === 'assigned');
        $inProgressIssues = array_filter($allIssues, fn($issue) => $issue->status === 'in_progress');
        $resolvedIssues = array_filter($allIssues, fn($issue) => $issue->status === 'resolved');

        $data = [
            'title' => 'Issue Tracking',
            'page' => 'issues',
            'user_name' => $_SESSION['user_name'],
            'allIssues' => $allIssues,
            'openIssues' => $openIssues,
            'assignedIssues' => $assignedIssues,
            'inProgressIssues' => $inProgressIssues,
            'resolvedIssues' => $resolvedIssues
        ];

        $this->view('manager/v_issues', $data);
    }

    public function leases()
    {
        $data = [
            'title' => 'Lease Agreements',
            'page' => 'leases',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_leases', $data);
    }

    public function providers()
    {
        $data = [
            'title' => 'Service Providers',
            'page' => 'providers',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_providers', $data);
    }
}
