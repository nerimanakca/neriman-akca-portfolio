<?php

header("Content-Type: application/json");

require_once "../config/db.php";

try {
    $sql = "SELECT id, title, category, description, technologies, github_link, live_demo_link 
            FROM projects 
            ORDER BY created_at DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "projects" => $projects
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Projects could not be loaded."
    ]);
}

?>