
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
        <h2><b>Add New Country</b></h2>
        <form action="_actions/mainpageinsert.php" method="post" enctype="multipart/form-data">
        <select name="name" class="form-select">
                <option value="Japan">Japan</option>
                <option value="Germany">Germany</option>
                <option value="Italy">Italy</option>
                <option value="United States">United States</option>
                <option value="South Korea">South Korea</option>
                <option value="China">China</option>
                <option value="France">France</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Sweden">Sweden</option>
                <option value="India">India</option>
                <option value="Spain">Spain</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Canada">Canada</option>
                <option value="Brazil">Brazil</option>
                <option value="Mexico">Mexico</option>
                <option value="Australia">Australia</option>
                <option value="Russia">Russia</option>
                <option value="Poland">Poland</option>
            </select>
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-dark text-light">Submit</button>
        </form>
    </div>
</body>
</html>