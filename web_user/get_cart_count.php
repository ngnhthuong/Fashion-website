<?php
session_start();

if(isset($_SESSION['cart'])){
    $cartCount = count($_SESSION['cart']);
} else {
    $cartCount = 0;
}

echo $cartCount;
?>