<?php
$txt = $_POST['message'];
file_put_contents('code.txt', $txt) or die("Unable to open file!");
?>