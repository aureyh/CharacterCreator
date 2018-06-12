<html>

<head>
  <!--might allow for better scaling for mobile.-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>home</title>
  <link rel="stylesheet" href="../css/themes/SepiaNGrey.min.css" />
  <link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<!--Center images-->
<style type="text/css">
img{
  display:block;
  margin-left: auto;
  margin-right: auto;
}
</style>

</head>










<script>
  //Check if the website is being run on mobile
  function isMobile() {
    if (typeof window.orientation !== 'undefined') {
      return true;
    } else return false;
  }

  var browser = isMobile();



  //Features are centered using a 3 block split and puting them in the middle
  //block
  //Left and right blocks which remain emtpy are saved as variables
  var center1 = "\<div class=\"ui-grid-b\"\>" +
    "\<div class=\"ui-block-a\"\>\<\/div\>" +
    "\<div class=\"ui-block-b\"\>";

  var center2 = "\<\/div\>" +
    "\<div class=\"ui-block-b\"\>\<\/div\>" +
    "\<\/div\>";

  var searchBar = "\<form action=\"searchCharResults.php\" method=\'get\'\>" +
    "\<label for=\"search-1\"\>Search for Character\<\/label\>" +
    "\<input type=\"search\" name=\"search\" id=\"search\" value=\"\"\>" +
    "\<\/form\>";


  //varaibles to make teh create New Button
  var createNewBtn = "\<a href=\"#\" class=\"ui-btn ui-shadow\"\>Create New\<\/a\>";
  //If it's not mobile print with centering if it is mobile print full screen.


  function center(part){

    if(!browser){
      if(part === 1){
          document.write(center1);

        }
      else if(part === 2){
          document.write(center2);

        }
    }
  }



</script>





<header data-role="header">


  <img src="../img/banner2.png" style="width:50%;">



</header>




 <?php
 include "connect.php";


 $name = $_GET["name"];


 $sql = "select * from Creature where name="."'".$name."'";
 $output = $conn->query($sql);
 //If you want to return the number of rows
 if ($output->num_rows > 0) {
   //echo $output->num_rows;


while($row = $output->fetch_assoc()) {
$name = $row["name"];
$lvl = $row["lvl"];
$race = $row["race"];
$age = $row["age"];
$gender=$row["gender"];

$hp = $row["hp"];
$mp=$row["mp"];
$str=$row["str"];
$dex=$row["dex"];
$intel=$row["intel"];
$per=$row["per"];
$chr=$row["chr"];
$spd=$row["spd"];
$ar=$row["ar"];
}
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


//Query for Abilities
$sql = "select ability from creatureAbility where name="."'".$name."'";
$output = $conn->query($sql);
//If you want to return the number of rows
if ($output->num_rows > 0) {
  //echo $output->num_rows;

$abilities = new SplFixedArray(100);
$count = 0;

while($row = $output->fetch_assoc()) {
$abilities[$count] = $row["ability"];
$count=$count+1;
}
}
else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}

//Query for ability informaiton
$sql = "select * from ability where name="."'".$abilities[0]."'";
$output = $conn->query($sql);
//If you want to return the number of rows
if ($output->num_rows > 0) {
  //echo $output->num_rows;

 

$buff = new SplFixedArray(100);
$duration = new SplFixedArray(100); 
$dmg = new SplFixedArray(100); 
$req = new SplFixedArray(100); 
$des = new SplFixedArray(100); 
$catagory = new SplFixedArray(100); 

 
 //PRoblem where the array of each only has one element
 //This is due to the starting query being only 1 search when it should be many.
 //Will need to put this loop inside the other loop or possibly
 //have the other keep changing the query.
 
 
$c=0; 
while($row = $output->fetch_assoc()) {

$buff[$c] = $row["buff"];

if($row["duration"]==0)
	$duration[$c]="Duration: N/A";
else
	$duration[$c]="Duration: ".$row["duration"];

if($row["dmg"]==0)
	$dmg[$c]="Damage: N/A";
else
	$dmg[$c]="Damage: ".$row["dmg"];
$req[$c]=$row["req"];
$des[$c]=$row["des"];
$catagory[$c]=$row["catagory"];

$c++;
}


}
else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}



 ?>





