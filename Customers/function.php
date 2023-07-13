<?php
require '../inc/dbconn.php';
function getCustomerList(){
global $conn;
$query ="SELECT * FROM customer";
$query_run=mysqli_query($conn,$query);
if($query_run){
    if(mysqli_num_rows($query_run)>0){
        $res= mysqli_fetch_all($query_run,MYSQLI_ASSOC);
    
        $data=[
            'status' => 200,
            'message'=> 'Customers fetched successfully',
            'data'=> $res,
        ];
        header("HTTP/1.0 200 No customers fetched successfully");
        return json_encode($data);
    }else{
        $data=[
            'status' => 404,
            'message'=> $requestMethod.'No customer found',
        ];
        header("HTTP/1.0 404 No customer found");
        return json_encode($data);
    }
}else{
    $data=[
        'status' => 500,
        'message'=> $requestMethod.'Internal Server error',
    ];
    header("HTTP/1.0 500 Internal Srver error");
    return json_encode($data);
}
}
?>