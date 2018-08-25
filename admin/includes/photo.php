<?php

class Photo extends Db_object{
    protected static $db_table="photos";
    protected static $db_table_field=array('photo_id','title','description','filename','type','size');
  
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory="images";
    public $custom_error=array();
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

}


?>