<html>  
    <head>
    <link href="https://fonts.cdnfonts.com/css/league-spartan" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="Asset/css/MyStyle.css" rel="stylesheet">
    <link href="Asset/css/gallery.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
   
    <body>
        <?php include('header.php'); ?>
        <?php include('sub-header.php'); ?>

        <?php 
            require 'database/G_login.php';

            $query="SELECT * FROM Gallery WHERE Camera = 'Others'"; 
            $result = $conn->query($query);

            if ($result->num_rows > 0){

                echo '<div class="container gallery-container">';
                echo '<div class="tz-gallery">';
                echo '<div class="row">';

                while ($row = $result->fetch_assoc()){

                    $like = $row["Likes"];
                    $id = $row["ID"];
                    $username = $row["Username"];
                    $image = $row["Image"];
                    $content = $row["Content"];
                        
                        echo '<div class="col-sm-6 col-md-4 col-lg-3 item">
                        <div class="thumbnail">
                        <a href="Asset/img/'.$image.'" class="lightbox" data-bs-toggle="modal" data-bs-target="#exampleModal'.$id.'">
                        <img class="img-fluid" src="Asset/img/'.$image.'"></a>

                            <div class="modal fade" id="exampleModal'.$id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$id.'" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel'.$id.'">'.$username.'</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-fluid" src="Asset/img/'.$image.'" width=100%>
                                            '.$content.'
                                        </div>

                                        <div class="form-floating">
                                            <textarea cols="55" class="form-control" placeholder="Say something here" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Say something here...</label>
                                        </div>
                                        <div class="modal-footer">
                                            <p>('.$like.')</p>
                                            <button class="button"> <i class="fa fa-heart"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-dark">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="caption"><p>' .$username. '&nbsp;&nbsp;&nbsp;('.$like.')
                        <button class="button"> <i class="fa fa-heart"></i></button></p></div></div></div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';  
            

            }else{
                echo "No results";
            }

            $conn->close();

            ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php include('footer.php');?>

    </body>
    

</html>