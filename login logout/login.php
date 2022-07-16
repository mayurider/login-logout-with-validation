<?php
$con = mysqli_connect("localhost","root","","mydb") or die("connection failed");
session_start();
if(isset($_REQUEST["loginbtn"]))
{
    $user=$_REQUEST["registered_email"];
    $pass=$_REQUEST["registered_pass"];
    $query="select * from reg where email='$user' && password='$pass'";
    $result= mysqli_query($con, $query);
    $rowcount=mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0)
    {

       while($row = mysqli_fetch_assoc($result)){

        $_SESSION['fname']=$row['f_name'];
        $_SESSION['lname']=$row['l_name'];
        $_SESSION['email']=$row['email'];
        $_SESSION['password']=$row['password'];
       
        header("location:Dashboard.php");
       } 
        
    }
    else
    {
        
        echo "<p>invalid email or password</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body>
    <div class="container">

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
        <div class="row">
            email : <input type="email" name="registered_email" placeholder="email">
        </div>
        <div class="row">
            email : <input type="password" name="registered_pass" placeholder="password">
        </div>
        <input type="submit" name="loginbtn" value="login">
    </form>
    </div>
    
</body>
</html>