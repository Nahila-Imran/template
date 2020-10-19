<?php 
    include('header.php'); 
    include('sidebar.php');
    include("config.php"); 
?>
<?php   
    if(isset($_POST['update'])) {
        $idUp = $_GET['id'];
        echo $idUp;

        $name = $_POST['pname'];
        $price = $_POST['pprice'];
        $image = $_POST['filename'];
        $descript = $_POST['describe'];
        $tagname = $_POST['tags_name'];
        $color = $_POST['pcolor'];
        echo $color;

        $sl1 = "UPDATE products SET name='$name', price='$price', image='$image', color='$color', tagname='$tagname', description='$descript' WHERE id=$idUp";
        
        $run = $conn->query($sl1);
       

        if ($run) {
        ?>       
        <script>
            alert("Record updated successfully!!!");
            window.location="addMproduct.php";
        </script>
    <?php       
        }else {?>
            <script>
                alert("Error in Record updation");
                window.location="addMproduct.php";
            </script>
    <?php   
        }
    }?> 
<?php   
            $ids = $_GET['id'];
            echo $ids;
            $sl2 = "SELECT * FROM products WHERE id=$ids";
            $res = mysqli_query($conn,$sl2);
            $data = mysqli_fetch_assoc($res);
?>   
        <div id="main-content">
        <div class="content-box-header">
            <h3>Updation</h3>
            <div class="clear"></div>
        </div>
            <div class="content-box-content">
                <div class="tab-content" id="tab2">
                    <form action="" method="POST">
                        <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                            <p>
                                <label>Name</label>
                                <input class="text-input medium-input datepicker" type="text" id="medium-input" name="pname" value="<?php echo $data['name'];?>" />  <!-- Classes for input-notification: success, error, information, attention -->
                            </p>
                            <p>
                                <label>Price</label>
                                <input class="text-input small-input" type="text" id="small-input" name="pprice" value="<?php echo $data['price'];?>" /> 
                            </p>
                            <p>
                                <label>Image</label>
                                <input class="text-input small-input" type="file" id="small-input" id="myFile"  name="filename" value="<?php echo $data['image'];?>">
                                <?php echo $data['image'];?>
                            </p>
                            <p>
								<label>Colour</label>
                                <input class="text-input small-input" type="text" id="small-input" name="pcolor"  value="<?php echo $data['color'];?>" /> 
							</p>
                            <p>
									<label>Tags</label>
									<input type="checkbox" name="tags_name" value="Fashion"/> Fashion
									<input type="checkbox" name="tags_name" value="Ecommerce"/> Ecommerce
									<input type="checkbox" name="tags_name" value="Shop"/> Shop
									<input type="checkbox" name="tags_name" value="Hand Bag" /> Hand Bag
									<input type="checkbox" name="tags_name" value="Laptop" /> Laptop
									<input type="checkbox" name="tags_name" value="Headphone"/> Headphone
								</p>
                            <p>
                                <label>Description</label>
                                <textarea class="text-input textarea wysiwyg" id="textarea" name="describe" value="<?php echo $data['description'];?>" cols="79" rows="15"></textarea>
                            </p>
                            <p>
                                <a href="updates.php?id=<?php echo $data['id'];?>"><input type="submit" name="update" class="button" value="Update"></a>
                            </p>
                            </fieldset>
                        <div class="clear"></div><!-- End .clear -->
                    </form>
                </div> <!-- End #tab2 -->        
            </div> <!-- End .content-box-content --> 
        </div>    
    <div class="clear"></div>
