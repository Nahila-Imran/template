<?php include("config.php");
$idd = $_GET['id'];
$delete_sql = "DELETE FROM products WHERE id = $idd";
$query = $conn->query($delete_sql);
    if($query){?>       
        <script>
            alert("Record Deleted successfully!!!");
            window.location="addMproduct.php";
        </script>
<?php   }else {?>
            <script>
                alert("Error in Record Deletion!!!");
                window.location="addMproduct.php";
            </script>
<?php   }
?>
