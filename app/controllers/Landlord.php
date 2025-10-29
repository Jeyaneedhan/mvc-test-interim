<?php
require_once '../app/helpers/helper.php';

class Landlord extends Controller
{
    private $userModel;
    private $propertyModel;
    private $maintenanceModel;
    private $rentOptimizer;

    public function __construct()
    {
        // Check if user is logged in and is a landlord
        if (!isLoggedIn() || $_SESSION['user_type'] !== 'landlord') {
            redirect('users/login');
        }

        // Initialize models
        $this->userModel = $this->model('M_Users');
        $this->propertyModel = $this->model('M_Properties');
        $this->rentOptimizer = $this->model('M_RentOptimizer');
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Landlord Dashboard',
            'page' => 'dashboard',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('landlord/v_dashboard', $data);
    }

    public function properties()
    {
        $properties = $this->propertyModel->getPropertiesByLandlord($_SESSION['user_id']);

        // Add property images and documents to each property
        if ($properties) {
            foreach ($properties as $property) {
                $property->images = $this->getPropertyImages($property->id);
                $property->documents = $this->getPropertyDocuments($property->id);
                $property->primary_image = $this->getPrimaryPropertyImage($property->id);
            }
        }

        $data = [
            'properties' => $properties,
            'page' => 'properties'
        ];
        $this->view('landlord/v_properties', $data);
    }

    public function add_property()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check for upload errors first
            $uploadError = $this->checkUploadLimits();
            if ($uploadError) {
                flash('property_message', $uploadError, 'alert alert-danger');
                redirect('landlord/add_property');
                return;
            }

