<?php

date_default_timezone_set('America/Toronto'); //setting default timezone
$date = new DateTime(); //Creating a variable for DateTime
$TimeDate = $date->format('Y-m-d H:i:s'); 



require 'database/db_login.php'; //load credentials 

if(!empty($_POST['Email']) && !empty($_POST['Password'])){ //check if email and password is submitted using POST method

    $password=password_hash($_POST['Password'], PASSWORD_DEFAULT); //PHP Hashing for password
    //Extracting data from the database 
    $sql = "INSERT INTO `Users` (`ID`, `First Name`, `Last Name`, `ID Name`, `Email`, `Password`,`Time`) 
        VALUES (NULL, '".$_POST['First_Name']."', '".$_POST['Last_Name']."', '".$_POST['ID_Name']."', '".$_POST['Email']."', '".$password."', NULL)";
    $stmt = $conn->prepare($sql);
    //Creating New Event
    if( $stmt->execute() ){  //executing query to update the database 

        $message="Account Created"; //Message to show account was created
    } else {
            $message="Error was encountered in creating account."; //Message to show error in creating account 
		}
    }
    
 ?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="asset/css/MyStyle.css" rel="stylesheet"> 
</head>
    <body>
        <?php include('header.php'); ?>
        <!--Container here to organize the sign-in box -->
                <div class="container">
                    <div class="row">
                        <div class="col-5 mx-auto">
                    <main class="form-signin w-100 m-auto"> 
                    <form action="#" method="POST" id="signupform"> <!--Add action to refresh page using # & define method as POST" -->
                        
                        <h1 class="h3 mb-3 fw-normal" id="p2">Sign Up</h1>

                        <div class="form-floating">
                        <input type="text" class="form-control" id="First Name" placeholder="John" name="First_Name"><!--Define Name of input type -->
                        <label for="floatingInput">First Name</label>
                        </div>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="Last Name" placeholder="Doe" name="Last_Name"><!--Define Name of input type -->
                        <label for="floatingInput">Last Name</label>
                        </div>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="ID Name" placeholder="Doe" name="ID_Name"><!--Define Name of input type -->
                        <label for="floatingInput">ID Name</label>
                        </div>
                        <div class="form-floating">
                        <input type="email" class="form-control" id="Email" placeholder="name@example.com" name="Email" required><!--Define Name of input type -->
                        <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="Password" required><!--Define Name of input type -->
                        <label for="floatingPassword">Password</label>
                        </div>
                        
                        <?php echo "<p>".$message."</p>";?>
                        <button class="w-100 btn btn-sm btn-outline-dark" type="submit">Create Account</button>
                    </form>
                    </main>

                        </div>
                    </div>
                </div>
                   
        
        
        <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
