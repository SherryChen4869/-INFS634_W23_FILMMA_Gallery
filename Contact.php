<?php

date_default_timezone_set('America/Toronto'); //setting default timezone
$date = new DateTime(); //Creating a variable for DateTime
$TimeDate = $date->format('Y-m-d H:i:s'); 



require 'database/db_login.php'; //load credentials 

if(!empty($_POST['Email']) && !empty($_POST['Message'])){ //check if email and password is submitted using POST method

    $sql = "INSERT INTO `Contact` (`ID`, `First_Name`, `Last_Name`, `Email`, `Message`) VALUES (NULL, '".$_POST['First_Name']."', '".$_POST['Last_Name']."','".$_POST['Email']."', '".$_POST['Message']."')";
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
   
    <body>

    <div id="CTbg">
        <?php include('header.php'); ?>
    
        <div class="row">

        <div class="col-6">
        </div>

        <div class="col-6">
            <p id='p2'>Contact Us </p>

            <form action="#" method="POST" id="contact_form" class="row g-3">

                <div class="col-md-5">
                    <label class="form-label">First Name</label>
                    <input type="text" id= "First_name" class="form-control form-control-sm" name="First_Name">
                </div>
                <div class="col-md-5">
                    <label class="form-label">Last Name</label>
                    <input type="text" id="Last_Name" class="form-control form-control-sm" name="Last_Name">
                </div>
                <div class="col-10">
                    <label class="form-label">Email</label>
                    <input type="email" id="Email" class="form-control form-control-sm" name="Email">
                </div>
                <div class="col-10">
                    <label class="form-label">Message</label>
                    <textarea class="form-control form-control-sm" id="Message" rows="3" name="Message"></textarea>
                </div>
                <div class="col-12">
                    <?php echo "<p>".$message."</p>";?>
                    <button type="submit" class="btn btn-sm btn-outline-dark">Submit</button>
                </div>
            </form>

            <a href="#"><img src="asset/img/socialM.png" alt="" class="img" width = 85px></a>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <?php include('footer.php');?>

        </div>
        </div>
    </div>
    
   

   
        
    </body>
    

</html>