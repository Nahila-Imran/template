<?php 
    include("config.php");

        $sql1 = "SELECT * FROM products";
        $sql2 = "SELECT * FROM tag";

        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);

        if ($result1->num_rows > 0 && $result2->num_rows > 0) 
        {
            while($row1 = $result1->fetch_assoc())
            {
            $product_id = $row1['id']; 
            echo $product_id;
            }
            while($row2 = $result2->fetch_assoc())
            {
            $tag_id = $row2['tid']; 
            echo $tag_id;
            }
        }
        $sql = "INSERT INTO product_tags (`product_id`, `tag_id`) VALUES ('".$product_id."', '".$tag_id."')";
       

        if ($conn->query($sql) === TRUE)
        {
            echo '<script>alert("Products Added Successfully !!!")</script>';
        } 
        else 
        {
            echo '<script>alert("Products not Added in DataBase !!!")</script>';
        }
        header("Location: addMproduct.php");
        $conn->close();
    
    ?>

             