<?php 
	include('header.php'); 
	include('sidebar.php');
    include("config.php");
     
    if(isset($_POST['update'])) {
        $idUp = $_GET['id'];

        $username = $_POST['username'];
        $role = $_POST['role'];
    	$password = $_POST['password'];
        $email = $_POST['email'];

        $sl1 = "UPDATE users SET username='$username', role='$role', password='$password', email='$email' WHERE user_id=$idUp";
        $run = $conn->query($sl1);
        if ($run) {
        ?>       
        <script>
            alert("Record updated successfully!!!");
            window.location="users.php";
        </script>
    <?php       
        }else {?>
            <script>
                alert("Error in Record updation");
                window.location="users.php";
            </script>
    <?php   
        }
    }?> 
<?php     
    $ids = $_GET['id'];
    $sl2 = "SELECT * FROM users WHERE user_id=$ids";
    $res = mysqli_query($conn, $sl2);
    $data = mysqli_fetch_assoc($res);
    ?>   
    <div id="main-content">
    <div class="content-box-header">
    <h3>Users Updation</h3>
    <div class="clear"></div>
    </div>
    <div class="content-box-content">
        <div class="tab-content" id="tab2">
        <form action="" method="post">
			<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
				<p>
					<label>Username</label>
					<input class="text-input medium-input datepicker" type="text" id="medium-input" name="username" value="<?php echo $data['username'];?>" />  <!-- Classes for input-notification: success, error, information, attention -->
				</p>
				<p>
                    <label>Role</label>              
					<select name="role" class="small-input">
						<option value="Admin">Admin</option>
						<option value="Users">Users</option>
						<option value="Manager">Manager</option>
						<option value="Supervisor">Supervisor</option>
					</select>
				</p>
				<p>
                    <label>E-mail</label>
					<input class="text-input small-input" type="text" id="small-input" name="email" value="<?php echo $data['email'];?>"/>
				</p>
				<p>
					<label>Password</label>
					<input class="text-input small-input" type="text" id="small-input" name="password" value="<?php echo $data['password'];?>"/> 
				</p>
                <p>
					<input class="button" type="submit" name= "update" value="Update" />
				</p>
			</fieldset>
			<div class="clear"></div><!-- End .clear -->
		</form>
    </div> <!-- End #tab2 -->        
</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->
<div class="clear"></div>
