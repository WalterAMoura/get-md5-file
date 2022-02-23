<?php

    

    //use Source\Models\UUID as uuid;
    require_once(__DIR__ . '/source/Models/UUID.php');

    $path = $_GET['path'] ?? -1;
    $file = $_FILES['file'] ?? -1;
    $dirUpload = "./upload";
    if($path == 'upload'){
        //$fileName=$uuid->getGUID();
        $uuid = new \Source\Models\UUID();
        $fileName=$uuid->getGUID();
        if(move_uploaded_file($file["tmp_name"], "$dirUpload/".$fileName)){
            $filemd5=md5_file("$dirUpload/".$fileName);
            $response=array(
                "file_md5"=> $filemd5
            );
            unlink("$dirUpload/".$fileName);
            http_response_code(200);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
        }
    }else{
        http_response_code(404);
        $errors=array("error"=>"No Route matched with those values.");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($errors);
    }
