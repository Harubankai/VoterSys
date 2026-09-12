<?php
session_start();


if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']); 
}


session_regenerate_id(true);


header('location: index.php');
exit();
?>