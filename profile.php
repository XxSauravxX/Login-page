<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

include "db.php";

$user_id = $_SESSION["user_id"];

$stmt = $conn->prepare(
    "SELECT name, email, phone FROM users WHERE id = ?"
);

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="profile-container">

        <h1>User Profile</h1>

        <div class="user-info">

            <h2><?php echo htmlspecialchars($user["name"]); ?></h2>

            <p>
                <strong>Email:</strong>
                <?php echo htmlspecialchars($user["email"]); ?>
            </p>

            <p>
                <strong>Phone:</strong>
                <?php echo htmlspecialchars($user["phone"]); ?>
            </p>

        </div>

        <a class="logout-btn" href="logout.php">Logout</a>

    </div>

</body>

</html>