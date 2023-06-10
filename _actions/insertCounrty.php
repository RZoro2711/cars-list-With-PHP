<?php
include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;


$table = new UsersTable(new MySQL());
$country_name = $_GET["country_name"];
$name = $_POST['name'];
$brandname = $_POST['brandname'];

$photoname  = $_FILES["photo"]["name"];
$error = $_FILES["photo"]["error"];
$tmp = $_FILES["photo"]["tmp_name"];
$type = $_FILES["photo"]["type"];
if($error){
    header("location:admin_country.php?error=file");
    exit();
}
if($type === "image/jpeg" or $type === "image/png"){
    move_uploaded_file($tmp , "../photos/logos/$photoname");
}

$flag  = $_FILES["flag_photo"]["name"];
$error = $_FILES["flag_photo"]["error"];
$tmp = $_FILES["flag_photo"]["tmp_name"];
$type = $_FILES["flag_photo"]["type"];
if($error){
    header("location:admin_country.php?error=file");
    exit();
}
if($type === "image/jpeg" or $type === "image/png"){
    move_uploaded_file($tmp , "../photos/flags/$flag");
}

$data = [
    'country_name' => $name,
    'country_flag' => $flag,
    'brand_name' => $brandname,
    'photo' => $photoname,
];
$id = $table->insertCountry($data);
if($id){
    HTTP::redirect("/home.php?country_name=$country_name");
}else{
    HTTP::redirect("/admin_country.php", "error=fail");
}