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





</head>







<script>
function isMobile(){
if (typeof window.orientation !== 'undefined') { return true;}else return false;
}



</script>




        <?php

//in progress detecting browser type

        $browser= "<script>document.write(isMobile());</script>";
        echo $browser;

        if($browser === false){
          echo "it's true";
        }else {
          echo "it's false";
        }


//Display centered button using php

        $center1="
  <div class=\"ui-grid-b\">
  <div class=\"ui-block-a\"></div>

          <div class=\"ui-block-b\">";

          $center2="</div>
          <div class=\"ui-block-b\"></div>



          </div><!-- /grid-a -->
";

$content="<a href=\"#\" class=\"ui-btn ui-shadow\">Create New</a>";

      echo  $center1.$content.$center2


       ?>









<div data-role="footer"> <!--Adds trademark-->
<h2>&copy; CharacterCreater2018 </h2>
</div>
</body>



</html>
