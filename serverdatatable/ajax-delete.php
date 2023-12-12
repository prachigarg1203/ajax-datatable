<?php
include("datatable.php");
$std_id = $_POST["id"];

// $conn = new mysqli('localhost','root','','datatable') or die("connect failed: %s\n". $conn->error);

$sql ="DELETE FROM members WHERE ID={$std_id}";
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
?>