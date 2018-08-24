<?php
    class User extends Db_object{
        protected static $db_table="users";
        protected static $db_table_field=array('username','password','first_name','last_name');
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        
        public static function verify_user($username,$password){
            global $database;
            $username=$database->escape_string($username);
            $password=$database->escape_string($password);
            //print $username;
            $sql= "SELECT * FROM users WHERE ";
            $sql.= "username='{$username}' ";
            $sql.= "AND password='{$password}' ";
            $sql.="LIMIT 1";
           // print $sql;
            $the_result_array=self::find_this_query($sql);
            return !empty($the_result_array) ? array_shift($the_result_array) :false;
           
        }
    }// end of class User

    //$user= new User();
    //$user->properties();
?>

