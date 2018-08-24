<?php
    if(isset($_POST['submit'])){
        echo"<pre>";
        print_r($_FILES['upload']);
        echo"</pre>";

        $upload_error= array(

            UPLOAD_ERR_OK         => 'Their is no error',
            UPLOAD_ERR_INI_SIZE   => 'The upload file Exceeds the UPLOAD_MAX_SIZE Directive in php.ini file',
            UPLOAD_ERR_FORM_SIZE  => 'The upload file Exceeds the MAX_FILE_SIZE Directive in php.ini file',
            UPLOAD_ERR_PARTIAL    => 'The uploaded file was only partially uploaded',
            UPLOAD_ERR_NO_FILE    => 'No file was Uploaded',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
            UPLOAD_ERR_EXTENSION  => 'A PHP extension stopped the file Upload',
        );

        $tmp_name=$_FILES['upload']['tmp_name']; // temp path on server
        $the_file=$_FILES['upload']['name']; // file name
        $directory="uploads"; //directory 
        //echo $tmp_name ."<br>".$the_file;

        if(move_uploaded_file($tmp_name,$directory."/".$the_file)){
           $the_messeage="File Uploaded Sucessfully";
        }
        else{
            $the_error=$_FILES['upload']['error'];
            $the_messeage=$upload_error[$the_error];
        }
        
        
    }

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>
        <?php
        if(!empty($upload_error)){
            echo $the_messeage;
        }
        ?>
    </h2>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data" method="post">
        <legend>Form title</legend>
    
        <div class="form-group">
            <label for="">Upload file</label>
            <input type="file" class="form-control" id="" placeholder="Input field" name="upload">
        </div>
    
        
    
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    
</body>
</html>