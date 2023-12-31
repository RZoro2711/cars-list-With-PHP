<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST["email"];
$password = $_POST["password"];

$table = new UsersTable(new MySQL);
$user = $table->findByEmailAndPassword($email, $password);

if($user){
    if($user->suspended){
        HTTP::redirect("/index.php", "error=suspend");
    }
    session_start();
    $_SESSION["user"] = $user;
    HTTP::redirect("/mainpage.php");
}
HTTP::redirect("/index.php", "error=login");
