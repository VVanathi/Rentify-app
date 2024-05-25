<?php
$openhouse = $_POST['openhouse'];
$availability = $_POST['availability'];
$movein = $_POST['movein'];
$property = $_POST['property'];
$year1 = $_POST['year1'];
$square = $_POST['square'];
$lotsize = $_POST['lotsize'];
$bedroom = $_POST['bedroom'];
$bathroom = $_POST['bathroom'];
$parking = $_POST['parking'];
$propertydesc = $_POST['propertydesc'];
$renovation = $_POST['renovation'];
$neighbour = $_POST['neighbour'];
$villaname = $_POST['villaname'];
$listingprice = $_POST['listingprice'];
$email1 = $_POST['email1'];
$phonenum = $_POST['phonenum'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$statee = $_POST['statee'];
$zip = $_POST['zip'];
$propertytax = $_POST['propertytax'];
$legaldesc = $_POST['legaldesc'];
$zonninginfo = $_POST['zonninginfo'];
$zonning = $_POST['zonning'];
$ownership1 = $_POST['ownership1'];

// Check if all required fields are not empty
if (!empty($openhouse) && !empty($availability) && !empty($movein) && !empty($property)) {

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "register";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $SELECT = "SELECT villaname FROM generals WHERE villaname = ? LIMIT 1";
        $INSERT = "INSERT INTO generals (img1, openhouse, availability, movein, property, year1, square, lotsize, bedroom, bathroom, parking, propertydesc, renovation, neighbour, villaname, listingprice, email1, phonenum, address1, address2, city, statee, zip, propertytax, legaldesc, zonninginfo, zonning, ownership1) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $villaname);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        // Check if villaname already exists
        if ($rnum == 0) {
            $stmt->close();

            // File upload handling
            $img1_filename = $_FILES['img1']['name'];

            // Move uploaded file to destination folder
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["img1"]["name"]);
            move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);

            // Insert data into database
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssssssiiisssssssssssssssss", $img1_filename, $openhouse, $availability, $movein, $property, $year1, $square, $lotsize, $bedroom, $bathroom, $parking, $propertydesc, $renovation, $neighbour, $villaname, $listingprice, $email1, $phonenum, $address1, $address2, $city, $statee, $zip, $propertytax, $legaldesc, $zonninginfo, $zonning, $ownership1);
            $stmt->execute();

            echo "<script type='text/javascript'>
                alert('New record inserted successfully');
                window.location.href = 'http://localhost/fullstack/home/home.php';
            </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Someone already registered using this villa name');
                window.location.href = 'http://localhost/fullstack/login/login.html';
            </script>";
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
if (isset($_POST["submit"])) {
  $image = $_FILES['image']['tmp_name'];
  $imgContent = addslashes(file_get_contents($image));

  // Insert image data into database
  $insert = $conn->query("INSERT into generals (img1) VALUES ('$imgContent')");

  if ($insert) {
      echo "File uploaded successfully.";
  } else {
      echo "File upload failed, please try again.";
  }
}

?>
