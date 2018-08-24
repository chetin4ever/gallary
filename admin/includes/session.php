<?php
class Session{
    public $user_id;
    public $signed_in= false;
    function __construct(){
        session_start();
        $this->check_the_login();
      // $uer= $_SESSION['user_id']=1;
       // print $uer;
    }

    public function is_signed_in(){
        print $this->signed_in;
        return ($this->signed_in);
   
    }

    public function login($user){
        print_r($user);
        if($user){
           print $this->user_id=$_SESSION['user_id']=$user->id;
            $this->signed_in=true;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in=false ;
    }
    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
         $this->user_id=$_SESSION['user_id'];
        $this->signed_in=true;
        }
        else{
            unset($this->user_id);
            $this->singed_in=false; 
        }
    }
}
$session=new Session();
//$session->logout();

?>
