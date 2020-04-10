<?php
session_start();
 // collecting data
 $errorCount = 0;

  // verifying the data, validation

 $first_name = $_POST['first_name'] !="" ? $_POST['first_name'] : $errorCount++;
 $last_name = $_POST['last_name'] !="" ? $_POST['last_name'] : $errorCount++;
 $email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
 $password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;
 $gender = $_POST['gender'] !="" ? $_POST['gender'] : $errorCount++;
 $designation = $_POST['designation'] !="" ? $_POST['designation'] : $errorCount++;
 $department = $_POST['department'] !="" ? $_POST['department'] : $errorCount++;

 $_SESSION['first_name'] = $first_name;
 $_SESSION['last_name'] = $last_name;
 $_SESSION['email'] = $email;
 $_SESSION['gender'] = $gender;
 $_SESSION['designation'] = $designation;
 $_SESSION['department'] = $department;

 if($errorCount > 0){ 
       $session_error = "You have " .$errorCount . " error";
     if($errorCount > 1) {
        $session_error.="s";
    }
    $session_error.= " in your form submission";
     $_SESSION["error"] = $session_error;
     header("Location: register.php");
 }else{

    //count all users
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    $newUserId = ($countAllUsers-1) ;
     $userObject = [
         'id'=> $newUserId,
         'first_name' => $first_name,
         'last_name' => $last_name,
         'email'=>$email,
         'password'=>password_hash($password, PASSWORD_DEFAULT),
         'gender'  => $gender,
         'designation'=>$designation, 
        ];

        //check if the user already exists
        //look into the allUsers array, and check if the email exists
        
        for($counter = 0; $counter < $countAllUsers;$counter++ ) {
            $currentUser = $allUsers[$counter];
            if ($currentUser == $email. ".json"){
                $_SESSION["error"] = "Registration Failed, User already exits";
                header("Location: register.php");
                die();  
            }
        }
        file_put_contents("db/users/". $email. ".json", json_encode($userObject));
         $_SESSION["message"] = "Registration Successful, you can now login!";
      header("Location: login.php");
 }
// saving the data into the database(folder)


// return back to the page, with a status 