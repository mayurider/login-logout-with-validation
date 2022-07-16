<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>your dashboard</title>
</head>
<body>
    <header>
        <nav>
            <h4><a href="editinfo.php">edit your info</a></h4>
            <h4><a href="changepass.php">change password</a></h4>
            <h4><a href="logout.php">logout</a></h4>
        </nav>
    </header>
    <section>
    <h1>welcome <?php session_start();echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h1>
    </section>
</body>
</html>