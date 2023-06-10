<?php
    include("vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    $table = new UsersTable(new MySQL());
    $id = $_GET["id"];
    $logos = $table->countryShow($id);
    foreach($logos as $logo)
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
<body>
    <h1>Country New</h1>
    

    <div>Country</div>
    <form action="_actions/homeedit.php?country_name=<?=$logo->country_name?>&id=<?=$id?>" enctype="multipart/form-data" class="w-50" method="post"> 
        <input type="text" name="name" class="form-control" value="<?=$logo->country_name?>">
        <input type="text" name="brandname" class="form-control mb-2" value="<?=$logo->brand_name ?>">
        <Label>Mini Logo</Label>
        <input type="file" name="flag_photo" class="form-control mb-2">
        <label for="">Car Logo</label>
        <input type="file" name="photo" class="form-control mb-2">
        <button class="btn btn-secondary">Submit</button>
    </form>
</body>
</html>