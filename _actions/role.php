<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;
$auth = Auth::check();

$id = $_GET["id"];
$role_id = $_GET["role_id"];

$table = new UsersTable(new MySQL());
$result = $table->changeRole($id, $role_id);

if($result){
    HTTP::redirect("/admin.php");
}else{
    HTTP::redirect("/admin.php");
}

