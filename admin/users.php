<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php");} ?>
<?php
    $users=User::find_all();
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
                                   <th>Id</th>
                                   <th>Photo</th>
                                   <th>Username</th>
                                   <th>First Name</th>
                                   <th>Last Name</th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php foreach ($users as $user) : ?>
                               <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><img src="<?php echo $user->image_path_and_placeholder() ;?> " class="img-responsive thumbnail admin-user-thumbnail user-image " alt=""></td>
                                   <td>
                                        <?php echo $user->username; ?>
                                       <div class="action_links">
                                            <a href="#">View</a>
                                            <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                            <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                        </div>
                                    </td>

                                   <td><?php echo $user->first_name; ?></td>
                                   <td><?php echo $user->last_name; ?></td>

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
