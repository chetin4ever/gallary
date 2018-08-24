<?php require_once("includes/header.php");?>

<?php 
 if($session->is_signed_in()){
      redirect("index.php");
    }
if(isset($_POST['submit'])){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);

    $user_found=User::verify_user($username,$password);
    //print_r( $user_found);
    if($user_found){
        $session->login($user_found);
        redirect("index.php");
    }
    else{
        $the_messeage="Your Username or Password is incorrect";
    }
}
else{
    $username="";
    $password="";
    $the_messeage="";
}

?>

    <div class="col-md-4 col-md-offset-4">
        <h1 class="bg-warning"><?php echo $the_messeage; ?> </h1>
        <form action="" method="post">
            <legend>ADMIN LOGIN</legend>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="" placeholder="Username" name="username" value="<?php htmlentities($username);?>"
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="" placeholder="Password" name="password" value="<?php htmlentities($password);?>"
            </div>
           
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
           
        </form>
   
    </div>
