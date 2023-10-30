<?php
session_start();

if (isset($_GET['id'])) {
    $itemID = $_GET['id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $itemID);
}

header("Location: item.php?id=$itemID");
?>