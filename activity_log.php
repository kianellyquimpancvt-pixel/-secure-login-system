<?php

echo "<h2>Activity Logs</h2>";

if(file_exists("logs.txt")){

    echo nl2br(
        file_get_contents("logs.txt")
    );

}else{

    echo "No logs found.";
}
?>
