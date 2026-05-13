<?php

session_start();

require_once "../config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($username) || empty($password)) {
        $error = "Please enter username and password.";
    } else {
        $sql = "SELECT * FROM admins WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":username" => $username
        ]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin["password"])) {
            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_username"] = $admin["username"];

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | Portfolio</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <section class="section">
        <div class="admin-login-box">

            <h2 class="section-title">Admin Login</h2>

            <?php if (!empty($error)): ?>
                <p class="admin-error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <form method="POST" class="contact-form">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Enter username"
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Enter password"
                    >
                </div>

                <button type="submit" class="btn primary-btn">Login</button>

            </form>

            <p style="text-align:center; margin-top:20px;">
                <a href="../index.php">Back to Portfolio</a>
            </p>

        </div>
    </section>

</body>