<?php

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$passwor = $_POST['passwor'];




if (!empty($firstname) || !empty($lastname) || !empty($email) || !empty($phone)|| !empty($passwor) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "register";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpasswor, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From users Where email = ? Limit 1";
  $INSERT = "INSERT Into users (firstname , lastname ,email , phone , passwor  )values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssis", $firstname,$lastname,$email,$phone,$passwor);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>