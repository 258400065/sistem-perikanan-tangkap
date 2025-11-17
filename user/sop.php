<?php
// SOP Display

// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch SOP data
$sql = "SELECT title, description, file_link FROM sop WHERE status = 'aktif'";
$result = $conn->query($sql);

// Bootstrap 5 layout
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SOP List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SOP System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="hero bg-primary text-white text-center py-5">
    <h1>Standard Operating Procedures</h1>
    <p>Find the latest SOPs below</p>
</div>

<div class="container mt-5">
    <div class="row"> 
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                if ($row['file_link']) {
                    echo '<a href="' . $row['file_link'] . '" class="btn btn-primary">Download File</a>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>'; 
            }
        } else {
            echo "<p>No active SOPs found.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

<footer class="bg-light text-center py-4">
    <p>&copy; 2025 SOP System. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
