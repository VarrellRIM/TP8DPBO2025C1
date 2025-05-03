<?php require_once "views/templates/header.php"; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Student</h2>
    <a href="index.php?page=students" class="btn btn-secondary">Back to List</a>
</div>

<div class="card">
    <div class="card-header bg-warning text-white">
        <h3 class="card-title mb-0">Edit Student Information</h3>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?page=students&action=edit&id=<?= $student['id'] ?>">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $student['name'] ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $student['nim'] ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= $student['phone'] ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="join_date" class="form-label">Join Date</label>
                <input type="date" class="form-control" id="join_date" name="join_date" value="<?= $student['join_date'] ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="major_id" class="form-label">Major</label>
                <select class="form-select" id="major_id" name="major_id" required>
                    <option value="">-- Select Major --</option>
                    <?php foreach ($majors as $major) : ?>
                        <option value="<?= $major['id'] ?>" <?= ($student['major_id'] == $major['id']) ? 'selected' : '' ?>>
                            <?= $major['name'] ?> (<?= $major['code'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" name="submit" class="btn btn-warning">Update Student</button>
                <a href="index.php?page=students" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php require_once "views/templates/footer.php"; ?>
