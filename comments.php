<?php

$comment = "";

if(isset($_POST["comment"])){

    $comment = strip_tags($_POST["comment"]);
}

?>

<form method="POST">

    Enter Comment:

    <br><br>

    <textarea name="comment"></textarea>

    <br><br>

    <button type="submit">
        Submit
    </button>

</form>

<hr>

<h3>Comment Output</h3>

<?php
echo htmlspecialchars(
    $comment,
    ENT_QUOTES,
    'UTF-8'
);
?>