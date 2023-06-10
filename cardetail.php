<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
$table = new UsersTable(new MySQL());

$id = $_GET["id"];
$name = $table->brandname($id);
foreach($name as $brand_name)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="w-50">
    <div class="container">
    <h2>Input</h2>
    <form action="_actions/cardetailinsert.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="car_name" class="form-control mb-2" value="<?= $brand_name ?>" required>
        <input type="text" name="founder_name" class="form-control mb-2" placeholder="Founder Name" required>
        <input type="text" name="company_name" class="form-control mb-2" placeholder="Company Name" required>
        <input type="text" name="time" class="form-control mb-2" placeholder="Date & Time" required>
        <textarea name="description1" class="form-control mb-2"  placeholder="First Description"></textarea>
        <textarea name="description2" class="form-control mb-2"  placeholder="Second Description"></textarea>
        <textarea name="description3" class="form-control mb-2"  placeholder="Third Description"></textarea>
        <input type="file" name="company_pic" class="form-control mb-2">
        <input type="text" name="location" class="form-control" placeholder="Headquarter Location">
        <input type="text" name="latest_model" class="form-control mb-2" placeholder="Model" required>
        <input type="file" name="latest_model_pic" class="form-control mb-2">
        <input type="text" name="price" class="form-control">
        <button class="btn btn-secondary">ADD</button>
    </form>
    </div>
</body>
</html>