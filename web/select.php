<html>
<?php
include "connect.php";



$search = $_GET["search"];

$sql = "select * from MyGuests where firstname="."'".$search."'";
$output = $conn->query($sql);

if ($output->num_rows > 0) {
  echo $output->num_rows;
    echo "<br>Query successful<br>";
    while($row = $output->fetch_assoc()) {
    echo " Name: " . $row["firstname"]. " " . $row["lastname"]." Email ".$row["email"]. "
    <br>";
  }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn ->close();

//header('Location:home.php');
//die();

 ?>
<script>
//redirect back to the home page after a set time.

</script>
</html>
