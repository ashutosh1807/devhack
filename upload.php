
<?php
$target_dir = "uploads/";
$target_file = $target_dir . date("Y-m-d") .";". basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header("Location:http://10.196.4.116/devhack/instructor_beta.php");
    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
echo" <html><head></head><body>" ;


//echo " <script> function back() {open(\"http://10.196.4.116/devhack/user.php\"); } </script>" ;
//echo " <script> function back(){ document.location.href= \"http://10.196.4.116/devhack/user.php\" }; </script>" ;
//echo " <button onclick= back()> Back to Home </button> <br> ";
echo " </body></html> ";
?>

