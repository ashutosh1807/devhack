 <?php
	session_start();

    $data = $_POST['param'];
    echo $data."  ".strlen($data)."<br>";
	exec('~/anaconda3/bin/python3 script.py' . $data, $out, $status);
    $message = implode(" ",$out);
    echo $message."<br>";

    include("config.php");
    
    // Establishing connection to the database
    try {
        $conn = new PDO("pgsql:host=$servername;dbname='devhack';port=5432", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($errorMSG)){
            // print_r($res[0]['text']);
            if(strlen($message) == 0){
                echo 'Empty string !';
            }
            else {
                echo 'Not empty String!';
                echo $message;
                $stmt = $conn->prepare("UPDATE translate SET text=:msg");
                $stmt->execute([ ':msg' => $message]);
            }

            echo "<br>---------<br>";
            
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
        echo 'Error!'; // Error occured
    }

?>