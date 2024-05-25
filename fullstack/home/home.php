<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="first">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="fonthead">Rentify</h1>
                </div>
                <div class="col-md text-md-end mt-3">
                    <a href="../information/upload.html" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-secondary buttonclr">Add Property</button></a>
                </div>
                <div class="col-md mt-3 leftmarg position-relative">
                    <button type="button" class="btn btn-outline-secondary buttonclr">Refer & Earn</button>
                    <p class="refer-name" id="append"><?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get the most recent first name
$sql = "SELECT firstname FROM users ORDER BY id DESC LIMIT 1";

// Execute the query and fetch the result
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the most recent first name
    $row = $result->fetch_assoc();
    $firstname = ucfirst($row['firstname']);
    echo "<p>Welcome " . htmlspecialchars($firstname) . "</p>";
} else {
    echo "<p>No users found</p>";
}

// Close the connection
$conn->close();
?>
 </p>
                </div>
            </div>
            <div class="row margin-top-10">
                <div class="col-md">
                    <h1 class="keyelement">The key to buying or selling your home is just a click away.</h1>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row mt-2">
                <div class="col-md"></div>
                <div class="col-md-8 bgclrforinf">
                    <div class="row">
                        <div class="col-md"><i class="fa-regular fa-circle-check btn-danger1"></i> Verified Properties</div>
                        <div class="col-md"><i class="fa-regular fa-circle-check btn-danger1"></i> Price-Match Guarantee</div>
                        <div class="col-md"><i class="fa-regular fa-circle-check btn-danger1"></i> 24×7 Assistance</div>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
        </div>
        <div class="card card1">
            <div class="card-body d-flex justify-content-around">
                <div class="text-center"><i class="fa-solid fa-bed icon-larg"></i> 1BHK/2BHK/3BHK</div>
                <div class="text-center"><i class="fa-solid fa-users icon-larg"></i> 1000+ Happy customers</div>
                <div class="text-center"><i class="fa-solid fa-city icon-larg"></i> 100+ Cities</div>
            </div>
        </div>
        <div class="card-deck mt-4">
            <div class="row">
            
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card2 card">
                        <img class="card-img-top" src="../1.png" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><a href="defaultprint.html"><button type="button" class="btn btn-info width100">Info</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card2 card">
                        <img class="card-img-top" src="../1.png" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><a href="defaultprint.html"><button type="button" class="btn btn-info width100">Info</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card2 card">
                        <img class="card-img-top" src="../1.png" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><a href="defaultprint.html"><button type="button" class="btn btn-info width100">Info</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card2 card">
                        <img class="card-img-top" src="../1.png" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><a href="defaultprint.html"><button type="button" class="btn btn-info width100">Info</button></a></p>
                        </div>
                    </div>
                </div>
                <?php include 'fetch_images.php'; // Adjust the path if necessary ?>
            </div>
        </div>
    </div>
   
</body>
</html>
