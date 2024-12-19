<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../admin/login.php");
    exit();
}

include '../../config/database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM wilayah WHERE id=?");
$stmt->execute([$id]);

header("Location: view_wilayah.php");
exit();
?>