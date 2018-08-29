<?php include("includes/header.php"); ?>
<?php
    echo SITE_ROOT;
    $message="";
    if(isset($_POST['submit'])){
        echo "<h1>hksdfkjsa </h1>";
        $photo=new Photo();
        $photo->title=$_POST['title'];
        echo $photo->title;
        $photo->set_file($_FILES['file_upload']);
        if($photo->save()){
            $message="photo uploaded sucessfully";
        }else{
            $message=join("<br>",$photo->errors);
        }
    }
?>

    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Upload

                        </h1>
                        <div class="col-md-6">
                            <?php echo "$message"; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="txt" name="title"  class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file_upload"  class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit">
                                </div>
                            </form>

                        </div>
                        <?php
                            // Displaying pages based on condition

                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
