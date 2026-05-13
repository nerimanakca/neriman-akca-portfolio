<?php

session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require_once "../config/db.php";

$error = "";
$success = "";

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
            $sql = "INSERT INTO projects 
                    (title, category, description, technologies, github_link, live_demo_link)
                    VALUES 
                    (:title, :category, :description, :technologies, :github_link, :live_demo_link)";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                ":title" => $title,
                ":category" => $category,
                ":description" => $description,
                ":technologies" => $technologies,
                ":github_link" => $github_link,
                ":live_demo_link" => $live_demo_link
            ]);

            $success = "Project added successfully.";

        } catch (PDOException $e) {
            $error = "Project could not be added.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Project | Admin</title>
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

    <h2 class="section-title">Add New Project</h2>

    <?php if (!empty($error)): ?>
        <p class="admin-error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="admin-success"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <form method="POST" class="contact-form">

        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" id="title" name="title" placeholder="Enter project title">
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="">Select category</option>
                <option value="web">Web</option>
                <option value="database">Database</option>
                <option value="ai">AI</option>
                <option value="network">Network</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Project Description</label>
            <textarea id="description" name="description" rows="5" placeholder="Enter project description"></textarea>
        </div>

        <div class="form-group">
            <label for="technologies">Technologies</label>
            <input type="text" id="technologies" name="technologies" placeholder="HTML, CSS, JavaScript, PHP, MySQL">
        </div>

        <div class="form-group">
            <label for="github_link">GitHub Link</label>
            <input type="text" id="github_link" name="github_link" placeholder="https://github.com/username/project">
        </div>

        <div class="form-group">
            <label for="live_demo_link">Live Demo Link</label>
            <input type="text" id="live_demo_link" name="live_demo_link" placeholder="https://example.com">
        </div>

        <button type="submit" class="btn primary-btn">Add Project</button>

    </form>

</main>

</body>
</html>