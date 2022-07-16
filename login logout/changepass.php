<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            password =<input type="password" name="curpass">
        </div>
        <div>
            change password =<input type="password" name="pass">
        </div>
        <div>
           confirm change password =<input type="password" name="cpass">
        </div>
        <input type="submit" name="changebtn" value="change">
        </form>
        <?php
            if(isset($_POST['changebtn'])){
                session_start();
                $emailll =$_SESSION['email'];
                $curpass = $_POST['curpass'];
                $changepass = $_POST['pass'];
                $confirm =$_POST['cpass'];
                $con = mysqli_connect("localhost","root","","mydb") or die("connection failed");
                $query = "select password from reg where email= '{$emailll}'";
                $result = mysqli_query($con, $query) or die("query unsuccesful");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $pass = $row['password'];
                    }
                }

                if($curpass != $pass)
                {
                    echo "please enter your current password right first";
                }
                else
                {
                    if($changepass == $confirm)
                    {
                        $query1 = "update reg set password = '{$changepass}' where email = '{$emailll}'";
                        mysqli_query($con, $query1) or die("query unsuccessful"); 
                        header("Location: Dashboard.php");
                    }
                    else
                    {
                        echo "<h3>confirm password and change password are not equals</h3>";                
                    }
                }      
            }
        ?>
</body>
</html>