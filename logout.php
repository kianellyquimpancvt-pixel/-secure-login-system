<?php

session_start();

if(isset($_SESSION["username"])){

    file_put_contents(
        "logs.txt",
        $_SESSION["username"] .
        " logged out on "
        . date("Y-m-d H:i:s")
        . "\n",
        FILE_APPEND
    );
}

session_destroy();

echo "You have successfully logged out.";
?>