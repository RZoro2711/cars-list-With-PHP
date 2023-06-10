<?php
include("../vendor/autoload.php");

use Faker\Extension\Helper;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$id = $_GET["id"];
$table = new UsersTable(new MySQL());
$table->deletedetail($id);
HTTP::redirect("/detail.php?id=$id");