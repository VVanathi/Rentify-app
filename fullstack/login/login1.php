<?php
session_start();

if (isset($_POST['login1'])) {
    $email = $_POST['email'] ?? '';
    $passwor = $_POST['passwor'] ?? '';

    // Database connection
    $url = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'register';

    $conn = new mysqli($url, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Could not Connect MySQL: ' . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($passwor, $row['passwor'])) {
        // Password matches, set session variables
        $_SESSION["ID"] = $row['id'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["firstname"] = $row['firstname'];
        $_SESSION["lastname"] = $row['lastname'];
        header("Location: home.php");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        echo "<script type='text/javascript'>
        alert('emailid and pasword doesnt match');
        window.location.href = 'http://localhost/fullstack/login/login.html';
      </script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
