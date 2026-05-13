<?php

session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require_once "../config/db.php";

$id = $_GET["id"] ?? null;

if ($id) {
    $sql = "DELETE FROM projects WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);
}

header("Location: dashboard.php");
exit;

?>