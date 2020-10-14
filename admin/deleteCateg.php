<?php include("config.php");
$idc = $_GET['id'];
echo $idc;
$delete_sql = "DELETE FROM category WHERE cid = $idc";
$query = $conn->query($delete_sql);
    if($query){?>       
        <script>
            alert("Record Deleted successfully!!!");
            window.location="categories.php";
        </script>
<?php   }else {?>
            <script>
                alert("Error in Record Deletion!!!");
                window.location="categories.php";
            </script>
<?php   }
?>
