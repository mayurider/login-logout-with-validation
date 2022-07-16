<?php
session_start();
$emailll =$_SESSION['email'];
$filename = $_FILES["pp"]["name"];
$tempname = $_FILES["pp"]["tmp_name"];
$folder = "./images/" .$filename; 
$fn = $_REQUEST['fn'];
$ln = $_REQUEST['ln'];
$email = $_REQUEST['email'];
$gender = $_REQUEST['gender'];
$hobby = $_REQUEST['hobby'];

 $con = mysqli_connect("localhost","root","","mydb") or die("connection failed");

 $query = "update reg set f_name = '{$fn}', l_name = '{$ln}', gender = '{$gender}', hobbies = '{$hobby}', profile_photo = '{$filename}' where email = '{$emailll}'";
 $result = mysqli_query($con, $query) or die("query unsuccessful");

 if(move_uploaded_file($tempname, $folder)){
    echo "image uploaded successfully"; 
    header("Location: editinfo.php");
    mysqli_close($con);
}
else{
    echo "failed to upload image";
}
header("Location: editinfo.php");
mysqli_close($con);
?>