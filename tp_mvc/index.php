<?php
require_once "controllers/StudentController.php";
require_once "controllers/MajorController.php";

// Default page and action
$page = isset($_GET['page']) ? $_GET['page'] : 'students';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Router
switch ($page) {
    case 'students':
        $controller = new StudentController();
        
        switch ($action) {
            case 'create':
                $controller->create();
                break;
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            default:
                $controller->index();
                break;
        }
        break;
        
    case 'majors':
        $controller = new MajorController();
        
        switch ($action) {
            case 'create':
                $controller->create();
                break;
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            default:
                $controller->index();
                break;
        }
        break;
        
    default:
        $controller = new StudentController();
        $controller->index();
        break;
}
