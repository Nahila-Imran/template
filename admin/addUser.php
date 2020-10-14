<?php 
    include("config.php");

    if(isset($_POST['submit'])) {
    
        $username = $_POST['username'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $EncryptPassword = md5($password);
        $email = $_POST['email'];

        $sql = "INSERT INTO users ( `username`, `password`, `email`, `role`) VALUES ('".$username."', '".$EncryptPassword."', '".$email."', '".$role."')";
       
        if ($conn->query($sql) === TRUE)
        {
            echo '<script>alert("Products Added Successfully !!!")</script>';
        } 
        else 
        {
            echo '<script>alert("Products not Added in DataBase !!!")</script>';
        }
        header("Location: users.php");
        $conn->close();
    }
    ?>

                