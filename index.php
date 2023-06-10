<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Log In</title>
</head>
<body class="login">
    <div class="container p-5">
        <h1>Log In</h1>
        
            
        <div class="loginform">
            <?php if(isset($_GET['register'])): ?>
                <div class="alert alert-success">
                    Create Account Successful!
                </div>
            <?php endif ?>
            <?php if(isset($_GET['error'])) :?>

                <?php if($_GET['error'] === "login"): ?>
                    <div class="alert alert-danger">
                        Email or Password Incorrect
                    </div>
                <?php endif ?>
                <?php if($_GET['error'] === "suspend"): ?>
                    <div class="alert alert-danger">
                        Account Suspend!
                    </div>
                <?php endif ?>
                
            <?php endif ?>
            <form action="_actions/login.php" method="post">
                <input type="email" name="email" class="form-control my-2" placeholder="Enter Your Eamil" required>
                <input type="password" name="password" class="form-control mb-2" placeholder="Enter Your Password" required>
                <button class="btn btn-primary mb-3">Log In</button><br>
            </form>
            <a href="register.php" class="text-info text-center">Register</a>
        </div>
    </div>
</body>
</html>