<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
    <div class="p-5 register">
        <h1>Register</h1>
        <?php if(isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        Email is already exit!
                    </div>
                <?php endif ?>
        <form action="_actions/reg.php" method="post">
            <input type="text" name="name" id="" class="form-control mb-2" placeholder="Enter Your Name" required>
            <input type="email" name="email" id="" class="form-control mb-2" placeholder="Enter Your Email" required>
            <input type="number" name="phone" class="form-control mb-2" placeholder="Enter Your Phone" required>
            <textarea name="address" class="form-control mb-2" placeholder="Enter Your Address" required></textarea>
            <input type="password" name="password" class="form-control mb-2" placeholder="Enter Your Password" required>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>