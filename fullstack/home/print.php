<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL query to select data based on ID
    $sql = "SELECT openhouse ,img1, availability ,movein , property , year1, square ,lotsize , bedroom , bathroom, parking
    ,propertydesc , renovation , neighbour ,villaname, listingprice ,email1 , phonenum , address1 , address2 , city 
    , statee , zip , propertytax , legaldesc , zonninginfo , zonning , ownership1 FROM generals WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '
            <div class="row">
                <div class="col-md-6 ">
                <div class="card mt-2" style="margin-left: 25px;">
                        <div class="card-header">
                            <h5 class="card-title">Property Details</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                '  . base64_encode($row["img1"]) . ' 
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                    <div class="card mt-2" style="margin-left: 25px;">
                        <div class="card-header">
                            <h5 class="card-title">General Details</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Villa Name</td>
                                        <td>' . $row["villaname"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Listing Price</td>
                                        <td>' . $row["listingprice"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>' . $row["email1"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Phone number</td>
                                        <td>' . $row["phonenum"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>' . $row["address1"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Address 2</td>
                                        <td>' . $row["address2"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>' . $row["city"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>' . $row["statee"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Zip</td>
                                        <td>' . $row["zip"] . '</td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                    <div class="card mt-2" style="margin-left: 25px;">
                        <div class="card-header">
                            <h5 class="card-title">Property Details</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Property Tax Information</td>
                                        <td>' . $row["propertytax"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Legal Description</td>
                                        <td>' . $row["legaldesc"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Zoning Information</td>
                                        <td>' . $row["zonninginfo"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Zoning</td>
                                        <td>' . $row["zonning"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Ownership Details</td>
                                        <td>' . $row["ownership1"] . '</td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card mt-2" style="margin-right: 25px;">
                        <div class="card-header">
                            <h5 class="card-title">Basic Information</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Property Type</td>
                                        <td>' . $row["property"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Year Built</td>
                                        <td>' . $row["year1"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Square Footage</td>
                                        <td>' . $row["square"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Lotsize</td>
                                        <td>' . $row["lotsize"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>No.Of Bedroom</td>
                                        <td>' . $row["bedroom"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>No.Of Bathroom</td>
                                        <td>' . $row["bathroom"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Parking</td>
                                        <td>' . $row["parking"] . '</td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                    <div class="card mt-2" style="margin-right: 25px;">
                        <div class="card-header">
                            <h5 class="card-title">Detailed Description</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Property Description</td>
                                        <td>' . $row["propertydesc"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Recent Renovations or Upgrades</td>
                                        <td>' . $row["renovation"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Neighborhood Information</td>
                                        <td>' . $row["neighbour"] . '</td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                    <div class="card mt-2" style=" margin-right: 25px;">
                        <div class="card-header">
                            <h5 class="card-title">Availability</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Open House Dates</td>
                                        <td>' . $row["openhouse"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Availability for Showings</td>
                                        <td>' . $row["availability"] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Move-in Date</td>
                                        <td>' . $row["movein"] . '</td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
            </div>';
            // Output other data you want to display
        }
    } else {
        echo "0 results";
    }
    $stmt->close();
} else {
    echo "ID not provided";
}

$conn->close();
?>
