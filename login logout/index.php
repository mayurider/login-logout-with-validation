<?php
if(isset($_POST['sbtn'])){
    $password = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);


    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 || $password != $cpass) {
        echo '<div style="color:red;">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character
        password should match to confirm password.</div>';
    }
    else
    {
        $filename = $_FILES["uploadimg"]["name"];
        $tempname = $_FILES["uploadimg"]["tmp_name"];
        $folder = "./images/" .$filename; 
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $hobby = $_POST['hobby'];
        $pass = $_POST['pass'];
        $hob = implode(",",$hobby);
        $con = mysqli_connect("localhost","root","","mydb") or die("connection failed");
        $query = "insert into reg(f_name,l_name,email,gender,hobbies,password,profile_photo) values ('{$fname}','{$lname}','{$email}','{$gender}','{$hob}','{$pass}','{$filename}')";
        $result = mysqli_query($con, $query) or die("query unsuccessful");
        if(move_uploaded_file($tempname, $folder)){
            echo "image uploaded successfully"; 
            header("Location: login.php");
            mysqli_close($con);
        }
        else{
            echo "failed to upload image";
        }
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reg form</title>
    <style>
        .box{

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;

        }
        .container{
            display: flex;
            margin-bottom:10px ;
            
        }
       
        
       
    </style>
</head>
<body>
    <div class="box">
        
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h1>registration form</h1>
            <div class="container">
            first name: <input type="text" placeholder="enter your name" name="fname">
            </div>
           <div class="container">
            last name: <input type="text" placeholder="enter our last name" name="lname" >
            </div> 
            <div class="container">email : <input type="email" placeholder="enter your email" name="email">
            </div>
            <div class="container"> gender : <input type="radio" name="gender" value="MALE">MALE
            <input type="radio" name="gender" value="FEMALE">FEMALE
            </div>
            <div class="container"> hobbiies : <input type="checkbox" name="hobby[]" value="dance">dancing <input type="checkbox" name="hobby[]" value="singingi">singing
            </div>
            <div class="container">password :
                 <input type="password" id="pass" name="pass" placeholder="password">
            confirm password : <input type="password" name="cpass" placeholder="confirm your password">
            </div>
            <div class="container"> profile picture : <input type="file" name="uploadimg" >
    </div>
     <input type="submit" value="submit" name="sbtn" id="sbmit">
        </form>
    </div>   


</body>
</html>