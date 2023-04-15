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

        <div class="lightbox-gallery">
            <div class="container">

                <div class="row photos">
                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                        <a data-lightbox="photos" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img class="img-fluid" src="Asset/img/N1.jpg" >
                        </a>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Username</h1>
                                
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid" src="Asset/img/N1.jpg">
                                        This is a pic of Montreal.
                                    </div>

                                    <div class="form-floating">
                                        <textarea cols="55" class="form-control" placeholder="Say something here" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Comments</label>
                                    </div>
                                    <div class="modal-footer">
                                        <p id=>(123)</p>
                                        <button class="button"> <i class="fa fa-heart"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-dark">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                        <a href="Asset/img/N2.jpg" data-lightbox="photos" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <img class="img-fluid" src="Asset/img/N2.jpg">
                        </a>

                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel2">Username</h1>
                                
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-fluid" src="Asset/img/N2.jpg">
                                        This is a pic of Montreal.
                                    </div>

                                    <div class="form-floating">
                                        <textarea cols="55" class="form-control" placeholder="Say something here" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Comments</label>
                                    </div>
                                    <div class="modal-footer">
                                        <p id=>(123)</p>
                                        <button class="button"> <i class="fa fa-heart"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-dark">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php include('footer.php');?>

    </body>
    

</html>