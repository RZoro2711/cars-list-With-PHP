<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$id = $_GET["id"];
$country_name = $_GET["country_name"];

$table = new UsersTable(new MySQL());
$result = $table->deletecountry($id);
if($result){
    HTTP::redirect("/mainpage.php");
}