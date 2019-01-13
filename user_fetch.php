<?php session_start();
    include("config.php");


    // Establishing connection to the database
    try {
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
                $stmt = $conn->prepare("SELECT *  FROM translate");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $res = $stmt->fetchAll();
                $message = $res[0]['text'];      
                echo json_encode(['data'=>$message, 'code'=>100]); // All went well
            // if($msg=='s'){
            //     $_SESSION['user']=$id;
            //     echo json_encode(['code'=>100]);
            // }
            // else if($msg=='i'){
            //     $_SESSION['user']=$id;
            //     echo json_encode(['code'=>200]);
            // }
            // else if($msg=='f'){
            //     echo json_encode(['code'=>300]);
            // }
            $conn = null;
        }

    }
    catch(PDOException $e)
    {
        print_r($e);
        $errorMSG .= "<li>There was some error fetching results from database.</li>";
        echo json_encode(['data'=>$errorMSG, 'code'=>200]); // Error occured
    }

      
?>