<?php
    $code = 200;
    @session_destroy();

    @file_put_contents("questions.txt", "");
    @file_put_contents("new_questions.txt", "");
    echo json_encode(['code'=>$code]);
?>
