<?php

session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require_once "../config/db.php";

$error = "";
$success = "";

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: dashboard.php");
    exit;
}

$sql = "SELECT * FROM projects WHERE id = :id LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ":id" => $id
]);

$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = trim($_POST["title"] ?? "");
    $category = trim($_POST["category"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $technologies = trim($_POST["technologies"] ?? "");
    $github_link = trim($_POST["github_link"] ?? "");
    $live_demo_link = trim($_POST["live_demo_link"] ?? "");

    if (empty($title) || empty($category) || empty($description) || empty($technologies)) {
        $error = "Title, category, description and technologies are required.";
    } else {
        try {
            $updateSql = "UPDATE projects
                          SET title = :title,
                              category = :category,
                              description = :description,
                              technologies = :technologies,
                              github_link = :github_link,
                              live_demo_link = :live_demo_link
                          WHERE id = :id";

            $updateStmt = $conn->prepare($updateSql);

            $updateStmt->execute([
                ":title" => $title,
                ":category" => $category,
                ":description" => $description,
                ":technologies" => $technologies,
                ":github_link" => $github_link,
                ":live_demo_link" => $live_demo_link,
                ":id" => $id
            ]);

            $success = "Project updated successfully.";

            $stmt->execute([
                ":id" => $id
            ]);
            $project = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $error = "Project could not be updated.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Project | Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<header class="header">
    <nav class="navbar">
        <div class="logo">Admin<span>Panel</span></div>

        <ul class="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="../index.php">Portfolio</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main class="section">

    <h2 class="section-title">Edit Project</h2>

    <?php if (!empty($error)): ?>
        <p class="admin-error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="admin-success"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <form method="POST" class="contact-form">

        <div class="form-group">
            <label for="title">Project Title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                value="<?php echo htmlspecialchars($project["title"]); ?>"
            >
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="web" <?php if ($project["category"] === "web") echo "selected"; ?>>Web</option>
                <option value="database" <?php if ($project["category"] === "database") echo "selected"; ?>>Database</option>
                <option value="ai" <?php if ($project["category"] === "ai") echo "selected"; ?>>AI</option>
                <option value="network" <?php if ($project["category"] === "network") echo "selected"; ?>>Network</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Project Description</label>
            <textarea id="description" name="description" rows="5"><?php echo htmlspecialchars($project["description"]); ?></textarea>
        </div>

        <div class="form-group">
            <label for="technologies">Technologies</label>
            <input 
                type="text" 
                id="technologies" 
                name="technologies" 
                value="<?php echo htmlspecialchars($project["technologies"]); ?>"
            >
        </div>

        <div class="form-group">
            <label for="github_link">GitHub Link</label>
            <input 
                type="text" 
                id="github_link" 
                name="github_link" 
                value="<?php echo htmlspecialchars($project["github_link"]); ?>"
            >
        </div>

        <div class="form-group">
            <label for="live_demo_link">Live Demo Link</label>
            <input 
                type="text" 
                id="live_demo_link" 
                name="live_demo_link" 
                value="<?php echo htmlspecialchars($project["live_demo_link"]); ?>"
            >
        </div>

        <button type="submit" class="btn primary-btn">Update Project</button>

    </form>

</main>

</body>
</html>