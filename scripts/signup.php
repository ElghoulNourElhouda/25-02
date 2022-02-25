<?php
require_once("config.php");
$res = 
array(
    "status"=>"",
    "res"=>""
);
if (isset($_POST['cin'])&&isset($_POST['name'])&&isset($_POST['lastname'])&&isset($_POST['password'])){
    $data =  
    array($_POST['cin'],
    $_POST['name'],
    $_POST['lastname'],
    $_POST['password'],
    "user"
    );
    $sql = "SELECT * FROM users WHERE cin = $data[0]"; 
    $check = $conn->query($sql);
    if($check->num_rows >0){
        $res["status"]="error";
        $res["res"]="user existe";  
    }
    else{
        $sql = "INSERT INTO users (cin,name,lastname,role) VALUES (";
        foreach ($data as $i){
            $sql+=$i;
        }
        $sql+=")";
        if( $conn->query($sql))
        {
            $res["sattus"]="success";
            $res["res"]=json_encode(array(
                "user "=>$data[1].$date[2],
                "cin"=>$data[0]
            ));
        }
    }

}
else{
    $res["status"]="error";
    $res["res"]="an error occurred";
}
echo json_encode($res);
?>