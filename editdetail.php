<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
$table = new UsersTable(new MySQL());

$id = $_GET["id"];
$name = $_GET['name'];
$edits = $table->detail($id);
foreach($edits as $edit)
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
    <form action="_actions/cardetailedit.php?id=<?= $id ?>&name=<?= $name?>" method="post" enctype="multipart/form-data">
        <input type="text" name="car_name" class="form-control mb-2" value="<?= $edit->car_name ?>" required>
        <input type="text" name="founder_name" class="form-control mb-2" value="<?=$edit->founder_name?>" required>
        <input type="text" name="company_name" class="form-control mb-2" value="<?= $edit->company_name?>" required>
        <input type="text" name="time" class="form-control mb-2" value="<?=$edit->time ?>" required>
        <textarea name="description1" class="form-control mb-2" ><?=$edit->description1?></textarea>
        <textarea name="description2" class="form-control mb-2" ><?=$edit->description2?></textarea>
        <textarea name="description3" class="form-control mb-2" ><?=$edit->description3?></textarea>
        <input type="file" name="company_pic" class="form-control mb-2" value="<?= $edit->company_pic?>">
        <input type="text" name="location" class="form-control" value="<?= $edit->location ?>">
        <input type="text" name="latest_model" class="form-control mb-2" value="<?=$edit->latest_model?>" required>
        <input type="file" name="latest_model_pic" class="form-control mb-2">
        <input type="text" name="price" class="form-control" value="<?= $edit->price?>" placeholder="Price">
        <button class="btn btn-secondary">Update</button>
    </form>
    </div>
</body>
</html>