<?php
    include("config.php");

    session_start();

    $id = $_POST["user"];
    $passwd = $_POST["pass"];
    // Establishing connection to the database
    try {
        $msg='f';
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
                $stmt = $conn->prepare("SELECT *  FROM student WHERE userid= :id");
                $stmt->execute([ ':id' => $id]);
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $res = $stmt->fetchAll();
                if(sizeof($res)){
                    if($res[0]['password']==$passwd && $res[0]['student']==true){
                        $_SESSION['name']=$res[0]['name'];
                        $msg='s';
                    }
                    if($res[0]['password']==$passwd && $res[0]['student']==false){
                        $_SESSION['name']=$res[0]['name'];
                        $msg='i';
                    }
                }               
            if($msg=='s'){
                $_SESSION['user']=id;
                echo json_encode(['code'=>100]);
            }
            else if($msg=='i'){
                $_SESSION['user']=$id;
                echo json_encode(['code'=>200]);
            }
            else if($msg=='f'){
                echo json_encode(['code'=>300]);
            }
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
