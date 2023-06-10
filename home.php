<?php
    include("vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;
    use Helpers\Auth;
    $table = new UsersTable(new MySQL());
    $auth = Auth::check();
    $country_name = $_GET['country_name'];
    $listofcars = $table->country_name($country_name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?=$country_name?> Car Brands</title>
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
                            <a href="admin_country.php?country_name=<?=$country_name?>" class="nav-link text-light"><b>Add New Brand</b></a>
                        <?php endif ?>
                    </li>
                    <li class="nav-item">
                        <a href="_actions/logout.php" class="nav-link text-light"><b>LogOut</b></a>
                    </li>
                </ul>
            </div>
        </div>
    

    <?php if(isset($_GET["error"])) :?>
        <div class="alert alert-danger">
            Your are not a admin
        </div>
    <?php endif ?>

    <div class="container">

        <div class="row">
            <?php foreach($listofcars as $listofcar)   :?>
                <div class="col-12 col-md-6 col-lg-3 mb-4 ">

                    <div class="card bg-dark py-3 px-2">
                        <div class="card-title dropdown">
                            <?php if(file_exists("photos/flags/$listofcar->country_flag")) :?>
                                <img src="photos/flags/<?= $listofcar->country_flag ?>" class="ps-3 pe-1">
                                <b class="badge bg-light text-danger"><?= $listofcar->country_name ?></b>
                            <?php endif ?>
                            <?php if($auth->role_id >= 2): ?>
                            <i class="fas fa-bars float-end px-3 py-2 text-light" data-bs-toggle="dropdown"></i>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a href="edithome.php?country_name=<?= $listofcar->country_name?>&id=<?= $listofcar->id?>" class="dropdown-item">Edit Logo</a></li>
                                <li><a href="cardetail.php?id=<?= $listofcar->id ?>" class="dropdown-item">Add <?=$listofcar->brand_name ?> Detail</a></li>
                                <li><a href="_actions/deletebrand.php?id=<?= $listofcar->id ?>&country_name=<?=$country_name?>" class="dropdown-item">Delete</a></li>
                            </ul>
                            <?php endif ?>
                        </div>

                        <div class="card-body">
                            <?php if(file_exists("photos/logos/$listofcar->photo")) :?>
                                <img src="photos/logos/<?= $listofcar->photo ?>" width="250px" height="180px">
                            <?php endif ?>
                        </div>

                        <div class="text-center">
                                <a href="detail.php?id=<?= $listofcar->id ?>" class="btn btn-info text-dark"><?= $listofcar->brand_name?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>


    </div>

    


    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>