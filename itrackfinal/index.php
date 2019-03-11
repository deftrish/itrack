<?php
require "logintemplate.php";
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <?php
      if(isset($_SESSION['userId'])) {
        header("Location: homeitrack.php?");
        
      }
    
      ?>


  </div>
</main>


<?php

  require "footer.php";

?> 