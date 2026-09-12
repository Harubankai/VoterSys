<?php
session_start();


if (isset($_SESSION['voter'])) {
    unset($_SESSION['voter']); 
}


session_regenerate_id(true);


header('location: index.php');
exit();
?>