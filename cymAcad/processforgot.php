<?php
session_start();
 // collecting data
 $errorCount = 0;
 $email = $_POST['email']!="" ? $_POST['email'] : $errorCount++; 
  $_SESSION['email'] = $email;

   if($errorCount > 0){ 
       $session_error = "You have " .$errorCount . " error";
     if($errorCount > 1) {
        $session_error.="s";
    }
    $session_error.= " in your form submission";
     $_SESSION["error"] = $session_error;
     header("Location: forgot.php");

}else {
    $allUsers = scandir("db/users/"); 
    $countAllUsers = count($allUsers);
     for($counter = 0; $counter < $countAllUsers;$counter++ ) {
            $currentUser = $allUsers[$counter];
            if ($currentUser == $email. ".json"){
            //     $_SESSION["error"] = "Registration Failed, User already exits";
            //     header("Location: forgot.php");
            //     die();  
            }
        }
        $_SESSION["error"] = "Email not registered with us ERR: " .$email;
        header("Location: forgot.php");
}     