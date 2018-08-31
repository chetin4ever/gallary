<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php");} ?>
<?php
    $photos=Photo::find_all();
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
                <div class="row">
                    <div class="col-lg-12">
                       <table class="table table-dark table-hover">
                           <thead class="thead-light">
                               <tr>
                                   <th>Photo</th>
                                   <th>ID</th>
                                   <th>File</th>
                                   <th>Title</th>
                                   <th>Size</th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php foreach ($photos as $photo) : ?>
                               <tr>
                                   <td><img src="<?php echo $photo->picture_path();?> " class="img-responsive thumbnail admin-photo-thumbnail " alt="">
                                   <div class="pictures_link">
                                        <a href="#">View</a>
                                        <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                        <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                   </div>
                                   </td>
                                   <td><?php echo $photo->id; ?></td>
                                   <td><?php echo $photo->filename; ?></td>
                                   <td><?php echo $photo->title; ?></td>
                                   <td><?php echo $photo->size; ?></td>

                               </tr>
                            <?php endforeach;?>
                           </tbody>
                           <tfoot>
                               <tr>
                                   <th>copy @2018</th>
                               </tr>
                           </tfoot>
                       </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