<script>center(1);</script>

          <table data-role="table" id="table-column-toggle"  class="ui-responsive table-stroke">
               <thead>


                  <!--Style="float:right"  can be used to align-->

                   <tr>
                     <th >Name</th>
                     <td><?php echo $name?></td></tr>

                     <tr>
                       <th>Level</th>
                       <td><?php echo $lvl ?></td>
                     </tr>
                     <tr>
                       <th>Race</th>
                       <td><?php echo $race ?></td>
                     </tr>
                     <tr>
                       <th>Age</th>
                       <td><?php echo $age ?></td>
                     </tr>
                     <tr>
                       <th>Gender</th>
                       <td><?php echo $gender ?></td>
                     </tr>
                   </thead>
                   </table>

                     <tr><td><img src="../img/profilePic.png"></td></tr>
                     <tr>

                        <!--Stats table-->
                        <table  data-role="table" id="table-column-toggle"  class="ui-responsive table-stroke">
                             <thead>

                      <tr><td>
                     				<div data-role="collapsibleset" data-theme="a" data-content-theme="a">
                     					<div data-role="collapsible">
                     						<h3>Stats</h3>
                                <table  data-role="table" id="table-column-toggle"  class="ui-responsive table-stroke">
                                     <thead>
                                <tr>
                                  <th>Health</th>
                                  <td><?php echo $hp ?></td>
                                </tr>
                                <tr>
                                  <th>Mana</th>
                                  <td><?php echo $mp ?></td>
                                </tr><tr>
                                  <th>Strength</th>
                                  <td><?php echo $str ?></td>
                                </tr><tr>
                                  <th>Dexterity</th>
                                  <td><?php echo $dex ?></td>
                                </tr><tr>
                                  <th>Intelligence</th>
                                  <td><?php echo $intel ?></td>
                                </tr><tr>
                                  <th>Perception</th>
                                  <td><?php echo $per ?></td>
                                </tr><tr>
                                  <th>Charisma</th>
                                  <td><?php echo $chr ?></td>
                                </tr><tr>
                                  <th>Speed</th>
                                  <td><?php echo $spd ?></td>
                                </tr>
                                <tr>
                                  <th>Armor</th>
                                  <td><?php echo $ar ?></td>
                                </tr>
                              </thead>
                            </table>

                     					</div>
                            </div>

                          </td></tr>
						  
						  <!--ABILITIES DROP DOWN-->
                        <tr><td>
                          <div data-role="collapsibleset" data-theme="a" data-content-theme="a">
                            <div data-role="collapsible">
                              <h1>Abilities</h1>
                              <table  data-role="table" id="table-column-toggle"  class="ui-responsive table-stroke">
                                   <thead>



                                      <tr><td>
                                        <div data-role="collapsibleset" data-theme="a" data-content-theme="a">




										  
										 
										  
										  
										  
										  <?php
							
											
										  
										  
											for($i = 0;$i<$count;$i++)
											{
												
												$abilityHTML="<a href=\"#popup".$i."\" data-rel=\"popup\" class=\"ui-btn ui-corner-all ui-shadow ui-btn-inline\" data-transition=\"pop\"><h1>".$abilities[$i]."</h1></a>".
                                          "<div data-role=\"popup\" id=\"popup".$i."\">".
                                          "<h3>".$abilities[$i]."</h3>".
										  "<p>".$buff[$i]."</p>".
										  "<p>".$duration[$i]."</p>".
										  "<p>".$dmg[$i].
											"</p>".											
										  "<p>".$req[$i]."</p>".
										  "<p>".$des[$i]."</p>".
										  "<p>".$catagory[$i]."</p>".
                                          "</div>";
										  
										  echo $abilityHTML;
												
											}

										  ?>



                                            


                                        </div>
                                      </td>
                                    </tr>
                                   </thead>
                                 </table>



                            </div>
                          </div>
                        </td>
                        </tr>

                 </thead>
                 <tbody>
<script>center(2);</script>




 <?php
                     echo "</tr>"."<br>";


                     ?>



                   </tbody>
                 </table>


   <?php




 $conn ->close();

 //header('Location:home.php');
 //die();

  ?>








<script>
  //Might just make seperate Mobile and browser pages and include them
  if (!browser) {

  } else {

  }
</script>










<div data-role="footer">
  <!--Adds trademark-->
  <h2>&copy; CharacterCreater2018 </h2>
</div>
</body>



</html>
