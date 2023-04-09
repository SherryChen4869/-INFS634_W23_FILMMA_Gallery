<?php

date_default_timezone_set('America/Toronto'); //setting default timezone
$date = new DateTime(); //Creating a variable for DateTime
$TimeDate = $date->format('Y-m-d H:i:s'); 

if( isset($_SESSION['user_id']) ){ //Checking if session already exisits and has a user information? 

    session_start(); //Session is started 
	header("Location: dashboard.php"); //redirect to Dashboard page 
} 

require 'database/db_login.php'; //load credentials 

if(!empty($_POST['email']) && !empty($_POST['password'])){ //check if email and password is submitted using POST method

    //Extracting data from the database for matching 
    $query="SELECT id,email,password FROM users WHERE email LIKE '".$_POST['email']."'"; //creating query
    $query_exc = $conn->query($query);
    $results= $query_exc->fetch(PDO::FETCH_ASSOC); //executing query to save results in $results

	if(count($results) > 0 && password_verify($_POST['password'],$results['password']) ){ //verifying atleast 1 email matches in database  & veriffying password 

        session_start(); //Session is started 
		$_SESSION['user_id'] = $results['id']; //setting session user information 
		header("Location: dashboard.php");
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
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"><!--Define Name of input type -->
                        <label for="floatingInput">Email address</label>
                        </div>

                        <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"><!--Define Name of input type -->
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
                   
        
           

        <?php echo '<span style="font-size: 8px;"> '; include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
