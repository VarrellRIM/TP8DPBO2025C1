<?php require_once "views/templates/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Students List</h2>
    <a href="index.php?page=students&action=create" class="btn btn-primary">Add New Student</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NIM</th>
                <th>Phone</th>
                <th>Join Date</th>
                <th>Major</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($students)) : ?>
                <tr>
                    <td colspan="7" class="text-center">No students found</td>
                </tr>
            <?php else : ?>
                <?php foreach ($students as $student) : ?>
                    <tr>
                        <td><?= $student['id'] ?></td>
                        <td><?= $student['name'] ?></td>
                        <td><?= $student['nim'] ?></td>
                        <td><?= $student['phone'] ?></td>
                        <td><?= $student['join_date'] ?></td>
                        <td><?= $student['major_name'] ?? 'Not Assigned' ?></td>
                        <td>
                            <a href="index.php?page=students&action=edit&id=<?= $student['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="index.php?page=students&action=delete&id=<?= $student['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once "views/templates/footer.php"; ?>
