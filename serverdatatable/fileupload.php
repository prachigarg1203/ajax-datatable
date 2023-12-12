<?php

error_reporting(0);
if(isset($_POST['submit'])){
    // echo'<pre>';
    // print_r($_FILES);
    // move_uploaded_file();
    foreach($_FILES['uploadfile']['name']as $key => $val){
        $rand = rand('1111','9999');
        $file = $rand.'_'.$val;
        move_uploaded_file($_FILES['uploadfile']['tmp_name'][$key],'upload/'.$val);
    }
}

?>
<html>
    <head>
        <title>File Upload</title>
    </head>
    <body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile[]" multiple> <br><br>
        <input type="submit" name="submit" value="Upload File">
    </form>
    </body>
</html>
<?php 

// print_r($_FILES["uploadfile"]);
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
// echo $folder; 
move_uploaded_file($tempname, $folder);
echo "<img src='$folder' height='100px' width='100px'>";
?>
