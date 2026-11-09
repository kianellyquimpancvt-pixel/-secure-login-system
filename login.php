<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = file("users.txt");

    foreach ($users as $user) {

        list($storedUser, $storedHash) = explode("|", trim($user));

        if (
            $storedUser == $username &&
            password_verify($password, $storedHash)
        ) {

            $_SESSION["username"] = $username;

            file_put_contents(
                "logs.txt",
                "$username logged in on "
                . date("Y-m-d H:i:s") .
                "\n",
                FILE_APPEND
            );

            $message = "Login Successful!";
            break;
        }
    }

    if($message == ""){
        $message = "Invalid credentials.";
    }
}
?>

<form method="POST">

    Username:
    <input type="text" name="username">

    <br><br>

    Password:
    <input type="password" name="password">

    <br><br>

    <button type="submit">
        Login
    </button>

</form>

<p><?php echo $message; ?></p>