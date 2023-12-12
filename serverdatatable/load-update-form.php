<?php
include("datatable.php");
$stdId = $_POST["id"];
$sql = "SELECT * FROM members WHERE id={$stdId}";
$res =  mysqli_query($conn,$sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
       $output=" <tr>
                    <td>Name</td><td><input type='text' id='edit-fname'
                    value='{$row["first_name"]}'></td>
                    <input type='hidden' id='edit-id'  
                    value='{$row["id"]}'>
                </tr>
                <tr>
                <td>Name</td><td><input type='text' id='edit-lname'
                    value='{$row["last_name"]}'></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type='email' id='edit-email'
                    value='{$row["email"]}'></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type='text' id='edit-gender'
                    value='{$row["gender"]}'></td>
                </tr>
                <tr>
                <td>Country</td><td><input type='text' id='edit-country'
                    value='{$row["country"]}'></td>
                </tr>
                <tr>
                <td>Created</td><td><input type='text' id='edit-created'
                value='{$row["created"]}'></td>
                </tr>
                <tr>
                if(){
                <td>File</td><td><input type='file' id='edit-file'
                value='{$row["photo"]}'></td>
                </tr>
                }
                <tr>
                    <td></td>
                    <td><input type='submit' id='edit-submit' value='save'></td>
                </tr>";  
}
mysqli_close($conn);
echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>