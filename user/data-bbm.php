<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch BBM data
$sql = "SELECT * FROM bbm_data ORDER BY date DESC";
$result = $conn->query($sql);

// HTML structure with Bootstrap 5
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <title>BBM Data</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BBM Data</a>
    </nav>
    <div class="hero bg-primary text-white text-center p-5">
        <h1>BBM Data Overview</h1>
        <p>Access and manage your BBM data efficiently.</p>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Fuel Type</th>
                    <th>Quantity</th>
                    <th>Price per Liter</th>
                    <th>Total Price</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['fuel_type']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['price_per_liter']; ?></td>
                            <td><?php echo $row['total_price']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7">No data available</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <footer class="bg-light text-center p-3">
        <p>&copy; 2025 BBM Data. All rights reserved.</p>
    </footer>
</body>
</html>
<?php
$conn->close();
