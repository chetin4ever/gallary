<?php

class Photo extends Db_object{
    protected static $db_table="photos";
    protected static $db_table_field=array('id','title','caption','description','filename','alternate_text','type','size');


    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
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
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
        }
    }
    public function picture_path(){
        return $this->upload_directory.DS.$this->filename;
    }
    public function save(){
        if ($this->id){
            $this->update();
        }
        else{

                if(!empty($this->errors)){
                    return false;
                }
                if(empty($this->filename) || empty($this->tmp_path)){
                    $this->errors[]="the file was not avilable";
                    return false;
                }
                $target_path=SITE_ROOT. DS . 'admin'. DS .$this->upload_directory . DS . $this->filename;
                if(file_exists($target_path)){
                    $this->errors[]="the file {$this->filename} already exits";
                    return false;
                }
                if(move_uploaded_file($this->tmp_path,$target_path)){
                    if($this->create()){
                        unset($this->tmp_path);
                        return true;
                    }

                }else{
                    $this->errors[]="the file directory probably does not have permisions";
                    return false;

                }
                //$this->create();
        }
    } //end of save function
    public function delete_photo(){
        if($this->delete()){
            $target_path= SITE_ROOT.DS. 'admin'. DS. $this->picture_path();
            return unlink($target_path) ? true : false;
        }else{
            return false;
        }
    }

}// r=end of class


?>
