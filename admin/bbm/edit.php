<?php
// Include the necessary files for database connection and header
include_once('../config.php');
include_once('header.php');
include_once('sidebar.php');

// Initialize variables for form data and error messages
$id = $name = ''; 
$errors = array();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);

    // Validate form data
    if (empty($id)) {
        $errors['id'] = 'ID is required.';
    }
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    }

    // If no errors, proceed with database update
    if (count($errors) === 0) {
        $stmt = $conn->prepare('UPDATE bbm SET name = ? WHERE id = ?');
        $stmt->bind_param('si', $name, $id);

        if ($stmt->execute()) {
            // Redirect or display success message
            echo '<div class="alert alert-success">Data updated successfully!</div>';
        } else {
            echo '<div class="alert alert-danger">Error updating data: ' . $conn->error . '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit BBM</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Perikanan Tangkap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Edit BBM Data</h2>
        <form method="POST" action="edit.php">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <span class="text-danger"><?php echo isset($errors['id']) ? $errors['id'] : ''; ?></span>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <span class="text-danger"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
