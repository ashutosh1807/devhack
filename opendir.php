 <?php
$dir = "uploads/";

echo" <html><head></head><body>" ;
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<?php
//echo " <script> function back() {open(\"http://10.196.4.116/devhack/user.php\"); } </script>" ;
echo " <script> function back(){ document.location.href= \"http://localhost/devhack/user.php\" }; </script>" ;
echo " <button class=\"btn btn-primary btn-lg\" onclick= back()> Back to Home </button> <br><br><br><br> ";


// if ($handle = opendir($dir)) {
//     echo " <div class=\"list-group\"> " ;
//     while (false !== ($entry = readdir($handle))) {
//         if ($entry != "." && $entry != "..") {
//             echo "<a href='download.php?file=".$entry."' class=\"list-group-item\" >".$entry."</a><br>";
//         }
//     }
//     echo " </div" ;
//     echo " </body></html> ";
//     closedir($handle);
// }

$dir = "uploads/";

$allFiles = scandir($dir);
$files = array_diff($allFiles, array('.', '..')); 
$currentdate = 200-01-01 ;

echo "div class=\"row\" > ";
echo " <div class=\"card \" > ";
echo "<div class=\"card-content\"> ";
foreach($files as $file){
    $temp = explode(";", $file);
    $date = $temp[0];
    $name = $temp[1];
    if($date == $currentdate ){
        echo " <a href='download.php?file=".$file."'>".$name."</a><br>" ;
    }
    else{
        $currentdate = $date ;
        echo "  <span class=\"card-title\">".$date."</span><hr> " ;
        echo " <a href='download.php?file=".$file."'>".$name."</a><br>" ;
    }
}
echo " </div></div></div>" ;
echo " </body></html> ";
?>

