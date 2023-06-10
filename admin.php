<?php
    include("vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;
    use Helpers\Auth;
    $table = new UsersTable(new MySQL());
    $users = $table->getAll();
    $auth = Auth::check();
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
    <?php if($auth->role_id > 1) : ?>
        <?php if(isset($_GET['error'])): ?>
            <?php if($_GET["error"] === "ban"): ?>
                <div class="alert alert-danger">
                    You Can't Ban Yourself!
                </div>
            <?php endif ?>

            <?php if($_GET["error"] === "adminban"): ?>
                <div class="alert alert-danger">
                    You Can't ban!
                </div>
            <?php endif ?>

            <?php if($_GET["error"] === "delete"): ?>
                <div class="alert alert-danger">
                    You Can't Delete!
                </div>
            <?php endif ?>
        <?php endif ?>

        <div class="container">
            <nav class="navbar navbar-expands bg-dark px-3">
                <div class="navbar-brand text-light">Admin DashBoard</div>
                <div class="navbar-nav">
                    <div class="nav-item"><a href="home.php" class="nav-link btn btn-outline-secondary p-2">Back</a></div>
                </div>
            </nav>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?=$user->name ?></td>
                        <td><?=$user->email ?></td>
                        <td><?=$user->phone ?></td>
                        <td>
                            <?php if($user->value === 1) : ?>
                                <span class="badge bg-secondary">
                            <?php elseif($user->value === 2) : ?>
                                <span class="badge bg-info">
                            <?php elseif($user->value === 3) : ?>
                                <span class="badge bg-success">
                            <?php endif ?>
                                    <?= $user->role ?>
                                </span>                            
                        </td>
                        <td>
                            <div class="btn-group dropdown">

                                <a href="" class="btn btn-outline-primary btn-sm" data-bs-toggle="dropdown">Change Role</a>
                                <div class="dropdown-menu dropdown-menu-dark">
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role_id=1" class="dropdown-item">User</a>
                                    <a href="_actions/role.php?id=<?= $user->id ?>&role_id=2" class="dropdown-item">Editor</a>
                                    <?php if($auth->role_id > 2) : ?>
                                        <a href="_actions/role.php?id=<?= $user->id ?>&role_id=3" class="dropdown-item">Admin</a>
                                    <?php endif ?>
                                </div>

                                    <?php if($user->suspended) : ?>
                                        <a href="_actions/unsuspend.php?id=<?= $user->id ?>&role_id=<?= $user->role_id?>" class="btn btn-outline-warning btn-sm">Unban</a>
                                    <?php else : ?>
                                        <a href="_actions/suspend.php?id=<?= $user->id ?>&role_id=<?= $user->role_id?>" class="btn btn-outline-warning btn-sm">Ban</a>
                                    <?php endif ?>

                                    <a href="_actions/delete.php?id=<?= $user->id ?>&role_id=<?= $user->role_id?>" class="btn btn-outline-danger btn-sm">Delete</a>

                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    <?php else : ?>
        <?php HTTP::redirect("/home.php", "error=user")?>
    <?php endif ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>