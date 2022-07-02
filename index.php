<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$server = "localhost"; $user = "root"; $password = ""; $dbname = "staff";
$connectdb = new mysqli($server, $user, $password, $dbname);


if (isset($_GET["consult"])){
    $sqlStaff = mysqli_query($connectdb,"SELECT * FROM staff WHERE id=".$_GET["consult"]);
    if(mysqli_num_rows($sqlStaff) > 0){
        $workers = mysqli_fetch_all($sqlStaff,MYSQLI_ASSOC);
        echo json_encode($workers);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}


if (isset($_GET["delete"])){
    $sqlStaff = mysqli_query($connectdb,"DELETE FROM staff WHERE id=".$_GET["delete"]);
    if($sqlStaff){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}


if(isset($_GET["insert"])){
    $data = json_decode(file_get_contents("php://input"));
    $worker_name=$data->worker_name;
    $email=$data->email;
        if(($email!="")&&($worker_name!="")){
            
    $sqlStaff = mysqli_query($connectdb,"INSERT INTO staff(worker_name,email) VALUES('$worker_name','$email') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}


if(isset($_GET["update"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["update"];
    $worker_name=$data->worker_name;
    $email=$data->email;
    
    $sqlStaff = mysqli_query($connectdb,"UPDATE staff SET worker_name='$worker_name',email='$email' WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}


$sqlStaff = mysqli_query($connectdb,"SELECT * FROM staff ");
if(mysqli_num_rows($sqlStaff) > 0){
    $workers = mysqli_fetch_all($sqlStaff,MYSQLI_ASSOC);
    echo json_encode($workers);
}
else{ echo json_encode([["success"=>0]]); }


?>