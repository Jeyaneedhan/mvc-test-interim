<?php

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('M_Users');
    }

    // STEP 1: User type selection page (v_usertype.php)
    public function usertype()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // User selected a type, validate and redirect to step 2
            $user_type = trim($_POST['user_type']);

            if (!empty($user_type) && in_array($user_type, ['admin', 'property_manager', 'tenant', 'landlord'])) {
                // Store user type in session temporarily
                $_SESSION['selected_user_type'] = $user_type;

                // Redirect to PM-specific registration if property_manager
                if ($user_type === 'property_manager') {
                    redirect('users/register_pm');
                } else {
                    redirect('users/register');
                }
            } else {
                // Invalid user type, redirect back with error
                $data = ['user_type_err' => 'Please select a valid user type'];
                $this->view('users/v_usertype', $data);
            }
        } else {
            // Show user type selection page (Step 1)
            $data = ['user_type_err' => ''];
            $this->view('users/v_usertype', $data);
        }
    }

    // STEP 2: Regular Registration (for non-PM users)
    public function register()
    {
        // Check if user type is selected (must come from step 1)
        if (!isset($_SESSION['selected_user_type'])) {
            redirect('users/usertype');
            return;
        }

        // Redirect PM to their specific registration
        if ($_SESSION['selected_user_type'] === 'property_manager') {
            redirect('users/register_pm');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process registration form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Get user type from session
            $user_type = $_SESSION['selected_user_type'];

            // Input data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'user_type' => $user_type,
                'accept_terms' => isset($_POST['accept_terms']) ? 1 : 0,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'terms_err' => ''
            ];

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter a name';
            } elseif (strlen($data['name']) < 2) {
                $data['name_err'] = 'Name must be at least 2 characters';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter a valid email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already registered';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm the password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }

            // Validate terms acceptance
            if (!$data['accept_terms']) {
                $data['terms_err'] = 'You must accept the Terms and Conditions';
            }

            // Check if all validations passed
            if (
                empty($data['name_err']) && empty($data['email_err']) &&
                empty($data['password_err']) && empty($data['confirm_password_err']) &&
                empty($data['terms_err'])
            ) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register user
                if ($this->userModel->register($data)) {
                    unset($_SESSION['selected_user_type']);
                    flash('reg_flash', 'Registration successful! You can now login with your credentials.');
                    redirect('users/login');
                } else {
                    die('Something went wrong during registration');
                }
            } else {
                $this->view('users/v_register', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'user_type' => $_SESSION['selected_user_type'],
                'accept_terms' => 0,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'terms_err' => ''
            ];

            $this->view('users/v_register', $data);
        }
    }

    // STEP 2B: Property Manager Registration (with ID upload)
    public function register_pm()
    {
        // Check if user type is selected and is property_manager
        if (!isset($_SESSION['selected_user_type']) || $_SESSION['selected_user_type'] !== 'property_manager') {
            redirect('users/usertype');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process PM registration form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Input data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'user_type' => 'property_manager',
                'accept_terms' => isset($_POST['accept_terms']) ? 1 : 0,
                'employee_id_data' => null,
                'employee_id_filename' => '',
                'employee_id_filetype' => '',
                'employee_id_filesize' => 0,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'employee_id_err' => '',
                'terms_err' => ''
            ];

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter a name';
            } elseif (strlen($data['name']) < 2) {
                $data['name_err'] = 'Name must be at least 2 characters';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter a valid email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already registered';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm the password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }

            // Validate terms acceptance
            if (!$data['accept_terms']) {
                $data['terms_err'] = 'You must accept the Terms and Conditions';
            }

            // Handle file upload - store in database
            if (isset($_FILES['employee_id']) && $_FILES['employee_id']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['employee_id'];
                $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
                $max_size = 5 * 1024 * 1024; // 5MB

                if (!in_array($file['type'], $allowed_types)) {
                    $data['employee_id_err'] = 'Only JPG, PNG, and PDF files are allowed';
                } elseif ($file['size'] > $max_size) {
                    $data['employee_id_err'] = 'File size must not exceed 5MB';
                } else {
                    // Read file content into binary data
                    $data['employee_id_data'] = file_get_contents($file['tmp_name']);
                    $data['employee_id_filename'] = $file['name'];
                    $data['employee_id_filetype'] = $file['type'];
                    $data['employee_id_filesize'] = $file['size'];
                }
            } else {
                $data['employee_id_err'] = 'Please upload your employee ID card';
            }

            // Check if all validations passed
            if (
                empty($data['name_err']) && empty($data['email_err']) &&
                empty($data['password_err']) && empty($data['confirm_password_err']) &&
                empty($data['employee_id_err']) && empty($data['terms_err'])
            ) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register PM
                if ($this->userModel->registerPM($data)) {
                    unset($_SESSION['selected_user_type']);
                    flash('reg_flash', 'Registration successful! Your account is pending approval. You will be notified once verified.');
                    redirect('users/login');
                } else {
                    die('Something went wrong during registration');
                }
            } else {
                $this->view('users/v_register_pm', $data);
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'user_type' => 'property_manager',
                'accept_terms' => 0,
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'employee_id_err' => '',
                'terms_err' => ''
            ];

            $this->view('users/v_register_pm', $data);
        }
    }

    // User login
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter a valid email';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check if no errors
            if (empty($data['email_err']) && empty($data['password_err'])) {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $loggedUser = $this->userModel->login($data['email'], $data['password']);

                    // Handle different login scenarios
                    if ($loggedUser === 'pending') {
                        // Property Manager account is pending approval
                        $data['password_err'] = 'Your account is under review. You will be able to login within 24-48 hours after approval.';
                        $this->view('users/v_login', $data);
                    } elseif ($loggedUser === 'rejected') {
                        // Property Manager account was rejected
                        $data['password_err'] = 'Your account application has been rejected. Please contact admin for more information.';
                        $this->view('users/v_login', $data);
                    } elseif ($loggedUser) {
                        // Successful login
                        $this->createUserSession($loggedUser);
                        $this->redirectBasedOnUserType($loggedUser->user_type);
                    } else {
                        // Wrong password
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/v_login', $data);
                    }
                } else {
                    $data['email_err'] = 'No account found with that email';
                    $this->view('users/v_login', $data);
                }
            } else {
                $this->view('users/v_login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            $this->view('users/v_login', $data);
        }
    }

    // Redirect based on user type
    private function redirectBasedOnUserType($userType)
    {
        switch ($userType) {
            case 'admin':
                redirect('admin/index');
                break;
            case 'property_manager':
                redirect('manager/index');
                break;
            case 'tenant':
                redirect('tenant/index');
                break;
            case 'landlord':
                redirect('landlord/index');
                break;
            default:
                redirect('pages/index');
                break;
        }
    }

    // Create user session
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_type'] = $user->user_type;
    }

    // Logout
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);
        unset($_SESSION['selected_user_type']);

        session_destroy();
        redirect('users/login');
    }

    // Check if logged in
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    // View Profile
    public function profile()
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        // Get user data from database
        $user = $this->userModel->getUserById($_SESSION['user_id']);

        if (!$user) {
            flash('profile_message', 'User not found', 'alert alert-danger');
            redirect('pages/index');
        }

        $data = [
            'title' => 'Profile Settings - Rentigo',
            'user' => $user,
            'name' => $user->name,
            'email' => $user->email,
            'user_type' => $user->user_type,
            'created_at' => $user->created_at,
            'name_err' => '',
            'email_err' => '',
            'current_password_err' => '',
            'new_password_err' => '',
            'confirm_password_err' => ''
        ];

        $this->view('users/v_profile', $data);
    }

    // Update Profile
    public function updateProfile()
    {
        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Get user data
            $user = $this->userModel->getUserById($_SESSION['user_id']);

            $data = [
                'title' => 'Profile Settings - Rentigo',
                'user' => $user,
                'user_id' => $_SESSION['user_id'],
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'current_password' => trim($_POST['current_password']),
                'new_password' => trim($_POST['new_password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'user_type' => $user->user_type,
                'created_at' => $user->created_at,
                'name_err' => '',
                'email_err' => '',
                'current_password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter your name';
            } elseif (strlen($data['name']) < 2) {
                $data['name_err'] = 'Name must be at least 2 characters';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'Please enter a valid email';
            } else {
                // Check if email is already taken by another user
                if ($data['email'] !== $user->email) {
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }
            }

            // Validate password change (only if user wants to change password)
            if (!empty($data['current_password']) || !empty($data['new_password']) || !empty($data['confirm_password'])) {
                // Current password is required
                if (empty($data['current_password'])) {
                    $data['current_password_err'] = 'Please enter your current password';
                } else {
                    // Verify current password
                    if (!password_verify($data['current_password'], $user->password)) {
                        $data['current_password_err'] = 'Current password is incorrect';
                    }
                }

                // New password validation
                if (empty($data['new_password'])) {
                    $data['new_password_err'] = 'Please enter a new password';
                } elseif (strlen($data['new_password']) < 6) {
                    $data['new_password_err'] = 'Password must be at least 6 characters';
                }

                // Confirm password validation
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm your new password';
                } elseif ($data['new_password'] !== $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Check if there are no errors
            if (
                empty($data['name_err']) && empty($data['email_err']) &&
                empty($data['current_password_err']) && empty($data['new_password_err']) &&
                empty($data['confirm_password_err'])
            ) {

                // Update user profile
                $updateData = [
                    'id' => $data['user_id'],
                    'name' => $data['name'],
                    'email' => $data['email']
                ];

                // If password is being changed, hash it
                if (!empty($data['new_password'])) {
                    $updateData['password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                }

                if ($this->userModel->updateUser($updateData)) {
                    // Update session data
                    $_SESSION['user_name'] = $data['name'];
                    $_SESSION['user_email'] = $data['email'];

                    flash('profile_message', 'Profile updated successfully!', 'alert alert-success');
                    redirect('users/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/v_profile', $data);
            }
        } else {
            redirect('users/profile');
        }
    }

    // View employee ID document (for admins)
    public function viewEmployeeId($userId)
    {
        // Check if user is admin
        if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
            redirect('users/login');
            return;
        }

        // Get document from database
        $document = $this->userModel->getEmployeeIdDocument($userId);

        if ($document && $document->employee_id_document) {
            // Set appropriate headers
            header('Content-Type: ' . $document->employee_id_filetype);
            header('Content-Disposition: inline; filename="' . $document->employee_id_filename . '"');
            header('Content-Length: ' . strlen($document->employee_id_document));

            // Output the binary data
            echo $document->employee_id_document;
            exit;
        } else {
            die('Document not found');
        }
    }

    // Download employee ID document (for admins)
    public function downloadEmployeeId($userId)
    {
        // Check if user is admin
        if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
            redirect('users/login');
            return;
        }

        // Get document from database
        $document = $this->userModel->getEmployeeIdDocument($userId);

        if ($document && $document->employee_id_document) {
            // Set appropriate headers for download
            header('Content-Type: ' . $document->employee_id_filetype);
            header('Content-Disposition: attachment; filename="' . $document->employee_id_filename . '"');
            header('Content-Length: ' . strlen($document->employee_id_document));

            // Output the binary data
            echo $document->employee_id_document;
            exit;
        } else {
            die('Document not found');
        }
    }
}
