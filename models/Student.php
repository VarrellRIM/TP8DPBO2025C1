<?php
require_once "config/connection.php";

class Student
{
    private $conn;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT s.*, m.name as major_name 
                FROM students s 
                LEFT JOIN majors m ON s.major_id = m.id";
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
        $sql = "SELECT * FROM students WHERE id = ?";
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

    public function create($name, $nim, $phone, $join_date, $major_id)
    {
        $sql = "INSERT INTO students (name, nim, phone, join_date, major_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $nim, $phone, $join_date, $major_id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $name, $nim, $phone, $join_date, $major_id)
    {
        $sql = "UPDATE students SET name = ?, nim = ?, phone = ?, join_date = ?, major_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssii", $name, $nim, $phone, $join_date, $major_id, $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
