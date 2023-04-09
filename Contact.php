<?php

date_default_timezone_set('America/Toronto'); //setting default timezone
$date = new DateTime(); //Creating a variable for DateTime
$TimeDate = $date->format('Y-m-d H:i:s'); 



require 'database/db_login.php'; //load credentials 

if(!empty($_POST['email']) && !empty($_POST['message'])){ //check if email and password is submitted using POST method

    $sql = "INSERT INTO `Contact` ('id', `fname`, `lname`, `email`, `message`) VALUES (NULL, '".$_POST['fname']."', '".$_POST['lname']."','".$_POST['email']."', '".$_POST['message']."')";
    $stmt = $conn->prepare($sql);

    if( $stmt->execute() ){  

        $message="Thanks for reaching out!  We will response ASAP..."; 
    } else {
            $message="Error was encountered in submitting.";
		}
    }
    
 ?>

<html>  
    <head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="Asset/css/MyStyle.css" rel="stylesheet">

    </head>
   
    <body style="background-color:#FAF8F8">

    <div id="left">
    <div class="container-fluid">
        <img src="asset/img/CT.jpg" class="rounded float-start" height=100% width=90%>  
    </div>

    </div>
	<div id="right" class="bigbox">
        <p id='p2'>Contact Us </p>

        <form class="row g-3">
        <div class="col-md-5">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control form-control-sm" name="fname">
        </div>
        <div class="col-md-5">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control form-control-sm" name="lname">
        </div>
        <div class="col-10">
            <label class="form-label">Email</label>
            <input type="email" class="form-control form-control-sm" name="email">
        </div>
        <div class="col-10">
            <label class="form-label">Message</label>
            <textarea class="form-control form-control-sm" rows="3" name="message"></textarea>
        </div>
        <div class="col-12">
            <?php echo "<p>".$message."</p>";?>
            <a type="submit" class="btn btn-sm btn-outline-dark">Submit</a>
        </div>
        </form>
        <a href="#"><img src="asset/img/socialM.png" alt="" class="img" width = 85px></a>
        </div>
    </div>
    <?php include('header.php'); ?>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <?php include('footer.php'); ?>

        
    </body>
    

</html>