<?php 
	include('header.php'); 
	include('sidebar.php');
    include("config.php");
     
    if(isset($_POST['update'])) {
        $idUp = $_GET['id'];
        $cname = $_POST['category'];

        $sl1 = "UPDATE category SET name='$cname' WHERE cid=$idUp";
        $run = $conn->query($sl1);
        if ($run) {
        ?>       
        <script>
            alert("Record updated successfully!!!");
            window.location="categories.php";
        </script>
    <?php       
        }else {?>
            <script>
                alert("Error in Record updation");
                window.location="categories.php";
            </script>
    <?php   
        }
    }?> 
<?php   
            $ids = $_GET['id'];
            $sl2 = "SELECT * FROM categories WHERE cid=$ids";
            $res = mysqli_query($conn, $sl2);
            $data = mysqli_fetch_assoc($res);
?>   
        <div id="main-content">
        <div class="content-box-header">
            <h3>Category's Updation</h3>
            <div class="clear"></div>
        </div>
            <div class="content-box-content">
                <div class="tab-content" id="tab2">
                    <form action="" method="POST">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Category</label>              
									<select name="category" class="small-input">
										<option value="Men">Men</option>
										<option value="Women">Women</option>
										<option value="Kids">Kids</option>
										<option value="Electronics">Electronics</option>
										<option value="Sports">Sports</option>
									</select>
								</p>
								<p>
                                <a href="editCateg.php?id=<?php echo $data['id'];?>"><input type="submit" name="update" class="button" value="Update" /></a>
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div> <!-- End #tab2 -->        
				</div> <!-- End .content-box-content -->
			</div> <!-- End .content-box -->
		<div class="clear"></div>
			
			