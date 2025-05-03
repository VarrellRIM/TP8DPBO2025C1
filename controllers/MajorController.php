<?php
require_once "models/Major.php";

class MajorController
{
    private $majorModel;

    public function __construct()
    {
        $this->majorModel = new Major();
    }

    public function index()
    {
        $majors = $this->majorModel->getAll();
        require_once "views/majors/index.php";
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $code = $_POST['code'];
            $name = $_POST['name'];
            $faculty = $_POST['faculty'];
            
            if ($this->majorModel->create($code, $name, $faculty)) {
                header("Location: index.php?page=majors");
                exit;
            }
        }
        
        require_once "views/majors/create.php";
    }

    public function edit($id)
    {
        $major = $this->majorModel->getById($id);
        
        if (!$major) {
            header("Location: index.php?page=majors");
            exit;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $code = $_POST['code'];
            $name = $_POST['name'];
            $faculty = $_POST['faculty'];
            
            if ($this->majorModel->update($id, $code, $name, $faculty)) {
                header("Location: index.php?page=majors");
                exit;
            }
        }
        
        require_once "views/majors/edit.php";
    }

    public function delete($id)
    {
        if ($this->majorModel->delete($id)) {
            header("Location: index.php?page=majors");
            exit;
        }
    }
}
