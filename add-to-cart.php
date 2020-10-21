
<?php 
include("admin/config.php");
if(isset($_POST["pid"]))
{
	$pid= $_POST["pid"];
	$pimage = $_POST["pimage"];
	$pname = $_POST["pname"];
	$pprice = $_POST["pprice"];

	$pqty = 1;
	$sql1 = "SELECT * FROM cart WHERE id = $pid";
	$result1 = $conn->query($sql1);
	if ($result1->num_rows > 0) 
    {
        while($row = $result1->fetch_assoc())
        {
            $id = $row['id']; 
        }
    }
	if(! $id)
	{
		$sql = "INSERT INTO cart (`id`, `name`, `price`, `image`, `qty`, `total_price`) 
			VALUES ('".$pid."', '".$pname."', '".$pprice."', '".$pimage."', '".$pqty."', '".$pprice."' )";
		
		
		if ($conn->query($sql) === TRUE) 
		{
			echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Product added to your cart</strong> 
				</div>';

		}
	}
	else{
		echo '<div class="alert alert-danger alert-dismissible mt-2">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Product already added to your cart</strong> 
			</div>';
		}
	}
	if(isset($_POST['qty']))
	{
		$qty= $_POST["qty"];
		$id= $_POST["id"];
		$price= $_POST["price"];
		$total_price= ($qty * $price);
	
		$sl1 = "UPDATE cart SET qty='$qty', total_price='$total_price' WHERE id=$id";
		$run = $conn->query($sl1);
	}
	if(isset($_POST['cartItem']) && isset($_POST['cartItem']) == 'cart_item')
	{
		$sql2 = "SELECT * FROM cart";
		$res = $conn->query($sql2);
		$rows = $res->num_rows;
		echo $rows;
	}
	
?>
	

	