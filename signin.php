<?php

date_default_timezone_set('America/Toronto'); //setting default timezone
$date = new DateTime(); //Creating a variable for DateTime
$TimeDate = $date->format('Y-m-d H:i:s'); 

if( isset($_SESSION['Users']) ){ //Checking if session already exisits and has a user information? 

    session_start(); //Session is started 
	header("Location: dashboard.php"); //redirect to Dashboard page 
} 

require 'database/db_login.php'; //load credentials 

if(!empty($_POST['Email']) && !empty($_POST['Password'])){ //check if email and password is submitted using POST method

    //Extracting data from the database for matching 
    $query="SELECT ID,Email,Password FROM Users WHERE Email LIKE '".$_POST['Email']."'"; //creating query
    $query_exc = $conn->query($query);
    $results= $query_exc->fetch(PDO::FETCH_ASSOC); //executing query to save results in $results

	if(count($results) > 0 && password_verify($_POST['Password'],$results['Password']) ){ //verifying atleast 1 email matches in database  & veriffying password 

        session_start(); //Session is started 
		$_SESSION['Users'] = $results['id']; //setting session user information 
		$message="You're in";
	}
		else
		{
            $message="Invalid Credentials or Account does't exist! Please try again."; //Message to show error in login
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
                <div class="bigbox">
                <div class="container">
                    <div class="row">
                        <div class="col-5 mx-auto">
                        <main class="form-signin w-100 m-auto"> 
                        <form action="#" method="POST"> <!--Add action to refresh page using # & define method as POST" -->
                        <h1 class="h3 mb-3 fw-normal" id='p2'>Sign In</h1>

                        <div class="form-floating">
                        <input type="email" class="form-control" id="Email" placeholder="name@example.com" name="Email"><!--Define Name of input type -->
                        <label for="floatingInput">Email address</label>
                        </div>

                        <div class="form-floating">
                        <input type="password" class="form-control" id="Password" placeholder="Password" name="Password"><!--Define Name of input type -->
                        <label for="floatingPassword">Password</label>
                        </div>

                       
                        <?php echo "<p>".$message."</p>";?>
                        <button class="w-100 btn btn-sm btn-outline-dark" type="submit">Submit</button>
                        </form>
                        </main>

                        </div>
                    </div>
                </div>
                </div>
                   
        
           

        <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
