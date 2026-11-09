<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (
        strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password)
    ) {

        $message = "Password must contain at least 8 characters, one uppercase letter, one lowercase letter, and one number.";

    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        file_put_contents(
            "users.txt",
            "$username|$hashedPassword\n",
            FILE_APPEND
        );

        $message = "Registration successful!";
    }
}
?>

<form method="POST">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>

<p><?php echo $message; ?></p>