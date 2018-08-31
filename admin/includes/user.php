<?php
    class User extends Db_object{
        protected static $db_table="users";
        protected static $db_table_field=array('username','password','first_name','last_name','user_image');
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $user_image;
        public $image_placeholder="https//placehold.it/400*400&text=image";

        public $type;
        public $size;
        public $tmp_path;
        public $upload_directory="images";
        public $errors=array();
        public $upload_error_array= array(
            UPLOAD_ERR_OK         => 'Their is no error',
            UPLOAD_ERR_INI_SIZE   => 'The upload file Exceeds the UPLOAD_MAX_SIZE Directive in php.ini file',
            UPLOAD_ERR_FORM_SIZE  => 'The upload file Exceeds the MAX_FILE_SIZE Directive in php.ini file',
            UPLOAD_ERR_PARTIAL    => 'The uploaded file was only partially uploaded',
            UPLOAD_ERR_NO_FILE    => 'No file was Uploaded',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
            UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the file Upload',
        );

        public function image_path_and_placeholder(){
            return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
        }

        public function set_file($file){
            // print_r($file);
             if(empty($file) || !$file || !is_array($file)){
                 echo !$file;
                 $this->errors[]="there was no file uploaded here";
             }
             elseif($file['error']!=0){
                 $this->errors[]=$this->upload_error_array[$file['$error']];
                 return false;
             }else{
                 $this->user_image = basename($file['name']);
                 $this->tmp_path = $file['tmp_name'];
                 $this->type     = $file['type'];
                 $this->size     = $file['size'];
             }
         }

         public function upload_photo(){  //edwin save_user_and_image()

                    if(!empty($this->errors)){
                        return false;
                    }
                    if(empty($this->user_image) || empty($this->tmp_path)){
                        $this->errors[]="the file was not avilable";
                        return false;
                    }
                    $target_path=SITE_ROOT. DS . 'admin'. DS .$this->upload_directory . DS . $this->user_image;
                    if(file_exists($target_path)){
                        $this->errors[]="the file {$this->user_image} already exits";
                        return false;
                    }
                    if(move_uploaded_file($this->tmp_path,$target_path)){
                            unset($this->tmp_path);

                    }else{
                        $this->errors[]="the file directory probably does not have permisions";
                        return false;

                    }
                    //$this->create();

        } //end of save_user function



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
            $the_result_array=self::find_by_query($sql);
            return !empty($the_result_array) ? array_shift($the_result_array) :false;

        }
        public function picture_path(){
            return $this->upload_directory.DS.$this->user_image;
        }
        public function delete_user(){
            if($this->delete()){
                $target_path= SITE_ROOT.DS. 'admin'. DS. $this->picture_path();
                return unlink($target_path) ? true : false;
            }else{
                return false;
            }
        }



    }// end of class User

    //$user= new User();
    //$user->properties();

?>

