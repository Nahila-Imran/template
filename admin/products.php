<?php 
//	include('header.php'); 
//  include('sidebar.php');
    include("config.php");

    if(isset($_POST['submit'])) {
    
        $name = isset($_POST['pname'])?$_POST['pname']:'';
        $price = isset($_POST['pprice'])?$_POST['pprice']:'';
        $image = isset($_POST['filename'])?$_POST['filename']:'';
        $description = isset($_POST['describe'])?$_POST['describe']:'';

        $color = $_POST['pcolor'];
        $cname = $_POST['category'];
        $tagname = $_POST['tags_name'];

        $sql1 = "SELECT * FROM category";
		$result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) 
        {
            while($row1 = $result1->fetch_assoc())
            {
            $cid = $row1['cid']; 
            }
        }

        $sql2 = "SELECT * FROM products";
		$result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc())
            {
            $pid = $row2['id']; 
            }
        }

        $sql1 = "INSERT INTO products (`category_id`, `name`, `price`, `image`, `description`, `color`, `tagname`) VALUES ('".$cid."', '".$name."', '".$price."', '".$image."', '".$description."', '".$color."', '".$tagname."')";
        $sql2 = "INSERT INTO category (`name`) VALUES ('".$cname."')";
        $sql3 = "INSERT INTO tag (`name`) VALUES ('".$tagname."')";
        $sql4 = "INSERT INTO colors (`product_id`, `color`) VALUES ('".$pid."', '".$color."')";


        if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE)
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

                
                