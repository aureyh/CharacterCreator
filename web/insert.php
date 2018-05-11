<html>
<?php
include "connect.php";



$name = $_GET["firstname"];
$lastname = $_GET["lastname"];
$email = $_GET["email"];

$values = "('".$name."','".$lastname."','".$email."')";
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES".$values;


if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn ->close();

//header('Location:home.php');
//die();

 ?>
<script>
//redirect back to the home page after a set time.
setTimeout(function(){window.location.href='home.php'},2000);
</script>
</html>
