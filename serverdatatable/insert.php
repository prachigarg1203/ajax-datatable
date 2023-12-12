<?php  
 //insert.php  

echo '<pre>';
print_r($_POST);
echo '</pre>';

// die();
 $connect = mysqli_connect("localhost", "root", "", "datatable");  



//  if(isset($_POST["first_name"]))  
//  {  
//    // print_r($_POST); //die();
//    $targetDir = "images/"; 
//    $allowTypes = array('jpg','png','jpeg','gif'); 
    
//    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
//    $fileNames = array_filter($_FILES['uploadfile']['name']); 
//    if(!empty($fileNames)){ 
//        foreach($_FILES['uploadfile']['name'] as $key=>$val){ 
//            // File upload path 
//            $fileName = basename($_FILES['uploadfile']['name'][$key]); 
//            $targetFilePath = $targetDir . $fileName; 
            
//            // Check whether file type is valid 
//            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
//            if(in_array($fileType, $allowTypes)){ 
//                // Upload file to server 
//                if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"][$key], $targetFilePath)){ 
//                    // Image db insert sql 
//                    $insertValuesSQL .= "('".$fileName."', NOW()),"; 
//                }else{ 
//                    $errorUpload .= $_FILES['uploadfile']['name'][$key].' | '; 
//                } 
//            }else{ 
//                $errorUploadType .= $_FILES['uploadfile']['name'][$key].' | '; 
//            } 
//        } 
        
//       }
//    $filename = $_FILES["uploadfile"]["name"];
//    if($filename){
//    $tempname = $_FILES["uploadfile"]["tmp_name"];
//    $folder = "images/".$filename; 
//    move_uploaded_file($tempname, $folder);
  //  $photo = mysqli_real_escape_string($connect,$filename);
  //  }
    // else
    // {
//      $photo = '';
//    }
  // }
       if(isset($_POST["first_name"])) {  
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "images/".$filename;
                // echo $folder; 
                move_uploaded_file($tempname, $folder);
               if (!is_uploaded_file($_FILES['name']['tmp_name'])) 
                {
                  $filename = rand(1000,10000).$folder;
                    echo 'No upload';
                }
                else
                  {
                      //  echo 'No upload';

                    // Your file has been uploaded
                  }
//    $fname =  $_POST["first_name"];
      $fname = mysqli_real_escape_string($connect, $_POST["first_name"]);  
      $lname = mysqli_real_escape_string($connect, $_POST["last_name"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
      $country = mysqli_real_escape_string($connect, $_POST["country"]);
      $created = mysqli_real_escape_string($connect, $_POST["created"]);

      $query = "INSERT INTO members (photo,file_path,first_name,last_name,email,gender,country,created) VALUES ('".$filename."','".$folder."','".$fname."','".$lname."', '".$email."', '".$gender."', '".$country."', '".$created."')";  
      echo $query;
     
      if(mysqli_query($connect, $query))  

      {  
           echo '<p>You have entered</p>'; 
           echo '<p>photo:'.$filename.'</p>';
           echo '<p>file_path:'.$file_path.'</p>';
           echo '<p>first_name:'.$fname.'</p>';
           echo '<p>last_name:'.$lname.'</p>';    
           echo '<p>email : '.$email.'</p>';
           echo '<p>gender : '.$gender.'</p>';
           echo '<p>country : '.$country.'</p>';
           echo '<p>created : '.$created.'</p>';
          //  echo '<p>file : '.$file.'</p>';
           
           $res = array('status'=>'success', 'msg'=>'successfull');
           
      }  else {
          $res = array('status'=>'error', 'msg'=>'Failed');
      }

      echo json_encode($res);
 }  
 ?>