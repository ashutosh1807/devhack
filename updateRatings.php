<?php
    include("config.php");
    session_start();
    $name = $_POST["user"];
    $passwd = $_POST["pass"];
    $rated=$_POST['message'];
    // Establishing connection to the database
    try {
        $msg='f';
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
                $stmt = $conn->prepare("INSERT INTO ratings_table values(0,:id)");
                $stmt->execute([ ':id' => $rated]);//profid may needed to be removed time constraints
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                }              
            $conn = null;
        }
    catch(PDOException $e)
    {
        print_r($e);
        $errorMSG .= "<li>There was some error fetching results from database.</li>";
        echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
    }
    exit;
?>