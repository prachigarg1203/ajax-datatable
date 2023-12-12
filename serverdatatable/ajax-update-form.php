<?php
include("datatable.php");

$stuId = $_POST["id"];
$FName= $_POST["first_name"];
$LName= $_POST["last_name"];
$Email = $_POST["email"];
$Gender= $_POST["gender"];
$Country= $_POST["country"];
$Created= $_POST["created"];
$photo = $_POST["photo"];
// $filename = $_POST["filename"];
// print_r($_POST);
// $conn = new mysqli('localhost','root','','datatable') or die("connect failed: %s\n". $conn->error);
if($photo){
$sql ="UPDATE members SET first_name='{$FName}',last_name='{$LName}',email='{$Email}',gender='{$Gender}',country='{$Country}',created='{$Created}',photo='{$photo}',file_path='images/$photo' WHERE id ={$stuId}";
} else {
$sql = "UPDATE members SET first_name='{$FName}',last_name='{$LName}',email='{$Email}',gender='{$Gender}',country='{$Country}',created='{$Created}' WHERE id ={$stuId}";
}
echo $sql;
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
?>