<?php include("config.php");
$idd = $_GET['id'];
$delete_sql = "DELETE FROM tag WHERE tid = $idd";
$query = $conn->query($delete_sql);
    if($query){?>       
        <script>
            alert("Record Deleted successfully!!!");
            window.location="tags.php";
        </script>
<?php   }else {?>
            <script>
                alert("Error in Record Deletion!!!");
                window.location="tags.php";
            </script>
<?php   }
?>
