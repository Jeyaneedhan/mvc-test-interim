<?php
class M_Posts
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query('SELECT * From v_posts');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getPostById($postId)
    {
        $this->db->query('SELECT * FROM v_posts WHERE post_id = :id');
        $this->db->bind(':id', $postId);
        return $this->db->single();
    }

    public function edit($data)
    {
        $this->db->query('UPDATE Posts SET title = :title, body = :body WHERE id = :id');

        $this->db->bind(':id', $data['post_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        return $this->db->execute();
    }

    public function create($data)
    {
        $this->db->query('INSERT INTO Posts(user_id, title, body) VALUES(:user_id, :title, :body)');
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($postId)
    {
        $this->db->query('DELETE FROM Posts WHERE id = :id');
        $this->db->bind(':id', $postId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
