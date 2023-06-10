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
if($auth->role_id == 3){
    $result = $table->deleteRole($id);


    if($result){
        HTTP::redirect("/admin.php");
    }else{
        HTTP::redirect("/admin.php");
    }
}else{
    HTTP::redirect("/admin.php", "error=delete");
}