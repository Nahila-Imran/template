<?php 
    include("admin/config.php");
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "order")
        {
            $payMethod= isset($_POST['payMethod'])?$_POST['payMethod']:'';
            $subtotal = 0;
            $jsonData = array();
            $sql = "SELECT * FROM cart";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    $data= $row;
                    $subtotal= ($subtotal + ($row["total_price"])) ;
            
                    $date = date('F d, Y, g: i a');
                    $jsonData = json_encode($data);
                    
                    $sql = "INSERT INTO orders (cartdata, total, status, datetime) VALUES ('$jsonData', '$subtotal', '$payMethod', '$date')";
                    if ($conn->query($sql) === TRUE) {
                        echo '<script>alert("Inserted your order-summary successfully!!!")</script>';
                    } 
                }
            }
        }
    }         
?>  <div style ="margin-top: 8%;">
        <div style ="text-align: center;">
            <h1 style="color: #4CAF50;">Your Order Has Been Placed</h1>
                <p style="color: #3e9cbf ;">Thank you !!! for ordering with us, we'll contact you by email with your order details.</p>
                <div style ="margin-top: 3%;">
                    <h4 style="color: gray;"><b>Delivery Charge :</b>Free</h6>
                    <h3 style="color: gray;"><b>Amount Payable : </b>$<?php echo $subtotal?>.00</h5>
                </div>
            </div>
        </div>

                
            
                        
                