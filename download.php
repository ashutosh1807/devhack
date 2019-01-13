
<!-- // $file = basename($_GET['file']);
// $file = 'uploads/'.$file;

// if(!file_exists($file)){ // file does not exist
//     die('file not found');
// } else {
//     header("Cache-Control: public");
//     header("Content-Description: File Transfer");
//     header("Content-Disposition: attachment; filename=$file");
//     header("Content-Type: application/zip");
//     header("Content-Transfer-Encoding: binary");

//     // read the file from disk
//     readfile($file);
// } -->




<?php
$filename = basename($_GET['file']);
// Specify file path.
$path = 'uploads/'; // '/uplods/'
$download_file =  $path.$filename;

if(!empty($filename)){
    // Check file is exists on given path.
    if(file_exists($download_file))
    {
      header('Content-Disposition: attachment; filename=' . $filename);  
      readfile($download_file); 
      exit;
    }
    else
    {
      echo 'File does not exists on given path';
    }
 }
 ?>