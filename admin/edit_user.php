<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php");} ?>
<?php

    if(empty($_GET['id'])){
        redirect("users.php");
    }
    $user=User::find_by_id($_GET['id']);
    if(isset($_POST['delete'])){
        if($user){
            $user->delete_user();
            redirect("users.php");
        }
    }
     if(isset($_POST['update'])){
       if($user){
            $user->username= $_POST['username'];
            $user->password= $_POST['password'];
            $user->first_name= $_POST['first_name'];
            $user->last_name= $_POST['last_name'];
            if(empty($_FILES['user_image'])){
                $user->save();
            }else{
                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $user->save();
                redirect("edit_user.php?id={$user->id}");
            }


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
                <form action="" method="post" enctype="multipart/form-data">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                        </div>
                        <div class="col-lg-6 ">
                            <div class="form-group">
                                <label for="">Username:</label>
                                <input type="text" class="form-control" id="" name="username" placeholder="Username" value="<?php echo $user->username; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="captiom">Password:</label>
                                <input type="password" class="form-control" id="" name="password" placeholder="Password" value="<?php echo $user->password; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="alternate_text">Frist Name:</label>
                                <input type="text" class="form-control" id="" name="first_name" placeholder="First Name" value="<?php echo $user->first_name; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="alternate_text">Last Name</label>
                                <input type="text" class="form-control" id="" name="last_name" placeholder="Last Name"value="<?php echo $user->last_name; ?>" >
                            </div>
                            <div class="form-group">
                                <input type="file"  id="" name="user_image"  >
                            </div>
                            <input type="submit" name="update" value="Upadta" class="btn btn-primary btn-lg pull-right">
                            <input type="submit" name="delete" value="Delete" class="btn btn-primary btn-lg pull-left">
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
