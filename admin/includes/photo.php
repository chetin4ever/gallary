<?php

class Photo extends Db_object{
    protected static $db_table="photo"
    protected static $db_table_field=array('photo_id','title','description','filename','type','size');
    
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
}


?>