<?php
session_start();
            $emailll =$_SESSION['email'];
            $con = mysqli_connect("localhost","root","","mydb") or die("connection failed");
            $query = "select * from reg where email= '{$emailll}'";
            $result = mysqli_query($con, $query) or die("query unsuccesful");
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
    <form action="updatedata.php" method="post" enctype="multipart/form-data">
    <img src="./images/<?php  echo $row['profile_photo'];?>" alt="" style="height:150px; width:150px;">
        <div>
            <input type="text" value="<?php echo $row['f_name']; ?>" name="fn" >
        </div>
        <div>
            <input type="text" value="<?php echo $row['l_name']; ?>" name="ln" >
        </div>
       
        <div>
            <input type="text" value="<?php echo $row['gender']; ?>" name="gender" >
        </div>
        <div>
            <input type="text" value="<?php echo $row['hobbies']; ?>" name="hobby" >
        </div>
        <div>
            <input type="file" value="<?php echo $row['profile_photo']; ?>" name="pp" >
        </div>

        <button type="submit">update</button>
    </form>
    <?php
                }    
            }
        
 ?>
    </div>
</body>
</html>