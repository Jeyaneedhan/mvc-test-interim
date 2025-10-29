<?php
// Include helper functions
require_once '../app/helpers/helper.php';

class Admin extends Controller
{
    private $userModel;
    private $serviceProviderModel;


    public function __construct()
    {
        // Check if user is logged in and is an admin
        if (!isLoggedIn() || $_SESSION['user_type'] !== 'admin') {
            redirect('users/login');
        }

        // Initialize service provider model
        $this->userModel = $this->model('M_Users');
        $this->serviceProviderModel = $this->model('M_ServiceProviders');
    }

    // Main dashboard page
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard - Rentigo',
            'page' => 'dashboard'
        ];

        $this->view('admin/v_dashboard', $data);
    }

    // Properties management page
    public function properties()
    {
        $data = [
            'title' => 'Properties - Rentigo Admin',
            'page' => 'properties'
        ];

        $this->view('admin/v_properties', $data);
    }

    // Property managers page
    public function managers()
    {
        // Fetch ALL property managers (not just pending)
        $allManagers = $this->userModel->getAllPropertyManagers();

        $data = [
            'title' => 'Property Managers - Rentigo Admin',
            'page' => 'managers',
            'allManagers' => $allManagers
        ];

        $this->view('admin/v_managers', $data);
    }

    // Documents management page
    public function documents()
    {
        $data = [
            'title' => 'Documents - Rentigo Admin',
            'page' => 'documents'
        ];

        $this->view('admin/v_documents', $data);
    }

    // Financial management page
    public function financials()
    {
        $data = [
            'title' => 'Financials - Rentigo Admin',
            'page' => 'financials'
        ];

        $this->view('admin/v_financials', $data);
    }

    // Service providers page - READ operation
    public function providers()
    {
        // Handle search/filter if provided
        $searchTerm = $_GET['search'] ?? '';
        $specialty = $_GET['specialty'] ?? '';
        $status = $_GET['status'] ?? '';

        if (!empty($searchTerm) || !empty($specialty) || !empty($status)) {
            $providers = $this->serviceProviderModel->searchProviders($searchTerm, $specialty, $status);
        } else {
            $providers = $this->serviceProviderModel->getAllProviders();
        }

        // Get provider counts for stats
        $counts = $this->serviceProviderModel->getProviderCounts();

        $data = [
            'title' => 'Service Providers - Rentigo Admin',
            'page' => 'providers',
            'providers' => $providers,
            'counts' => $counts,
            'search' => $searchTerm,
            'specialty_filter' => $specialty,
            'status_filter' => $status
        ];

        $this->view('admin/v_providers', $data);
    }

    // CREATE - Add new service provider
    public function addProvider()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'name' => trim($_POST['name']),
                'company' => trim($_POST['company']),
                'specialty' => $_POST['specialty'],
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'address' => trim($_POST['address']),
                'rating' => $_POST['rating'] ?? 0.0,
                'status' => $_POST['status'] ?? 'active'
            ];

            // Basic validation
            if (empty($data['name']) || empty($data['specialty'])) {
                // Handle validation error
                $data['error'] = 'Name and specialty are required';
                $data['title'] = 'Add Service Provider - Rentigo Admin';
                $data['page'] = 'providers';
                $this->view('admin/v_add_provider', $data);
                return;
            }

            // Create provider
            if ($this->serviceProviderModel->create($data)) {
                flash('provider_message', 'Service provider added successfully!');
                redirect('admin/providers');
            } else {
                $data['error'] = 'Something went wrong. Please try again.';
                $data['title'] = 'Add Service Provider - Rentigo Admin';
                $data['page'] = 'providers';
                $this->view('admin/v_add_provider', $data);
            }
        } else {
            // Show add provider form
            $data = [
                'title' => 'Add Service Provider - Rentigo Admin',
                'page' => 'providers',
                'name' => '',
                'company' => '',
                'specialty' => '',
                'phone' => '',
                'email' => '',
                'address' => '',
                'rating' => 0.0,
                'status' => 'active'
            ];
            $this->view('admin/v_add_provider', $data);
        }
    }

    // UPDATE - Edit service provider
    public function editProvider($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'company' => trim($_POST['company']),
                'specialty' => $_POST['specialty'],
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'address' => trim($_POST['address']),
                'rating' => $_POST['rating'] ?? 0.0,
                'status' => $_POST['status'] ?? 'active'
            ];

            // Basic validation
            if (empty($data['name']) || empty($data['specialty'])) {
                $data['error'] = 'Name and specialty are required';
                $data['provider'] = $this->serviceProviderModel->getProviderById($id);
                $data['title'] = 'Edit Service Provider - Rentigo Admin';
                $data['page'] = 'providers';
                $this->view('admin/v_edit_provider', $data);
                return;
            }

            // Update provider
            if ($this->serviceProviderModel->update($data)) {
                flash('provider_message', 'Service provider updated successfully!');
                redirect('admin/providers');
            } else {
                $data['error'] = 'Something went wrong. Please try again.';
                $data['provider'] = $this->serviceProviderModel->getProviderById($id);
                $data['title'] = 'Edit Service Provider - Rentigo Admin';
                $data['page'] = 'providers';
                $this->view('admin/v_edit_provider', $data);
            }
        } else {
            // Show edit form
            $provider = $this->serviceProviderModel->getProviderById($id);

            if (!$provider) {
                flash('provider_message', 'Service provider not found!');
                redirect('admin/providers');
            }

            $data = [
                'title' => 'Edit Service Provider - Rentigo Admin',
                'page' => 'providers',
                'provider' => $provider
            ];
            $this->view('admin/v_edit_provider', $data);
        }
    }

    // DELETE - Remove service provider
    public function deleteProvider($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Set proper headers for JSON response
            header('Content-Type: application/json');

            if ($this->serviceProviderModel->delete($id)) {
                echo json_encode(['success' => true, 'message' => 'Provider deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete provider']);
            }
            exit();
        } else {
            redirect('admin/providers');
        }
    }

    // UPDATE STATUS - Change provider status
    public function updateProviderStatus($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Set proper headers for JSON response
            header('Content-Type: application/json');

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $status = $_POST['status'] ?? '';

            if ($this->serviceProviderModel->updateStatus($id, $status)) {
                echo json_encode(['success' => true, 'message' => 'Status updated successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update status']);
            }
            exit();
        } else {
            redirect('admin/providers');
        }
    }

    // Policies management page
    public function policies()
    {
        $data = [
            'title' => 'Policies - Rentigo Admin',
            'page' => 'policies'
        ];

        $this->view('admin/v_policies', $data);
    }

    // Notifications page
    public function notifications()
    {
        $data = [
            'title' => 'Notifications - Rentigo Admin',
            'page' => 'notifications'
        ];

        $this->view('admin/v_notifications', $data);
    }

    // Property Manager approvals page
    public function pm_approvals()
    {
        // Get pending Property Managers
        $pendingPMs = $this->userModel->getPendingPMs();

        $data = [
            'title' => 'PM Approvals - Rentigo Admin',
            'page' => 'pm_approvals',
            'pending_pms' => $pendingPMs
        ];

        $this->view('admin/v_pm_approvals', $data);
    }

    // Approve Property Manager
    public function approvePM($userId)
    {
        // Enable error reporting for debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // IMPORTANT: Set JSON header FIRST before any output
            header('Content-Type: application/json');

            // Log the request
            error_log("ApprovePM called with userId: " . $userId);

            // Check authorization
            if (!isLoggedIn()) {
                error_log("User not logged in");
                echo json_encode([
                    'success' => false,
                    'message' => 'You are not logged in'
                ]);
                exit();
            }

            if ($_SESSION['user_type'] !== 'admin') {
                error_log("User is not admin: " . $_SESSION['user_type']);
                echo json_encode([
                    'success' => false,
                    'message' => 'Unauthorized access. Admin role required.'
                ]);
                exit();
            }

            error_log("Attempting to approve PM with ID: " . $userId);

            // Attempt to approve the manager
            try {
                $result = $this->userModel->approvePM($userId);
                error_log("ApprovePM result: " . ($result ? 'true' : 'false'));

                if ($result) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Property Manager approved successfully'
                    ]);
                } else {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Failed to approve Property Manager. Database update returned false.'
                    ]);
                }
            } catch (Exception $e) {
                error_log("Exception in approvePM: " . $e->getMessage());
                echo json_encode([
                    'success' => false,
                    'message' => 'Error: ' . $e->getMessage()
                ]);
            }
            exit();
        } else {
            redirect('admin/managers');
        }
    }
    // Remove Property Manager
    public function removePropertyManager($userId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            // Check authorization
            if (!isLoggedIn()) {
                echo json_encode([
                    'success' => false,
                    'message' => 'You are not logged in'
                ]);
                exit();
            }

            if ($_SESSION['user_type'] !== 'admin') {
                echo json_encode([
                    'success' => false,
                    'message' => 'Unauthorized access. Admin role required.'
                ]);
                exit();
            }

            // Remove the PM (deletes from users, FK cascade deletes from property_manager) // ← ADDED COMMENT
            if ($this->userModel->removePropertyManager($userId)) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Property Manager removed successfully'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to remove Property Manager'
                ]);
            }
            exit();
        } else {
            redirect('admin/managers');
        }
    }

    // Reject Property Manager
    public function rejectPM($userId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Set proper headers for JSON response
            header('Content-Type: application/json');

            // Check authorization
            if (!isLoggedIn() || $_SESSION['user_type'] !== 'admin') {
                echo json_encode([
                    'success' => false,
                    'message' => 'Unauthorized access'
                ]);
                exit();
            }

            // Get admin ID from session
            $adminId = $_SESSION['user_id'];

            if ($this->userModel->rejectPM($userId, $adminId)) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Property Manager application rejected'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to reject application'
                ]);
            }
            exit();
        } else {
            redirect('admin/managers');
        }
    }
}
