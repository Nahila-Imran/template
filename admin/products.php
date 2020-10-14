<?php 
//	include('header.php'); 
//  include('sidebar.php');
    include("config.php");

    if(isset($_POST['submit'])) {
    
        $name = isset($_POST['pname'])?$_POST['pname']:'';
        $price = isset($_POST['pprice'])?$_POST['pprice']:'';
        $image = isset($_POST['filename'])?$_POST['filename']:'';
        $description = isset($_POST['describe'])?$_POST['describe']:'';

        $cname = $_POST['category'];
        $tagname = $_POST['tags_name'];

        $sql = "SELECT * FROM category";
		$result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
            $cid = $row['cid']; 
            echo $cid;
            }
        }
        $sql1 = "INSERT INTO products (`category_id`, `name`, `price`, `image`, `description`) VALUES ('".$cid."', '".$name."', '".$price."', '".$image."', '".$description."')";
        $sql2 = "INSERT INTO category (`name`) VALUES ('".$cname."')";
        $sql3 = "INSERT INTO tag (`name`) VALUES ('".$tagname."')";

        if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE)
        {
            echo '<script>alert("Products Added Successfully !!!")</script>';
        } 
        else 
        {
            echo '<script>alert("Products not Added in DataBase !!!")</script>';
        }
        header("Location: addMproduct.php");
        $conn->close();
    }
    ?>

                
                