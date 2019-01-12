<?php
include("config.php");

session_start();
try {
    $msg='f';
    $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

}
catch(PDOException $e)
{
    $errorMSG .= "<li>There was some error fetching results from database.</li>";
    echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
}
if (!file_exists("code.txt")){
    echo json_encode(['code'=>400]);
}
else{
    $myfile = fopen("code.txt", "a+");
    $txt = $_POST['message'];
    $code=file_get_contents("code.txt");
    if ($code==$txt){
        if(empty($errorMSG)){
            $stmt = $conn->prepare("Insert into attendance values(:id,timestamp)");
            $stmt->execute([ ':id' => $_SESSION['user']]);
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
                      
        echo json_encode(['code'=>100]);
    }
    else{
        echo json_encode(['code'=>200]);
    }

}

    // Establishing connection to the database
   
    exit;


?>