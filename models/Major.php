<?php
require_once "config/connection.php";

class Major
{
    private $conn;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM majors";
        $result = $this->conn->query($sql);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM majors WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function create($code, $name, $faculty)
    {
        $sql = "INSERT INTO majors (code, name, faculty) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $code, $name, $faculty);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $code, $name, $faculty)
    {
        $sql = "UPDATE majors SET code = ?, name = ?, faculty = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $code, $name, $faculty, $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM majors WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMajorOptions()
    {
        $majors = $this->getAll();
        $options = [];
        
        foreach ($majors as $major) {
            $options[$major['id']] = $major['name'] . ' (' . $major['code'] . ')';
        }
        
        return $options;
    }
}
