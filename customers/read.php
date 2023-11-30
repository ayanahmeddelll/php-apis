<?php


header('Access-control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-control-Allow-Method:GET');
header('Access-control-Allow-Header: content-Type, Access-Control-Allow-Header, Authorization, X-Request-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];


if($requestMethod === "GET") {

           
             $customreList = getCustomerList();
             echo ($customreList);

}
else
{
    $data = [
            'status' => 405,
            'message' => $requestMethod.'Method Not Allowed',
    ];
      header("HTTP/1.0 405 Method Not Allowed");
      echo json_encode($data);
}


?>