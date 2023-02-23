<?php
session_start();
if (isset($_POST['Submit'])) {
    $_SESSION['usernameData'] = $_POST['user'];
    $_SESSION['userPassData'] = $_POST['pass'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .push-data-container {
            display: flex;
            flex: wrap;
        }
    </style>
</head>
<body>
<?php
    $error = '';

    if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
        $user = $_SESSION['usernameData'];
        $pass = $_SESSION['userPassData'];
    }
    else {
        $user = '';
        $pass = '';
    }
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if(empty($user)) {
            $error = 'Please enter your username';      
        }
        if (empty($pass)) {
            $error = 'Please enter your password';
        }
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Login</h3>
            <div class="push-data-container">
                <p class="border rounded w-50 bg-light" style="text-align: center;"><?php echo $_SESSION['usernameData']?></p>
                <p class="border rounded w-50 bg-light" style="text-align: center;"> <?php echo $_SESSION['userPassData']?> </p>     
            </div>
           
            <form action="login.php"  method="post" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="<?= $user ?>" name="user" id="username" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input value="<?= $pass ?>" name="pass" id="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <?php
                        if (!empty($error)) {
                            echo '<div class="alert alert-danger">' . $error . '</div>';
                        }
                    ?>
                    <button type="submit" class="btn btn-success px-5">Login</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>