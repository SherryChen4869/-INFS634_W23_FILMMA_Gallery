<html>  
    <head>
    <link href="https://fonts.cdnfonts.com/css/league-spartan" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="Asset/css/MyStyle.css" rel="stylesheet">
    <link href="Asset/css/gallery.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
   
    <body style="background-color:#FAF8F8">
        <?php include('header.php'); ?>
        <?php include('sub-header.php'); ?>

        <?php 
            require 'database/db_login.php';

            $query="SELECT * FROM Gallery"; 
            $results = $conn->query($query);

            $counts=mysql_num_rows($results);

            if ($result->num_rows > 0){

                echo '<div class="container gallery-container">';
                echo '<div class="tz-gallery">';
                echo '<div class="row">';

                while ($row = $result->fetch_assoc()){

                    $like = $row["likes"];
                    $id = $row["id"];
                    $username = $row["username"];
                    $image = $row["image"];
                        
                        echo '<div class="col-sm-6 col-md-4 col-lg-3 item">
                        <div class="thumbnail">
                        <a href="Asset/img/.$image." class="lightbox">
                        <img class="img-fluid" src="Asset/img/.$image."></a>
                        <div class="caption"><p> .$username. &nbsp;&nbsp;&nbsp;"(".$like.")"
                        <button class="button"> <i class="fa fa-heart"></i></button></p></div></div></div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';  
            }

            else{
                echo "No results";
            }

            $conn->close();

            ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
    

</html>