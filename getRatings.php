<?php
    // include("config.php");
    // session_start();
    // $name = $_POST["user"];
    // $passwd = $_POST["pass"];
    // Establishing connection to the database
    include("config.php");
    try {
        $msg='f';
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
                $stmt = $conn->prepare("SELECT avg(ratings)  FROM Ratings_table");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result = $stmt->fetchAll();
                echo $result[0]["avg"];    
            $conn = null;
        }
        exit;
    }
    catch(PDOException $e)
    {
        print_r($e);
        $errorMSG .= "<li>There was some error fetching results from database.</li>";
        echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
    }
    exit;
?>