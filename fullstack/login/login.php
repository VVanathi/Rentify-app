<?php
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$passwor = $_POST['passwor'] ?? '';

if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($passwor)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "register";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
    } else {
        $SELECT = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO users (firstname, lastname, email, phone, passwor) VALUES (?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            // Hash the password before storing it
            $hashed_password = password_hash($passwor, PASSWORD_DEFAULT);

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssis", $firstname, $lastname, $email, $phone, $hashed_password);
            $stmt->execute();

            echo "<script type='text/javascript'>
                    alert('Succesfully Signed in');
                    window.location.href = 'http://localhost/fullstack/home/home.php';
                  </script>";
        } else {
            echo "<script type='text/javascript'>
                    alert('Someone already registered using this email');
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
?>
