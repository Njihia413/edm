<?php
session_start();

function redirect($location)
{
    return header("Location: " . $location);
}

if (!isset($_SESSION['voter_id']) or !isset($_SESSION['name'])) {
    header('Location: auth/login.php');
    exit;
} else {
    header('Location: admin/index.php');
    exit;
}
