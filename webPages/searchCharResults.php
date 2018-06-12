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

  var searchBar = "\<form\>" +
    "\<label for=\"search-1\"\>Search for Character\<\/label\>" +
    "\<input type=\"search\" name=\"search-1\" id=\"search-1\" value=\"\"\>" +
    "\<\/form\>";


  //varaibles to make teh create New Button
  var createNewBtn = "\<a href=\"#\" class=\"ui-btn ui-shadow\"\>Create New\<\/a\>";
  //If it's not mobile print with centering if it is mobile print full screen.



</script>





<header data-role="header">


  <img src="../img/banner2.png" style="width:50%;">



</header>


<?php
include "searchChar.php";
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
