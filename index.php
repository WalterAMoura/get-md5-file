<?php

    $path = $_GET['path'] ?? -1;
    $file = $_FILES['file'] ?? -1;
    $dirUpload = "./upload";

    if($path == 'upload'){
        $fileName= getUUID();
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

    function getUUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = ""
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
            return $uuid;
        }
    }
