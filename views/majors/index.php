<?php require_once "views/templates/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Majors List</h2>
    <a href="index.php?page=majors&action=create" class="btn btn-primary">Add New Major</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Faculty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($majors)) : ?>
                <tr>
                    <td colspan="5" class="text-center">No majors found</td>
                </tr>
            <?php else : ?>
                <?php foreach ($majors as $major) : ?>
                    <tr>
                        <td><?= $major['id'] ?></td>
                        <td><?= $major['code'] ?></td>
                        <td><?= $major['name'] ?></td>
                        <td><?= $major['faculty'] ?></td>
                        <td>
                            <a href="index.php?page=majors&action=edit&id=<?= $major['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="index.php?page=majors&action=delete&id=<?= $major['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this major?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once "views/templates/footer.php"; ?>
