<?php
    class Db_object{

        public static function find_all(){
            $result_set=static::find_by_query("SELECT * FROM ". static::$db_table ." ");
              return($result_set);
          }
    
        public static function find_by_id($user_id){
         //print $user_id;
            global $database;
            $the_result_array=static::find_by_query("select * from " .static::$db_table. " where id=$user_id");
          //print $the_result_array;
            return !empty($the_result_array) ? array_shift($the_result_array) :false;
            //return $found_user;
        }

        public static function find_by_query($sql){
            global $database;
            //print $sql;
            $the_object_array= array();
            
            $result_set=$database->query($sql);
            //print_r($result_set);
            while($row=mysqli_fetch_array($result_set)){
                $the_object_array[]=static::instantation($row);
            }
            return $the_object_array;
        }

        public static function instantation($the_record){
            $calling_class=get_called_class();
           // print $calling_class;
            $obj= new $calling_class;
            /*$obj->id=$found_user['id'];
            $obj->username=$found_user['username'];
            $obj->password=$found_user['password'];
            $obj->first_name=$found_user['first_name'];
            $obj->last_name=$found_user['last_name'];*/
            foreach ($the_record as $the_attribute => $value) {     
                
                if($obj->has_the_attribute($the_attribute)){
                    $obj->$the_attribute=$value;
                }
            }
            return $obj;
        }

        private function has_the_attribute($the_attribute){
            $object_properties=get_object_vars($this);
            return array_key_exists($the_attribute,$object_properties);
        }

        public function properties(){
            //return get_object_vars($this);
            //echo implode(",",array_keys($properties));
           /*  echo "<pre>";
            print_r($temp);
            echo "<pre>"; */
             $properties=array();
             foreach (static::$db_table_field as $db_field) {
                 $properties[$db_field]= $this->$db_field;
             }
             return $properties;
         }//end of method properties
 
         protected function clean_properties(){
             global $database;
             $clean_properties=array();
             foreach ($this->properties() as $key => $value) {
                 $clean_properties[$key]=$database->escape_string($value);
             }
             return $clean_properties;
         }
         public function create(){
              global $database;
             /*$sql = "INSERT INTO " .static::$db_table. "(username,password,first_name,last_name)";
             $sql.= "VALUES('";
             $sql.= $database->escape_string($this->username)."','";
             $sql.= $database->escape_string($this->password)."','";
             $sql.= $database->escape_string($this->first_name)."','";
             $sql.= $database->escape_string($this->last_name)."')";
              */
             $properties=$this->clean_properties();
             $sql = "INSERT INTO " .static::$db_table. "(". implode(" , ",array_keys($properties)).")";
             $sql.= "VALUES('".implode("','",array_values($properties))."')";   
             if($database->query($sql)){
                 $this->id=$database->the_insert_id();
                 return true;
             }
             else{
                 return false;
             }
         }//end og create
 
 
         
         public function update(){
             global $database;
             $properties=$this->clean_properties();
             $properties_pairs=array();
             foreach ($properties as $key => $value) {
                 $properties_pairs[]="{$key}='{$value}'";
             }
             $sql="UPDATE " .static::$db_table. " SET ";
             $sql.=implode(", ",$properties_pairs);
             $sql.=" WHERE id=".$database->escape_string($this->id);
             echo $sql;
             $database->query($sql);
 
             return (mysqli_affected_rows($database->connection)==1) ? true : false;
             /*
             $sql="UPDATE " .static::$db_table. " SET ";
             $sql.="username='".$database->escape_string($this->username)."', ";
             $sql.="password='".$database->escape_string($this->password)."', ";
             $sql.="first_name='".$database->escape_string($this->first_name)."', ";
             $sql.="last_name='".$database->escape_string($this->last_name)."' ";
             $sql.=" WHERE id=".$database->escape_string($this->id); 
             //print $sql;
             $database->query($sql);
             return (mysqli_affected_rows($database->connection)==1) ? true : false;
             */
         }//end of update
         
         public function delete(){
             global $database;
             $sql="DELETE FROM " .static::$db_table;
             $sql.=" WHERE id=".$database->escape_string($this->id);
             $sql.=" LIMIT 1";
             $database->query($sql);
             return (mysqli_affected_rows($database->connection)==1) ? true :false;
             print $sql;
         }
 
         public function save(){
             return isset($this->id) ? $this->update() : $this->create();
         }

    
    




    } // end of class  
     



?>