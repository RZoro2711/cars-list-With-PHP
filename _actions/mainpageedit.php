<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
$table = new UsersTable(new MySQL());
$id = $_GET['id'];
$name = $_POST['country_name'];

$photoname  = $_FILES["photo"]["name"];
$error = $_FILES["photo"]["error"];
$tmp = $_FILES["photo"]["tmp_name"];
$type = $_FILES["photo"]["type"];
if($type === "image/jpeg" or $type === "image/png"){
    move_uploaded_file($tmp , "../photos/flags/$photoname");
}

$data = [
    "country_name" => $name,
    "country_logo" => $photoname,
    "id" => $id
];

$edit = $table->countryListedit($data);
HTTP::redirect("/mainpage.php");