<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../admin/login.php");
    exit();
}

include '../../config/database.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM penduduk WHERE id=?");
$stmt->execute([$id]);

header("Location: view_penduduk.php");
exit();
?>