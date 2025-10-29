<?php
class Issue
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Add new issue
    public function addIssue($data)
    {
        $this->db->query("
            INSERT INTO maintenance_requests 
            (tenant_id, property_id, title, description, category, priority, status) 
            VALUES (:tenant_id, :property_id, :title, :description, :category, :priority, :status)
        ");

        $this->db->bind(':tenant_id', $data['tenant_id']);
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':priority', $data['priority']);
        $this->db->bind(':status', $data['status']);

        return $this->db->execute();
    }

    // Get all issues for a tenant
    public function getIssuesByTenant($tenant_id)
    {
        $this->db->query("
            SELECT mr.*, p.address AS property_address    
            FROM maintenance_requests mr
            JOIN properties p ON mr.property_id = p.id
            WHERE mr.tenant_id = :tenant_id
            ORDER BY mr.created_at DESC
        ");

        $this->db->bind(':tenant_id', $tenant_id);

        return $this->db->resultSet();
    }

    // Get single issue by ID
    public function getIssueById($id)
    {
        $this->db->query("
            SELECT mr.*, p.address AS property_address, u.name AS tenant_name
            FROM maintenance_requests mr
            JOIN properties p ON mr.property_id = p.id
            JOIN users u ON mr.tenant_id = u.id
            WHERE mr.id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    // Update issue status (for admin/manager side usually)
    public function updateIssue($data)
    {
        $this->db->query('UPDATE maintenance_requests SET 
            property_id = :property_id,
            title = :title,
            description = :description,
            category = :category,
            priority = :priority,
            status = :status
            WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':property_id', $data['property_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':priority', $data['priority']);
        $this->db->bind(':status', $data['status']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete issue
    public function deleteIssue($id)
    {
        $this->db->query('DELETE FROM maintenance_requests WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get list of properties (for dropdowns, etc.)
    public function getProperties()
    {
        $this->db->query("SELECT id, address, property_type, bedrooms, bathrooms, rent FROM properties ORDER BY address");
        return $this->db->resultSet(PDO::FETCH_ASSOC);
    }

    // Get recent issues by tenant
    public function getRecentIssuesByTenant($tenantId, $limit = 2)
    {
        $this->db->query("
            SELECT mr.*, p.address as property_address 
            FROM maintenance_requests mr 
            LEFT JOIN properties p ON mr.property_id = p.id 
            WHERE mr.tenant_id = :tenant_id 
            ORDER BY mr.created_at DESC 
            LIMIT :limit
        ");

        $this->db->bind(':tenant_id', $tenantId);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    // Get all maintenance requests (for Property Manager)
    public function getAllIssues()
    {
        $this->db->query("
            SELECT mr.*, 
                   p.address AS property_address,
                   p.property_type,
                   u.name AS tenant_name,
                   u.email AS tenant_email
            FROM maintenance_requests mr
            LEFT JOIN properties p ON mr.property_id = p.id
            LEFT JOIN users u ON mr.tenant_id = u.id
            ORDER BY 
                CASE 
                    WHEN mr.priority = 'emergency' THEN 1
                    WHEN mr.priority = 'high' THEN 2
                    WHEN mr.priority = 'medium' THEN 3
                    WHEN mr.priority = 'low' THEN 4
                END,
                mr.created_at DESC
        ");

        return $this->db->resultSet();
    }
}
