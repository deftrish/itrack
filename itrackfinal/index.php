<?php
require "logintemplate.php";
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <?php
      if(isset($_SESSION['userId'])) {
        echo '<p class="login-status">You are logged in!</p>';

      }
    
      ?>
  </div>
</main>


<?php

  require "footer.php";

?> 