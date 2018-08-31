<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()){ redirect("login.php");} ?>
<?php
   // $photos=Photo::find_all();

    //   $user= user::find_by_id($_GET['id']);
        $user=new User();
       if(isset($_POST['create'])){

          if($user){
            $user->username= $_POST['username'];
            $user->password= $_POST['password'];
            $user->first_name= $_POST['first_name'];
            $user->last_name= $_POST['last_name'];
            $user->set_file($_FILES['user_image']);
            $user->upload_photo();
            $user->save();
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
                <div class="row">
                    <div class="col-lg-6 col-md-offset-3">

                       <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" class="form-control" id="" name="username" placeholder="Username" >
                        </div>
                        <div class="form-group">
                            <label for="captiom">Password:</label>
                            <input type="text" class="form-control" id="" name="password" placeholder="Password"  >
                        </div>
                        <div class="form-group">
                            <label for="alternate_text">Frist Name:</label>
                            <input type="text" class="form-control" id="" name="first_name" placeholder="First Name" >
                        </div>
                        <div class="form-group">
                            <label for="alternate_text">Last Name</label>
                            <input type="text" class="form-control" id="" name="last_name" placeholder="Last Name" >
                        </div>
                        <div class="form-group">
                            <input type="file"  id="" name="user_image"  >
                        </div>
                        <input type="submit" name="create" value="Add" class="btn btn-primary btn-lg pull-right">
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
