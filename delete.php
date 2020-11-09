<?php
    session_start();
    include "./config/database.php";
    $id = $_GET['d_id'];
    $delete = "DELETE FROM user_db where user_id='$id'";
    if ($conn->query($delete)) {
        mysqli_close($conn);
        header('Location: dashboard.php'); 
        exit();
    } else {
        echo "Error deleting record";
    }

?>