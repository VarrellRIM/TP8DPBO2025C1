<?php
require_once "models/Student.php";
require_once "models/Major.php";

class StudentController
{
    private $studentModel;
    private $majorModel;

    public function __construct()
    {
        $this->studentModel = new Student();
        $this->majorModel = new Major();
    }

    public function index()
    {
        $students = $this->studentModel->getAll();
        require_once "views/students/index.php";
    }

    public function create()
    {
        $majors = $this->majorModel->getAll();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $name = $_POST['name'];
            $nim = $_POST['nim'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];
            $major_id = $_POST['major_id'];
            
            if ($this->studentModel->create($name, $nim, $phone, $join_date, $major_id)) {
                header("Location: index.php?page=students");
                exit;
            }
        }
        
        require_once "views/students/create.php";
    }

    public function edit($id)
    {
        $student = $this->studentModel->getById($id);
        $majors = $this->majorModel->getAll();
        
        if (!$student) {
            header("Location: index.php?page=students");
            exit;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $name = $_POST['name'];
            $nim = $_POST['nim'];
            $phone = $_POST['phone'];
            $join_date = $_POST['join_date'];
            $major_id = $_POST['major_id'];
            
            if ($this->studentModel->update($id, $name, $nim, $phone, $join_date, $major_id)) {
                header("Location: index.php?page=students");
                exit;
            }
        }
        
        require_once "views/students/edit.php";
    }

    public function delete($id)
    {
        if ($this->studentModel->delete($id)) {
            header("Location: index.php?page=students");
            exit;
        }
    }
}
