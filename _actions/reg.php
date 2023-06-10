<?php
include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());
// $dualEmails = $table->dualEmail();

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];

$data = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'address' => $address,
    'password' => $password,
];
$id = $table->insert($data);
if($id){
    HTTP::redirect("/index.php" , "register=success");
}else{
    HTTP::redirect("/register.php", "error=register");
}