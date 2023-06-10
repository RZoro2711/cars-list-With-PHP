<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;
$auth = Auth::check();

$id = $_GET["id"];
$role_id = $_GET["role_id"];

if($role_id == 3){
    HTTP::redirect("/admin.php" , "error=adminban");    
}elseif($auth->id != $id){

        $table = new UsersTable(new MySQL());

        $result = $table->suspend($id);

        if($result){
            HTTP::redirect("/admin.php");
        }else{
            HTTP::redirect("/admin.php");
        }
}else{
        HTTP::redirect("/admin.php" , "error=ban");
}