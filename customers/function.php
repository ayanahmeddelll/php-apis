<?php

require '../inc/dbcon.php';

function error422($message){
    $data = [
        'status' => 422,
        'message' => $message,
];
  header("HTTP/1.0 422 unprocessable ENtiy ");
  echo json_encode($data);
  exit();
}




function getCustomerList(){

global $conn;


$query = "SELECT customers.name,customers.email,backcup.name FROM `customers` JOIN `backcup` ON customers.dell_id = backcup.name_id";


$query_run = mysqli_query($conn, $query);


if($query_run){
  // var_dump($query_run);
  
  if(mysqli_num_rows($query_run) > 0){

     $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
     
     $data = [
        'status' => 200,
        'meassage' =>  'Customer LIst Fetch SccessFully',
        'data' => $res
];
  header("HTTP/1.0 200 ok ");
  return json_encode($data);


 }
 else
 {
    $data = [
        'status' => 404,
        'meassage' =>  'No Customer Found',
];
  header("HTTP/1.0 404 No Customer Found ");
  return   json_encode($data);

 }
    
}
else
{
    $data = [
        'status' => 500,
        'meassage' =>  'internal server Error',
];
  header("HTTP/1.0 500 internal server Error ");
  return  json_encode($data);

}

}

?>