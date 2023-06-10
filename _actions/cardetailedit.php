<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL());
$id= $_GET["id"];
$name = $_GET['name'];
// echo $name;
$car = $_POST["car_name"];
$founder = $_POST["founder_name"];
$company = $_POST["company_name"];
$time = $_POST["time"];
$description1 = $_POST["description1"];
$description2 = $_POST["description2"];
$description3 = $_POST["description3"];
$latest_model = $_POST["latest_model"];
$price = $_POST["price"];
$location = $_POST["location"];

$company_photo = $_FILES["company_pic"]["name"];
$error = $_FILES["company_pic"]["error"];
$tmp = $_FILES["company_pic"]["tmp_name"];
$type = $_FILES["company_pic"]["type"];
if($error){
    header("location:../cardetail.php?error=file");
    exit();
}
if($type === "image/jpeg" or $type === "image/png"){
    move_uploaded_file($tmp , "../photos/headquarter/$company_photo");
}

$latest_model_pic = $_FILES["latest_model_pic"]["name"];
$error = $_FILES["latest_model_pic"]["error"];
$tmp = $_FILES["latest_model_pic"]["tmp_name"];
$type = $_FILES["latest_model_pic"]["type"];
if($error){
    header("location:../cardetail.php?error=file");
    exit();
}
if($type === "image/jpeg" or $type === "image/png"){
    move_uploaded_file($tmp , "../photos/latestmodel/$latest_model_pic");
}

$detail = $table->detailedit($name,$car,$founder,$company,$company_photo,$time,$description1,$latest_model,$latest_model_pic,$price, $description2, $description3, $location);
HTTP::redirect("/detail.php?id=$id&name=$name");
