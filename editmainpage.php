<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
$table = new UsersTable(new MySQL());
$id = $_GET['id'];
$countryLists = $table->showcountryList($id);
foreach($countryLists as $countryList)
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
        <h2>Edit Country</h2>
            <form action="_actions/mainpageedit.php?id=<?= $countryList->id?>" method="post" enctype="multipart/form-data">
                <input type="text" name="country_name" value="<?= $countryList->country_name?>" class="form-control">
                <input type="file" name="photo" class="form-control" value="<?= $countryList->country_logo?>">
                <button class="btn btn-dark text-light">Submit</button>
            </form>
    </div>
</body>
</html>