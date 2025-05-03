<?php require_once "views/templates/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create New Major</h2>
    <a href="index.php?page=majors" class="btn btn-secondary">Back to List</a>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title mb-0">Major Information</h3>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?page=majors&action=create">
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="mb-3">
                <label for="faculty" class="form-label">Faculty</label>
                <input type="text" class="form-control" id="faculty" name="faculty" required>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" name="submit" class="btn btn-primary">Create Major</button>
                <a href="index.php?page=majors" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php require_once "views/templates/footer.php"; ?>
