<html>
<?php
include "connect.php";



$search = $_GET["search"];

$sql = "select * from Creature where name like"."'%".$search."%'";
$output = $conn->query($sql);
//If you want to return the number of rows
if ($output->num_rows > 0) {
  //echo $output->num_rows;

?>

<div data-demo-html="true">
         <table  data-role="table" id="table-column-toggle"  class="ui-responsive table-stroke">
              <thead>

                  <tr>
                    <th >Name</th>
                    <th>Race</th>
                    <th >Level</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>


                    <?php
                    while($row = $output->fetch_assoc()) {
                    echo "<tr><td> ".$row["name"]."</td> <td>".$row["race"]."</td><td>".$row["lvl"]."</td>";
?>

      <td>  <a href=<?php echo  "characterProfile.php?name=".$row["name"] ?> class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all"></a></td>
<?php
                    echo "</tr>"."<br>";
                  }


                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                    ?>



                  </tbody>
                </table>
              </div>

  <?php




$conn ->close();

//header('Location:home.php');
//die();

 ?>
<script>
//redirect back to the home page after a set time.

</script>


</html>
