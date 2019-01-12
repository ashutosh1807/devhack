<?php
    include("config.php");

    session_start();

    $name = $_POST["user"];
    $passwd = $_POST["pass"];

    // Establishing connection to the database

    try {
        $msg='f';
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $name, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
            if($msg=='f'){
                $stmt = $conn->prepare("SELECT password = :pass  FROM customer WHERE customer_id = :id");
                $stmt->execute([':pass' => $passwd, ':id' => $name]);
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
                    if($v['?column?'] == 1 ) {
                        $msg = 't';
                    }
                }
            }
            if($msg=='t'){
                $_SESSION['user']=$name;
                echo json_encode(['code'=>100]);
            }
            else {
                echo json_encode(['code'=>200]);
            }
            $conn = null;
        }

    }
    catch(PDOException $e)
    {
        $errorMSG .= "<li>There was some error fetching results from database.</li>";
        echo json_encode(['code'=>404, 'msg'=>$errorMSG, 'e'=> $e]);
    }
    exit;
?>
