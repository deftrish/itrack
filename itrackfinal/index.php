<?php
require "logintemplate.php";
?>
<head>
    <style>
        .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  
}
    </style>
    
</head>


<main>
  <div class="wrapper-main">
    <section class="section-default">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
                   <p style="text-align:center;"><img src="/assets/img/itrack.png" width="280" 
         height="100"></p> 
                   
                
                
      <?php
      if(isset($_SESSION['userId'])) {
        if($_SESSION['isAdmin']){
          if($_SESSION['type'] == 'investigator'){
            header("Location: dutyHome.php");          
            exit();
          }
          header("Location: homeitrack.php");
        }
        else{
          header("Location: complainant_view.php");
        }
        
      }
    
      ?>


  </div>
</main>


<?php

  // require "footer.php";

?> 