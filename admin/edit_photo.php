<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php");} ?>
<?php
   // $photos=Photo::find_all();
//echo $_GET['id'];
   if(empty($_GET['id'])){
       redirect("photos.php");
   }else{
       $photo= Photo::find_by_id($_GET['id']);
       echo"works";
       if(isset($_POST['update'])){
        echo"works in upate";
        $photo->title= $_POST['title'];
        $photo->caption= $_POST['caption'];
        $photo->alternate_text= $_POST['alternate_text'];
        $photo->description= $_POST['description'];
        $photo->save();
        }
   }

?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/admin-navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <form action="" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <a href="" class="thumbnail"><img src="<?php echo $photo->picture_path();?>" alt="" class="img-responsive thumbnail"></a>


                        </div>

                       <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="" name="title" placeholder="Title" value=<?php echo $photo->title ;?> >
                        </div>
                        <div class="form-group">
                            <label for="captiom">Caption</label>
                            <input type="text" class="form-control" id="" name="caption" placeholder="Caption" value=<?php echo $photo->caption;?> >
                        </div>
                        <div class="form-group">
                            <label for="alternate_text">Alternate Text</label>
                            <input type="text" class="form-control" id="" name="alternate_text" placeholder="alternate text" value=<?php echo $photo->alternate_text;?>>
                        </div>
                        <div class="form-group">
                        <label for="description">Description</label>
                            <textarea name="description" id="inputdescription" class="form-control" rows="3" required="required"><?php echo $photo->description?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                               <h4>Save <span id="toggle" <i class="fa fa-fw fa-arrow-up pull-right"></i></span> </h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span><i class="data fa fa-calendar " aria-hidden="true"></i></span>  Uploaded On :7/5/2019
                                    </p>
                                    <p class="text">
                                        Photo Id:<span class="data photo_id_box">34</span>
                                    </p>
                                    <p class="text">
                                        Filename:<span class="data">image.jpg</span>
                                    </p>
                                    <p class="text">
                                        File Type:<span class="data">jpg</span>
                                    </p>
                                    <p class="text">
                                        File size:<span class="data">231234</span>
                                    </p>
                                </div> <!-- box-inner-->
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                    <a href="delete_photo.php?id=<?php echo $photo->id;?>" class="btn btn-danger btn-lg">Delete</a>
                                    </div>
                                    <div class="info-box-delete pull-right">


                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg">

                                    </div>
                                </div>
                            </div><!-- inside-->
                        </div>
                    </div>
                </div> <!-- row-->
                </form>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include("includes/footer.php"); ?>

