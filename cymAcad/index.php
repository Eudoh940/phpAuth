<?php include_once('lib/header.php');?>

<p>
   <?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo "<span style='color:green'>" . $_SESSION['message'] ."</span";
        session_destroy();
    }  
    ?>
  </p>

     
    "Welcome to SNG Academy: Where knowledge flows<br/><hr/>
    <p>This is your one top school. School for Everyone. No racism</p>
    <p>Come with your fee. It is very important!</p>"
    
    
<?php include_once('lib/footer.php');?>