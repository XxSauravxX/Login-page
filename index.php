<?php

session_start();

include "db.php";
if (isset($_POST["login"])) {

    $email = 
trim($_POST["email"]);
    $password = 
$_POST["password"];

        $stmt = $conn->prepare(
            "SELECT id, name, email, password, phone
            FROM users
            WHERE email = ?"
        );

        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows ===1) {

            $user = 
        $result->fetch_assoc();

        if (password_verify($password,$user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $SESSION["user_name"] = $user["name"];
            $_SESSION["user_email"] = $user["email"];

            header("Location:profile.php");
            exit();

        } else {
                echo "Invalid email or password. ";

        }

        } else { 
                echo "Invalid email or password. ";

        }
            $stmt->close();

}

?>

<!DOCTYPE html>
<html>
     <head>
         <title>Login Page</title>
         <link rel="stylesheet"
    href="style.css">
     </head>


     <body>

        <div class="container">

            <h1>Login</h1>

            <form method="POST">

            <label>Email:</label>
            <input type="email"
    name="email" required>

            <br><br>

            <label>password:</label>
            <input type="password"
    name="password" required>

            <br><br>

            <button type="submit"
    name="login">Login</button>

        </form>
</div>

    <script src="script.js"></script>
</body>
</html>