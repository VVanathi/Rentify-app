<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch image paths and IDs from the database
$sql = "SELECT id, img1 FROM generals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['id']; // Get the ID of the record
        $img1 = htmlspecialchars($row['img1']);
        echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card2 card">
                
                    <img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($row['img1']) . '" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><button type="button" class="btn btn-info width100" onclick="fetchData(' . $id . ')">Info</button></p>
                    </div>
                </div>
              </div>';
    }
} else {
    echo "No images found.";
}

$conn->close();
?>

<script>
// JavaScript function to fetch data
function fetchData(id) {
    window.location.href = 'print1.php?id=' + id;
}
</script>