            // Check if POST data is available
            if (empty($_POST)) {
                flash('property_message', 'Form data was not received. This might be due to file size limits.', 'alert alert-danger');
                redirect('landlord/add_property');
                return;
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Get listing type (rent or maintenance)
            $listingType = $_POST['listing_type'] ?? 'rent';

            if ($listingType === 'maintenance') {
                // Handle maintenance property
                $data = $this->processMaintenanceProperty($_POST);
            } else {
                // Handle rental property (existing code)
                $data = $this->processRentalProperty($_POST);
            }

            // Check for validation errors
            if (isset($data['errors']) && !empty($data['errors'])) {
                flash('property_message', implode(', ', $data['errors']), 'alert alert-danger');
                redirect('landlord/add_property');
                return;
            }

            // Add property first and get the ID
            $propertyId = $this->propertyModel->addPropertyAndReturnId($data);

            if ($propertyId) {
                // Handle image uploads
                $imageUploadResult = $this->handleImageUploads($propertyId);

                // Handle document uploads
                $documentUploadResult = $this->handleDocumentUploads($propertyId);

                // Prepare success message
                $messages = [];
                if ($imageUploadResult['success'] && $imageUploadResult['count'] > 0) {
                    $messages[] = $imageUploadResult['count'] . ' images uploaded';
                }
                if ($documentUploadResult['success'] && $documentUploadResult['count'] > 0) {
                    $messages[] = $documentUploadResult['count'] . ' documents uploaded';
                }

                $propertyTypeText = $listingType === 'maintenance' ? 'Maintenance property' : 'Rental property';

                if (!empty($messages)) {
                    flash('property_message', $propertyTypeText . ' added successfully with ' . implode(' and ', $messages), 'alert alert-success');
                } else {
                    flash('property_message', $propertyTypeText . ' added successfully', 'alert alert-success');
                }

                // Check for any upload errors
                $warnings = [];
                if (!$imageUploadResult['success']) {
                    $warnings[] = 'Image upload failed: ' . $imageUploadResult['message'];
                }
                if (!$documentUploadResult['success']) {
                    $warnings[] = 'Document upload failed: ' . $documentUploadResult['message'];
                }

                if (!empty($warnings)) {
                    flash('property_warning', implode('. ', $warnings), 'alert alert-warning');
                }

                redirect('landlord/properties');
            } else {
                flash('property_message', 'Failed to add property. Please check all fields and try again.', 'alert alert-danger');
                redirect('landlord/add_property');
            }
        } else {
            // Get PHP upload limits for display
            $maxFileSize = $this->getMaxFileSize();
            $maxPostSize = $this->getMaxPostSize();

            // Initialize empty data for the form
            $data = [
                'title' => 'Add Property',
                'max_file_size' => $maxFileSize,
                'max_post_size' => $maxPostSize,
                'address' => '',
                'type' => '',
                'bedrooms' => '',
                'bathrooms' => '',
                'sqft' => '',
                'rent' => '',
                'deposit' => '',
                'available_date' => '',
                'parking' => '0',
                'pets' => 'no',
                'laundry' => 'none',
                'description' => '',
                'address_err' => '',
                'type_err' => '',
                'bedrooms_err' => '',
                'bathrooms_err' => '',
                'rent_err' => ''
            ];

            $this->view('landlord/v_add_property', $data);
        }
    }

    /**
     * Process rental property data
     */
    private function processRentalProperty($postData)
    {
        // Map pet policy and laundry values to match database ENUM
        $petOptions = ['no', 'cats', 'dogs', 'both'];
        $laundryOptions = ['none', 'shared', 'hookups', 'in_unit', 'included'];

        $data = [
            'landlord_id'   => $_SESSION['user_id'],
            'address'       => trim($postData['address'] ?? ''),
            'property_type' => trim($postData['type'] ?? ''),
            'bedrooms'      => (int)($postData['bedrooms'] ?? 0),
            'bathrooms'     => (float)($postData['bathrooms'] ?? 0),
            'sqft'          => !empty($postData['sqft']) ? (int)$postData['sqft'] : null,
            'rent'          => (float)($postData['rent'] ?? 0),
            'deposit'       => !empty($postData['deposit']) ? (float)$postData['deposit'] : null,
            'available_date' => !empty($postData['available_date']) ? $postData['available_date'] : null,
            'parking'       => isset($postData['parking']) && is_numeric($postData['parking']) ? (int)$postData['parking'] : 0,
            'pet_policy'    => in_array($postData['pets'] ?? '', $petOptions) ? $postData['pets'] : 'no',
            'laundry'       => in_array($postData['laundry'] ?? '', $laundryOptions) ? $postData['laundry'] : 'none',
            'description'   => trim($postData['description'] ?? ''),
            'status'        => 'vacant',
            'listing_type'  => 'rent'
        ];

        // Validate property data
        $errors = $this->validatePropertyData($data);
        if (!empty($errors)) {
            $data['errors'] = $errors;
        }

        return $data;
    }

    /**
     * Process maintenance property data
     */
    private function processMaintenanceProperty($postData)
    {
        $data = [
            'landlord_id'   => $_SESSION['user_id'],
            'address'       => trim($postData['address'] ?? ''),
            'property_type' => trim($postData['type'] ?? ''),
            'bedrooms'      => (int)($postData['bedrooms'] ?? 0),
            'bathrooms'     => (float)($postData['bathrooms'] ?? 1),
            'sqft'          => !empty($postData['sqft']) ? (int)$postData['sqft'] : null,
            'rent'          => 0, // No rent for maintenance properties
            'deposit'       => null,
            'available_date' => null,
            'parking'       => 0,
            'pet_policy'    => 'no',
            'laundry'       => 'none',
            'description'   => trim($postData['description'] ?? ''),
            'status'        => 'maintenance',
            'listing_type'  => 'maintenance',
            'current_occupant' => trim($postData['current_occupant'] ?? '')
        ];

        // Validate maintenance property data (simplified)
        $errors = [];
        if (empty($data['address'])) {
            $errors[] = 'Property address is required';
        }
        if (empty($data['property_type'])) {
            $errors[] = 'Property type is required';
        }

        if (!empty($errors)) {
            $data['errors'] = $errors;
        }

        return $data;
    }

    // NEW METHOD: Enhanced validation for property data
    private function validatePropertyData($data)
    {
        $errors = [];

        // Required field validation
        if (empty($data['address'])) {
            $errors[] = 'Property address is required';
        }

        if (empty($data['property_type'])) {
            $errors[] = 'Property type is required';
        }

        if ($data['bedrooms'] < 0) {
            $errors[] = 'Number of bedrooms cannot be negative';
        }

        if ($data['bathrooms'] <= 0) {
            $errors[] = 'Number of bathrooms is required and must be greater than 0';
        }

        // Only validate rent for rental properties
        if ($data['listing_type'] === 'rent') {
            // Enhanced rent validation
            if ($data['rent'] <= 0) {
                $errors[] = 'Monthly rent is required and must be greater than 0';
            } elseif ($data['rent'] < 1000) {
                $errors[] = 'Monthly rent must be at least Rs 1,000';
            } elseif ($data['rent'] > 10000000) {
                $errors[] = 'Monthly rent cannot exceed Rs 10,000,000';
            }
        }

        // NEW: Square footage validation
        if ($data['sqft'] !== null) {
            if ($data['sqft'] < 1) {
                $errors[] = 'Square footage must be at least 1 sq ft';
            } elseif ($data['sqft'] > 50000) {
                $errors[] = 'Square footage cannot exceed 50,000 sq ft';
            }
        }

        // NEW: Security deposit validation
        if ($data['deposit'] !== null) {
            if ($data['deposit'] < 0) {
                $errors[] = 'Security deposit cannot be negative';
            } elseif ($data['deposit'] > 10000000) {
                $errors[] = 'Security deposit cannot exceed Rs 10,000,000';
            }
        }

        // Additional logical validation
        if ($data['deposit'] !== null && $data['rent'] > 0) {
            // Warn if deposit is more than 6 months rent (unusual but not error)
            if ($data['deposit'] > ($data['rent'] * 6)) {
                // This could be a warning, but we'll allow it
                error_log("Warning: Security deposit (" . $data['deposit'] . ") is more than 6 months rent (" . $data['rent'] . ") for property");
            }
        }

        return $errors;
    }

    // NEW METHOD: Check upload limits and errors
    private function checkUploadLimits()
    {
        // Check if POST data exceeded the limit
        if (empty($_POST) && empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0) {
            $maxPostSize = $this->getMaxPostSize();
            $contentLength = $_SERVER['CONTENT_LENGTH'];
            return "Upload failed: Total data size (" . $this->formatBytes($contentLength) . ") exceeds server limit (" . $this->formatBytes($maxPostSize) . "). Please reduce image file sizes or upload fewer images.";
        }

        // Check for specific upload errors
        if (isset($_FILES['photos']['error']) && is_array($_FILES['photos']['error'])) {
            foreach ($_FILES['photos']['error'] as $error) {
                if ($error == UPLOAD_ERR_FORM_SIZE || $error == UPLOAD_ERR_INI_SIZE) {
                    $maxFileSize = $this->getMaxFileSize();
                    return "Upload failed: One or more files exceed the maximum file size limit (" . $this->formatBytes($maxFileSize) . "). Please reduce image file sizes.";
                }
            }
        }

        return null; // No errors
    }

    // NEW METHOD: Get max file upload size
    private function getMaxFileSize()
    {
        $maxUpload = $this->parseSize(ini_get('upload_max_filesize'));
        $maxPost = $this->parseSize(ini_get('post_max_size'));
        return min($maxUpload, $maxPost);
    }

    // NEW METHOD: Get max POST size
    private function getMaxPostSize()
    {
        return $this->parseSize(ini_get('post_max_size'));
    }

    // NEW METHOD: Parse size string to bytes
    private function parseSize($size)
    {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        } else {
            return round($size);
        }
    }

    // NEW METHOD: Format bytes to human readable
    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision) . ' ' . $units[$i];
    }

    // FIXED METHOD: Handle image uploads to local storage with proper error handling
    private function handleImageUploads($propertyId)
    {
        // Check if files were uploaded properly
        if (
            !isset($_FILES['photos']) ||
            !isset($_FILES['photos']['name']) ||
            !is_array($_FILES['photos']['name']) ||
            empty($_FILES['photos']['name']) ||
            empty($_FILES['photos']['name'][0])
        ) {
            return ['success' => true, 'count' => 0, 'message' => 'No images to upload'];
        }

        // Define upload directory in public folder
        $uploadBaseDir = APPROOT . '/../public/uploads/properties/';
        $propertyDir = $uploadBaseDir . 'property_' . $propertyId . '/';

        // Create directories if they don't exist
        if (!is_dir($uploadBaseDir)) {
            if (!mkdir($uploadBaseDir, 0755, true)) {
                error_log("Failed to create base upload directory: " . $uploadBaseDir);
                return ['success' => false, 'count' => 0, 'message' => 'Failed to create base upload directory'];
            }
        }

        if (!is_dir($propertyDir)) {
            if (!mkdir($propertyDir, 0755, true)) {
                error_log("Failed to create property directory: " . $propertyDir);
                return ['success' => false, 'count' => 0, 'message' => 'Failed to create property directory'];
            }
        }

        $uploadedCount = 0;
        $errors = [];

        // Safely count files
        $fileNames = $_FILES['photos']['name'];
        if (!is_array($fileNames)) {
            $fileNames = [$fileNames];
        }

        $totalFiles = count($fileNames);

        // Limit to 5 images max to avoid size issues
        $maxImages = min($totalFiles, 5);

        for ($i = 0; $i < $maxImages; $i++) {
            // Check if this file upload was successful
            if (!isset($_FILES['photos']['error'][$i]) || $_FILES['photos']['error'][$i] !== UPLOAD_ERR_OK) {
                $errorMsg = $this->getUploadErrorMessage($_FILES['photos']['error'][$i] ?? UPLOAD_ERR_NO_FILE);
                $errors[] = "Upload error for file " . ($i + 1) . ": " . $errorMsg;
                continue;
            }

            $tmpName = $_FILES['photos']['tmp_name'][$i];
            $originalName = $_FILES['photos']['name'][$i];

            // Skip empty file names
            if (empty($originalName)) {
                continue;
            }

            // Validate file exists and is readable
            if (!file_exists($tmpName) || !is_readable($tmpName)) {
                $errors[] = "File not accessible: " . $originalName;
                continue;
            }

            // Validate file type using finfo
            if (function_exists('finfo_open')) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $fileType = finfo_file($finfo, $tmpName);
                finfo_close($finfo);
            } else {
                // Fallback to mime_content_type if finfo is not available
                $fileType = mime_content_type($tmpName);
            }

            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($fileType, $allowedTypes)) {
                $errors[] = "Invalid file type for: " . $originalName . " (Type: " . $fileType . ")";
                continue;
            }

            // Validate file size (2MB max per image to avoid issues)
            if ($_FILES['photos']['size'][$i] > 2 * 1024 * 1024) {
                $errors[] = "File too large: " . $originalName . " (" . $this->formatBytes($_FILES['photos']['size'][$i]) . "). Max 2MB per image.";
                continue;
            }

            // Generate unique filename with timestamp
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $filename = 'img_' . date('Y-m-d_H-i-s') . '_' . $i . '.' . $extension;
            $filePath = $propertyDir . $filename;

            // Move uploaded file
            if (move_uploaded_file($tmpName, $filePath)) {
                $uploadedCount++;

                // Create a primary image marker for the first uploaded image
                if ($uploadedCount === 1) {
                    $primaryFile = $propertyDir . 'primary.txt';
                    file_put_contents($primaryFile, $filename);
                }

                // Log successful upload
                error_log("Successfully uploaded image: " . $filename . " for property " . $propertyId);
            } else {
                $errors[] = "Failed to upload: " . $originalName;
                error_log("Failed to move uploaded file from " . $tmpName . " to " . $filePath);
            }
        }

        // Return result
        if ($uploadedCount > 0) {
            $message = $uploadedCount . " images uploaded successfully";
            if (!empty($errors)) {
                $message .= ". Issues: " . implode(', ', $errors);
            }
            return [
                'success' => true,
                'count' => $uploadedCount,
                'message' => $message
            ];
        } else {
            return [
                'success' => false,
                'count' => 0,
                'message' => !empty($errors) ? implode(', ', $errors) : 'No images were uploaded'
            ];
        }
    }

    // NEW METHOD: Handle document uploads to local storage
    private function handleDocumentUploads($propertyId)
    {
        // Check if documents were uploaded properly
        if (
            !isset($_FILES['documents']) ||
            !isset($_FILES['documents']['name']) ||
            !is_array($_FILES['documents']['name']) ||
            empty($_FILES['documents']['name']) ||
            empty($_FILES['documents']['name'][0])
        ) {
            return ['success' => true, 'count' => 0, 'message' => 'No documents to upload'];
        }

        // Define upload directory in public folder
        $uploadBaseDir = APPROOT . '/../public/uploads/properties/';
        $propertyDir = $uploadBaseDir . 'property_' . $propertyId . '/documents/';

        // Create directories if they don't exist
        if (!is_dir($propertyDir)) {
            if (!mkdir($propertyDir, 0755, true)) {
                error_log("Failed to create property documents directory: " . $propertyDir);
                return ['success' => false, 'count' => 0, 'message' => 'Failed to create documents directory'];
            }
        }

        $uploadedCount = 0;
        $errors = [];

        // Safely count files
        $fileNames = $_FILES['documents']['name'];
        if (!is_array($fileNames)) {
            $fileNames = [$fileNames];
        }

        $totalFiles = count($fileNames);

        // Limit to 3 documents max
        $maxDocuments = min($totalFiles, 3);

        for ($i = 0; $i < $maxDocuments; $i++) {
            // Check if this file upload was successful
            if (!isset($_FILES['documents']['error'][$i]) || $_FILES['documents']['error'][$i] !== UPLOAD_ERR_OK) {
                $errorMsg = $this->getUploadErrorMessage($_FILES['documents']['error'][$i] ?? UPLOAD_ERR_NO_FILE);
                $errors[] = "Upload error for document " . ($i + 1) . ": " . $errorMsg;
                continue;
            }

            $tmpName = $_FILES['documents']['tmp_name'][$i];
            $originalName = $_FILES['documents']['name'][$i];

            // Skip empty file names
            if (empty($originalName)) {
                continue;
            }

            // Validate file exists and is readable
            if (!file_exists($tmpName) || !is_readable($tmpName)) {
                $errors[] = "Document not accessible: " . $originalName;
                continue;
            }

            // Validate file type using finfo
            if (function_exists('finfo_open')) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $fileType = finfo_file($finfo, $tmpName);
                finfo_close($finfo);
            } else {
                // Fallback to mime_content_type if finfo is not available
                $fileType = mime_content_type($tmpName);
            }

            $allowedTypes = [
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'image/jpeg',
                'image/jpg',
                'image/png',
                'image/gif'
            ];
            if (!in_array($fileType, $allowedTypes)) {
                $errors[] = "Invalid document type for: " . $originalName . " (Type: " . $fileType . ")";
                continue;
            }

            // Validate file size (5MB max per document)
            if ($_FILES['documents']['size'][$i] > 5 * 1024 * 1024) {
                $errors[] = "Document too large: " . $originalName . " (" . $this->formatBytes($_FILES['documents']['size'][$i]) . "). Max 5MB per document.";
                continue;
            }

            // Generate unique filename with timestamp
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $filename = 'doc_' . date('Y-m-d_H-i-s') . '_' . $i . '.' . $extension;
            $filePath = $propertyDir . $filename;

            // Move uploaded file
            if (move_uploaded_file($tmpName, $filePath)) {
                $uploadedCount++;

                // Log successful upload
                error_log("Successfully uploaded document: " . $filename . " for property " . $propertyId);
            } else {
                $errors[] = "Failed to upload document: " . $originalName;
                error_log("Failed to move uploaded document from " . $tmpName . " to " . $filePath);
            }
        }

        // Return result
        if ($uploadedCount > 0) {
            $message = $uploadedCount . " documents uploaded successfully";
            if (!empty($errors)) {
                $message .= ". Issues: " . implode(', ', $errors);
            }
            return [
                'success' => true,
                'count' => $uploadedCount,
                'message' => $message
            ];
        } else {
            return [
                'success' => false,
                'count' => 0,
                'message' => !empty($errors) ? implode(', ', $errors) : 'No documents were uploaded'
            ];
        }
    }

    // Get upload error message
    private function getUploadErrorMessage($error)
    {
        switch ($error) {
            case UPLOAD_ERR_INI_SIZE:
                return 'File exceeds upload_max_filesize (' . ini_get('upload_max_filesize') . ')';
            case UPLOAD_ERR_FORM_SIZE:
                return 'File exceeds MAX_FILE_SIZE';
            case UPLOAD_ERR_PARTIAL:
                return 'File partially uploaded';
            case UPLOAD_ERR_NO_FILE:
                return 'No file uploaded';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'No temporary directory';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Cannot write to disk';
            case UPLOAD_ERR_EXTENSION:
                return 'Upload stopped by extension';
            default:
                return 'Unknown upload error (' . $error . ')';
        }
    }

    // Get property images from local storage
    private function getPropertyImages($propertyId)
    {
        $propertyDir = APPROOT . '/../public/uploads/properties/property_' . $propertyId . '/';
        $urlBase = URLROOT . '/uploads/properties/property_' . $propertyId . '/';

        if (!is_dir($propertyDir)) {
            return [];
        }

        $images = [];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        $files = scandir($propertyDir);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || $file === 'primary.txt' || is_dir($propertyDir . $file)) {
                continue;
            }

            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, $allowedExtensions)) {
                $images[] = [
                    'name' => $file,
                    'url' => $urlBase . $file,
                    'path' => $propertyDir . $file,
                    'size' => filesize($propertyDir . $file),
                    'modified' => filemtime($propertyDir . $file)
                ];
            }
        }

        // Sort by modification time (newest first)
        usort($images, function ($a, $b) {
            return $b['modified'] - $a['modified'];
        });

        return $images;
    }

    // Get property documents from local storage
    private function getPropertyDocuments($propertyId)
    {
        $documentsDir = APPROOT . '/../public/uploads/properties/property_' . $propertyId . '/documents/';
        $urlBase = URLROOT . '/uploads/properties/property_' . $propertyId . '/documents/';

        if (!is_dir($documentsDir)) {
            return [];
        }

        $documents = [];
        $allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif'];

        $files = scandir($documentsDir);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, $allowedExtensions)) {
                $documents[] = [
                    'name' => $file,
                    'url' => $urlBase . $file,
                    'path' => $documentsDir . $file,
                    'size' => filesize($documentsDir . $file),
                    'modified' => filemtime($documentsDir . $file),
                    'type' => $extension
                ];
            }
        }

        // Sort by modification time (newest first)
        usort($documents, function ($a, $b) {
            return $b['modified'] - $a['modified'];
        });

        return $documents;
    }

    // Get primary property image
    private function getPrimaryPropertyImage($propertyId)
    {
        $propertyDir = APPROOT . '/../public/uploads/properties/property_' . $propertyId . '/';
        $primaryFile = $propertyDir . 'primary.txt';
        $urlBase = URLROOT . '/uploads/properties/property_' . $propertyId . '/';

        // Check if primary image is marked
        if (file_exists($primaryFile)) {
            $primaryImageName = trim(file_get_contents($primaryFile));
            if ($primaryImageName && file_exists($propertyDir . $primaryImageName)) {
                return $urlBase . $primaryImageName;
            }
        }

        // If no primary image set, return the first image
        $images = $this->getPropertyImages($propertyId);
        if (!empty($images)) {
            return $images[0]['url'];
        }

        // Return default placeholder if no images
        return URLROOT . '/img/property-placeholder.jpg';
    }

    // Get property images (AJAX endpoint)
    public function getPropertyImagesJson($propertyId)
    {
        header('Content-Type: application/json');

        if (!$propertyId) {
            echo json_encode(['success' => false, 'message' => 'Invalid property ID']);
            return;
        }

        $images = $this->getPropertyImages($propertyId);

        echo json_encode([
            'success' => true,
            'images' => $images
        ]);
    }

    /**
     * Suggest Rent (AJAX Endpoint)
     */
    public function suggestRent()
    {
        // Only allow POST requests
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            redirect('landlord/properties');
        }

        // Set JSON header
        header('Content-Type: application/json');

        try {
            // Get and sanitize form data
            $propertyData = [
                'address' => trim($_POST['address'] ?? ''),
                'property_type' => trim($_POST['property_type'] ?? ''),
                'bedrooms' => (int)($_POST['bedrooms'] ?? 0),
                'bathrooms' => (float)($_POST['bathrooms'] ?? 0),
                'sqft' => !empty($_POST['sqft']) ? (int)$_POST['sqft'] : null,
                'parking' => trim($_POST['parking'] ?? '0'),
                'pet_policy' => trim($_POST['pet_policy'] ?? 'no'),
                'laundry' => trim($_POST['laundry'] ?? 'none')
            ];

            // Validate required fields
            if (empty($propertyData['property_type']) || empty($propertyData['bedrooms'])) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Property type and bedrooms are required to generate a suggestion.'
                ]);
                exit;
            }

            // Get rent suggestion from model
            $suggestion = $this->rentOptimizer->suggestRent($propertyData);

            // Return suggestion as JSON
            echo json_encode($suggestion);
            exit;
        } catch (Exception $e) {
            // Log error for debugging
            error_log('Rent suggestion error: ' . $e->getMessage());

            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while analyzing market data. Please try again or enter rent manually.'
            ]);
            exit;
        }
    }

    public function edit($id)
    {
        $property = $this->propertyModel->getPropertyById($id);

        if (!$property) {
            flash('property_message', 'Property not found');
            redirect('landlord/properties');
        }

        // Get property images
        $property->images = $this->getPropertyImages($id);

        $data = ['property' => $property];

        $this->view('landlord/v_edit_properties', $data);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check for upload errors first
            $uploadError = $this->checkUploadLimits();
            if ($uploadError) {
                flash('property_message', $uploadError, 'alert alert-danger');
                redirect('landlord/edit/' . $id);
                return;
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Get existing property to check listing type
            $existingProperty = $this->propertyModel->getPropertyById($id);

            if (!$existingProperty) {
                flash('property_message', 'Property not found');
                redirect('landlord/properties');
                return;
            }

            // Process data based on listing type
            if ($existingProperty->listing_type === 'maintenance') {
                // Maintenance property update
                $data = [
                    'id' => $id,
                    'address' => trim($_POST['address'] ?? ''),
                    'property_type' => trim($_POST['property_type'] ?? ''),
                    'bedrooms' => (int)($existingProperty->bedrooms ?? 0), // Keep existing
                    'bathrooms' => (float)($existingProperty->bathrooms ?? 1), // Keep existing
                    'sqft' => !empty($_POST['sqft']) ? (int)$_POST['sqft'] : null,
                    'rent' => 0, // Keep as 0 for maintenance
                    'deposit' => null,
                    'available_date' => null,
                    'parking' => 0,
                    'pet_policy' => 'no',
                    'laundry' => 'none',
                    'description' => trim($_POST['description'] ?? ''),
                    'current_occupant' => trim($_POST['current_occupant'] ?? '')
                ];

                // Simple validation for maintenance properties
                if (empty($data['address']) || empty($data['property_type'])) {
                    flash('property_message', 'Address and property type are required', 'alert alert-danger');
                    redirect('landlord/edit/' . $id);
                    return;
                }
            } else {
                // Rental property update (existing code)
                // Ensure only valid ENUM values for pet_policy and laundry
                $validPetPolicies = ['no', 'cats', 'dogs', 'both'];
                $validLaundry = ['none', 'shared', 'hookups', 'in_unit', 'included'];

                $data = [
                    'id' => $id,
                    'address' => trim($_POST['address'] ?? ''),
                    'property_type' => trim($_POST['property_type'] ?? ''),
                    'bedrooms' => (int)($_POST['bedrooms'] ?? 0),
                    'bathrooms' => (float)($_POST['bathrooms'] ?? 0),
                    'sqft' => !empty($_POST['sqft']) ? (int)$_POST['sqft'] : null,
                    'rent' => (float)($_POST['rent'] ?? 0),
                    'deposit' => !empty($_POST['deposit']) ? (float)$_POST['deposit'] : null,
                    'available_date' => !empty($_POST['available_date']) ? $_POST['available_date'] : null,
                    'parking' => trim($_POST['parking'] ?? ''),
                    'pet_policy' => in_array($_POST['pets'] ?? '', $validPetPolicies) ? $_POST['pets'] : 'no',
                    'laundry' => in_array($_POST['laundry'] ?? '', $validLaundry) ? $_POST['laundry'] : 'none',
                    'description' => trim($_POST['description'] ?? ''),
                ];

                // Use the same validation method for updates
                $errors = $this->validatePropertyData($data);
                if (!empty($errors)) {
                    flash('property_message', implode(', ', $errors), 'alert alert-danger');
                    redirect('landlord/edit/' . $id);
                    return;
                }
            }

            if ($this->propertyModel->update($data)) {
                // Handle new image uploads if any
                if (isset($_FILES['photos']) && !empty($_FILES['photos']['name'][0])) {
                    $imageUploadResult = $this->handleImageUploads($id);
                    if ($imageUploadResult['success']) {
                        flash('property_message', 'Property updated successfully with ' . $imageUploadResult['count'] . ' new images', 'alert alert-success');
                    } else {
                        flash('property_message', 'Property updated but image upload failed: ' . $imageUploadResult['message'], 'alert alert-warning');
                    }
                } else {
                    flash('property_message', 'Property Updated Successfully', 'alert alert-success');
                }

                redirect('landlord/properties');
            } else {
                flash('property_message', 'Failed to update property', 'alert alert-danger');
                redirect('landlord/edit/' . $id);
            }
        } else {
            $property = $this->propertyModel->getPropertyById($id);
            if (!$property) {
                flash('property_message', 'Property not found');
                redirect('landlord/properties');
            }

            // Get property images
            $property->images = $this->getPropertyImages($id);

            $data = ['property' => $property];
            $this->view('landlord/v_edit_properties', $data);
        }
    }

    public function delete($id)
    {
        // Delete property images first
        $this->deletePropertyImages($id);

        // Then delete the property
        if ($this->propertyModel->deleteProperty($id)) {
            flash('property_message', 'Property and all associated images removed');
            redirect('landlord/properties');
        } else {
            die('Something went wrong');
        }
    }

    // Delete all property images and documents
    private function deletePropertyImages($propertyId)
    {
        $propertyDir = APPROOT . '/../public/uploads/properties/property_' . $propertyId . '/';

        if (is_dir($propertyDir)) {
            // Function to recursively delete directory and its contents
            $this->deleteDirectory($propertyDir);
        }
    }

    // Helper method to recursively delete directory
    private function deleteDirectory($dir)
    {
        if (!is_dir($dir)) {
            return false;
        }

        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $filePath = $dir . $file;
                if (is_dir($filePath)) {
                    $this->deleteDirectory($filePath);
                } else {
                    unlink($filePath);
                }
            }
        }

        return rmdir($dir);
    }

    public function maintenance()
    {
        $data = [
            'title' => 'Maintenance Requests',
            'page' => 'maintenance',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('landlord/v_maintenance', $data);
    }

    public function inquiries()
    {
        $data = [
            'title' => 'Tenant Inquiries',
            'page' => 'inquiries',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('landlord/v_inquiries', $data);
    }

    public function payment_history()
    {
        $data = [
            'title' => 'Payment History',
            'page' => 'payment_history',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('landlord/v_payment_history', $data);
    }

    public function feedback()
    {
        $data = [
            'title' => 'Tenant Feedback',
            'page' => 'feedback',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('landlord/v_feedback', $data);
    }

    public function notifications()
    {
        $data = [
            'title' => 'Notifications',
            'page' => 'notifications',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('landlord/v_notifications', $data);
    }

    public function settings()
    {
        $data = [
            'title' => 'Settings',
            'page' => 'settings',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('landlord/v_settings', $data);
    }

    public function income()
    {
        $data = [
            'title' => 'Income Reports',
            'page' => 'income',
            'user_name' => $_SESSION['user_name']
        ];

        $this->view('landlord/v_income', $data);
    }

    // Show new maintenance request form
    public function new_maintenance_request()
    {
        // Check if user is logged in
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $data = [
            'title' => 'New Maintenance Request - Rentigo',
            'property_id' => '',
            'request_title' => '',
            'category' => '',
            'priority' => 'medium',
            'description' => '',
            'tenant_name' => '',
            'tenant_contact' => '',
            'access_instructions' => '',
            'property_err' => '',
            'title_err' => '',
            'category_err' => '',
            'priority_err' => '',
            'description_err' => ''
        ];

        $this->view('landlord/v_new_maintenance_request', $data);
    }

    // Process maintenance request submission
    public function create_maintenance_request()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'property_id' => trim($_POST['property_id']),
                'title' => trim($_POST['title']),
                'category' => trim($_POST['category']),
                'priority' => trim($_POST['priority']),
                'description' => trim($_POST['description']),
                'tenant_name' => trim($_POST['tenant_name']),
                'tenant_contact' => trim($_POST['tenant_contact']),
                'access_instructions' => trim($_POST['access_instructions']),
                'property_err' => '',
                'title_err' => '',
                'category_err' => '',
                'priority_err' => '',
                'description_err' => ''
            ];

            // Validate property
            if (empty($data['property_id'])) {
                $data['property_err'] = 'Please select a property';
            }

            // Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter a title';
            }

            // Validate category
            if (empty($data['category'])) {
                $data['category_err'] = 'Please select a category';
            }

            // Validate priority
            if (empty($data['priority'])) {
                $data['priority_err'] = 'Please select a priority level';
            }

            // Validate description
            if (empty($data['description'])) {
                $data['description_err'] = 'Please provide a description';
            }

            // Check for errors
            if (
                empty($data['property_err']) && empty($data['title_err']) &&
                empty($data['category_err']) && empty($data['priority_err']) &&
                empty($data['description_err'])
            ) {
                // Create maintenance request
                if ($this->maintenanceModel->create($data)) {
                    flash('maintenance_message', 'Maintenance request submitted successfully!', 'alert alert-success');
                    redirect('landlord/maintenance');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $properties = $this->propertyModel->getPropertiesByLandlordId($_SESSION['user_id']);
                $data['properties'] = $properties;
                $this->view('landlord/v_new_maintenance_request', $data);
            }
        } else {
            redirect('landlord/new_maintenance_request');
        }
    }
}
