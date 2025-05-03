<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP MVC - Student Management</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Student Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'students') || !isset($_GET['page']) ? 'active' : '' ?>" href="index.php?page=students">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= isset($_GET['page']) && $_GET['page'] == 'majors' ? 'active' : '' ?>" href="index.php?page=majors">Majors</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
