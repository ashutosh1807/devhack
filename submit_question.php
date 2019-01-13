<?php
$myfile = fopen("new_questions.txt", "a+") or die("Unable to open file!");
$orgfile = fopen("questions.txt", "a+") or die("Unable to open file!");
$name = $_POST['name']." ";
$txt = $_POST['message']."\n";
fwrite($myfile, $name);
fwrite($myfile, $txt);
fclose($myfile);
fwrite($orgfile, $name);
fwrite($orgfile, $txt);
fclose($orgfile);
?>