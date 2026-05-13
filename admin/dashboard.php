<?php

session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

require_once "../config/db.php";

$projectsStmt = $conn->prepare("SELECT * FROM projects ORDER BY created_at DESC");
$projectsStmt->execute();
$projects = $projectsStmt->fetchAll(PDO::FETCH_ASSOC);

$messagesStmt = $conn->prepare("SELECT * FROM messages ORDER BY created_at DESC");
$messagesStmt->execute();
$messages = $messagesStmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Portfolio</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <header class="header">
        <nav class="navbar">
            <div class="logo">Admin<span>Panel</span></div>

            <ul class="nav-links">
                <li><a href="../index.php">Portfolio</a></li>
                <li><a href="add_project.php">Add Project</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="section">

        <h2 class="section-title">
            Welcome, <?php echo htmlspecialchars($_SESSION["admin_username"]); ?>
        </h2>

        <section class="admin-section">
            <h2>Projects</h2>

            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Technologies</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($project["id"]); ?></td>
                                <td><?php echo htmlspecialchars($project["title"]); ?></td>
                                <td><?php echo htmlspecialchars($project["category"]); ?></td>
                                <td><?php echo htmlspecialchars($project["technologies"]); ?></td>
                                <td>
                                    <a href="edit_project.php?id=<?php echo $project["id"]; ?>">Edit</a>
                                    |
                                    <a 
                                        href="delete_project.php?id=<?php echo $project["id"]; ?>" 
                                        onclick="return confirm('Are you sure you want to delete this project?');"
                                    >
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </section>

        <section class="admin-section">
            <h2>Contact Messages</h2>

            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($messages as $message): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($message["id"]); ?></td>
                                <td><?php echo htmlspecialchars($message["name"]); ?></td>
                                <td><?php echo htmlspecialchars($message["email"]); ?></td>
                                <td><?php echo htmlspecialchars($message["subject"]); ?></td>
                                <td><?php echo htmlspecialchars($message["message"]); ?></td>
                                <td><?php echo htmlspecialchars($message["created_at"]); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </section>

    </main>

</body>
</html>