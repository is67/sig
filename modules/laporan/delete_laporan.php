<?php
include '../../config/database.php';

$id = $_GET['id'];

$query = "DELETE FROM laporan WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);

header("Location: view_laporan.php");
exit();
?> 