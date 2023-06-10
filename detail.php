<?php 
include("vendor/autoload.php");
use Libs\Database\UsersTable;
use Libs\Database\MySQL;
use Helpers\Auth;
$auth = Auth::check();
$table = new UsersTable(new MySQL());
$id = $_GET["id"];
$details = $table->detail($id);
foreach($details as $detail);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .img1 , .img2{
            margin: auto;
            display: block;
        }
        @media(max-width:700px){
            .img2,.img1{
                margin: auto;
            }
            .img2{
                width:300px;
            }
        }
    </style>
    <title><?= $detail->brand_name?> Details</title>
</head>
<body>
    <div class="navbar navbar-expand mb-2 bg-dark">
            <div class="container">
                <a href="" class="navbar-brand text-light"><strong>
                    <b> History Of</b> <br><b style="margin-left: 25px;"> AutoMobile</b></strong></a>
                    
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="mainpage.php" class="nav-link text-light"><b>Home</b></a>
                    </li>
                    <li class="nav-item">
                        <?php if($auth->role_id >= 2) :?>
                            <a href="admin.php" class="nav-link text-light"><b>Admin</b></a>
                        <?php endif ?>
                    </li>
                    <li class="nav-item">
                        <?php if($auth->role_id >= 2) :?>
                            <a href="editdetail.php?id=<?= $id ?>&name=<?=$detail->brand_name ?>" class="nav-link text-light"><b>Edit <?=$detail->brand_name?></b></a>
                        <?php endif ?>
                    </li>
                    <li class="nav-item">
                        <a href="_actions/logout.php" class="nav-link text-light"><b>Log Out</b></a>
                    </li>
                    <li class="nav-item">
                        <?php if($auth->role_id >= 2) :?>
                            <a href="_actions/deletedetail.php?id=<?= $id ?>" class="nav-link text-light bg-danger rounded">Delete</a>
                        <?php endif ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="">
                        <div class="card">
                            <div class="card-body bg-dark p-1 py-4">
                                <?php if(file_exists("photos/logos/$detail->photo")) :?>
                                    <img src="photos/logos/<?=$detail->photo?>" width="100px" class="img1">
                                <?php endif ?>
                                <p style="margin:auto;width:90px;border-radius:5px" class="bg-info p-2 text-center my-2 d-block"><?=$detail->brand_name ?></p>   
                            </div>
                        </div>
                        
                        <div class="bg-dark mt-3">
                            <div class="card bg-dark py-3 px-3 mb-2">
                                <div class="body">
                                    <?php if(file_exists("photos/headquarter/$detail->company_pic")) :?>
                                        <img src="photos/headquarter/<?=$detail->company_pic?>" width="250px" class="img1">
                                    <?php endif ?>
                                    <div class="bg-info text-dark p-2 mt-2 mb-2 w-100 px-3 rounded" style="margin:auto">
                                        <?=$detail->brand_name?>'s Headquarter <br>
                                        Location : <?= $detail->location ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                        <div class="bg-dark px-5 py-2 w-100" >
                            <div class="float-start bg-info text-dark me-2 py-4 px-2 mt-2 col-12 col-md-4" style="border-radius:6px">
                                Founder Name : <?= $detail->founder_name ?><br>
                                Company Name : <?= $detail->company_name ?><br>
                                Date : <?=$detail->time ?>
                            </div>
                            <div class="p-2 text-light"><?= $detail->description1?></div>
                            <div class="p-2 text-light"><?= $detail->description2?></div>
                            <div class="p-2 text-light"><?= $detail->description3?></div>
                            <div class="mt-2 p-2">
                            <div class="bg-dark mt-3 p-3">
                            <?php if(file_exists("photos/latestmodel/$detail->latest_model_pic")) :?>
                                <img src="photos/latestmodel/<?=$detail->latest_model_pic?>" width="400px" class="img2">
                            <?php endif ?>
                            <div class="bg-info text-dark p-2 mt-2 mb-2 w-50 rounded" style="margin:auto">
                                <?=$detail->brand_name?>'s Latest Model - <?=$detail->latest_model?><br>
                                <?= $detail->latest_model ?>'s Price     - <?= $detail->price ?>
                            </div>
                        </div>
                        </div> 
                </div>
            </div>
        </div>
</body>
</html>