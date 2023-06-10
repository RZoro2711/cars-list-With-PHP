<?php
$country_name = $_GET["country_name"]
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
    <div class="container">
    <h1>Add New Car</h1>
    

    <form action="_actions/insertCounrty.php?country_name=<?= $country_name ?>" enctype="multipart/form-data" class="w-50" method="post"> 
        <div>Country</div>
        <input type="text" name="name" class="form-control" value="<?=$country_name?>">
        <input type="text" name="brandname" class="form-control mb-2">
        <label for="">Car Logo</label>
        <input type="file" name="photo" class="form-control mb-2">
        <Label>Mini Logo</Label>
        <input type="file" name="flag_photo" class="form-control mb-2">
        <button class="btn btn-secondary">Submit</button>
    </form>
    </div>
</body>
</html>