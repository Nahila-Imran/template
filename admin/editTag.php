<?php 
	include('header.php'); 
	include('sidebar.php');
    include("config.php");
     
    if(isset($_POST['update'])) {
        $idUp = $_GET['id'];
        $tagname = $_POST['tags_name'];

        $sl1 = "UPDATE tag SET name='$tagname' WHERE tid=$idUp";
        $run = $conn->query($sl1);
        if ($run) {
        ?>       
        <script>
            alert("Record updated successfully!!!");
            window.location="tags.php";
        </script>
    <?php       
        }else {?>
            <script>
                alert("Error in Record updation");
                window.location="tags.php";
            </script>
    <?php   
        }
    }?> 
<?php     
    $ids = $_GET['id'];
    $sl2 = "SELECT * FROM tags WHERE tid=$ids";
    $res = mysqli_query($conn, $sl2);
    $data = mysqli_fetch_assoc($res);
    ?>   
    <div id="main-content">
    <div class="content-box-header">
    <h3>Tag's Updation</h3>
    <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content" id="tab2">
            <form action="" method="POST">
                    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
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
                        <a href="editTag.php?id=<?php echo $data['tid'];?>"><input type="submit" name="update" class="button" value="Update" /></a>
                        </p>
                    </fieldset>
                    <div class="clear"></div><!-- End .clear -->
                </form>
            </div> <!-- End #tab2 -->        
        </div> <!-- End .content-box-content -->
    </div> <!-- End .content-box -->
    <div class="clear"></div>

        