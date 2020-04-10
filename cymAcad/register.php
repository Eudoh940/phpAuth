<?php include_once('lib/header.php');
  if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    //redirect to dashboard
    header("Location: dashboard.php");
  }
  //include_once('lib/header.php');
  ?>
   <div><h3>Register</h3></div>
   <p><strong> Welcome, please Register Here</p>
   <p> All fields are required</p>

    <form method='POST' action='processregister.php'>
    <p>
    <?php
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style='color:red'>" . $_SESSION['error'] ."</span";
        session_destroy();
    }  
    ?>
    </p>
    <div>
    <label>First Name</label><br/>
    <input
    <?php
        if(isset($_SESSION['first_name'])){
            echo "value=" .$_SESSION['first_name'];
        }
    ?>
     type="text" name= "first_name" placeholder="First name" />
    </div><br>
    <div>
    <label>Last Name</label><br/>
    <input
     <?php
        if(isset($_SESSION['last_name'])){
            echo "value=" .$_SESSION['last_name'];
        }
    ?> 
    type="text" name= "last_name" placeholder="Last name" />
    </div><br>

    <div>
    <label>Email</label><br/>
    <input
     <?php
        if(isset($_SESSION['email'])){
            echo "value=" . $_SESSION['email'];
        }
    ?> 
    type="text" name= "email" placeholder="Email" />
    </div><br>

    <div>
    <label>Password</label><br/>
    <input type="password" name= "password" placeholder="Password" />
    </div><br>

<div>
    <label>Gender</label><br/>
    <select      
        name="gender" >
         <?php
           if(isset($_SESSION['gender'])){
            echo "value=" .$_SESSION['gender'];
            }
        ?>
       <option value=""> Select One</option>
        <option
         <?php
            if(isset($_SESSION['gender']) && $_SESSION ['gender'] == 'male'){
              echo "selected";
            }
        ?>
       >Male</option>
       <option
        <?php
         if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
            echo "selected";
          }
        ?>
       >Female</option><?php
         if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
            echo "selected";
          }  ?>
    </select>
    </div><br>
    

    <div> 
    <label>Designation</label><br/>
    <select      
        name="designation" >
        <option value="">selelect one</option>
       <option
       <?php
         if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
            echo "selected";
          }
        ?>
       >Academic Staff</option>
       <option
       <?php
         if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
            echo "selected";
          }
        ?>
       >Non-Academic Staff</option> 
       <option
       <?php
         if(isset($_SESSION['Non-Academic staff']) && $_SESSION['Non-Academic staff'] == 'female'){
            echo "selected";
          }
        ?>
       >Student</option>     
    </select>
    </div><br>

     <div>
    <label>Department</label><br/>
    <input
     <?php
        if(isset($_SESSION['department'])){
            echo "value=" .$_SESSION['department'];
        }
    ?> 
    type="text" name= "department" placeholder="Department" />
    </div><br>

    <div>
    <button type ="Submit">Register </button>
    </div>

    
 
    </form> 

<?php 
  include_once ('lib/footer.php');
?>