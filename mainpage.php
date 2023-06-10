<?php
    include("vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    $table = new UsersTable(new MySQL());
    $lists = $table->countryListShow();
    use Helpers\Auth;
    $auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .card{
            border-radius: 10px;
        }
    </style>
    <title>Country List</title>
</head>
<body>
    <div class="navbar navbar-expand mb-2 bg-dark">
            <div class="container">
                <a href="" class="navbar-brand text-light"><strong>
                    <b> History Of</b> <br><b style="margin-left: 25px;"> AutoMobile</b></strong></a>
                    
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php if($auth->role_id >= 2) :?>
                            <a href="admin.php" class="nav-link text-light"><b>Admin</b></a>
                        <?php endif ?>
                    </li>
                    <li class="nav-item">
                        <?php if($auth->role_id >= 2) :?>
                            <a href="mainpageadd.php" class="nav-link text-light"><b>Add New Country</b></a>
                        <?php endif ?>
                    </li>
                    <li class="nav-item">
                        <a href="_actions/logout.php" class="nav-link text-light"><b>LogOut</b></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">

            <div class="row">
            <?php foreach($lists as $list)   :?>
                <div class="col-12 col-md-6 col-lg-4 mb-3 ">
                        <div class="card bg-dark py-3 px-2 mt-2">
                            <div class="card-title dropdown">
                                <i class="fas fa-bars float-end px-3 py-2 text-light" data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a href="editmainpage.php?country_name=<?= $list->country_name ?>&id=<?= $list->id ?>" class="dropdown-item">Edit <?= $list->country_name ?></a></li>
                                    <li><a href="_actions/deletecountry.php?id=<?= $list->id ?>" class="dropdown-item">Delete <?= $list->country_name?></a></li>
                                </ul>
                            </div>
                            <?php if(file_exists("photos/flags/$list->country_logo")) :?>
                                <img src="photos/flags/<?=$list->country_logo?>" width="200px" height="120px" class="mb-2 mt-1 mb-3" style="margin:auto;">
                            <?php endif ?>
                            <b class="text-center"><a href="home.php?country_name=<?= $list->country_name ?>" class="btn btn-info text-dark"><?= $list->country_name?></a></b>
                        </div>
                </div>
            <?php endforeach ?>
        </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>