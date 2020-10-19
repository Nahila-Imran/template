<?php   
    include("admin/config.php");

    $idd = $_GET['id'];
    $delete_sql = "DELETE FROM cart WHERE id = $idd";
    $query = $conn->query($delete_sql);
        if($query){?>       
            <script>
                alert("Record Deleted successfully!!!");
                window.location="cart.php";
            </script>
    <?php   }else {?>
                <script>
                    alert("Error in Record Deletion!!!");
                    window.location="cart.php";
                </script>
    <?php   }
    ?>
