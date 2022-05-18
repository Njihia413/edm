<?php
include "functions.php";
// check if user is already logged in
if (isset($_SESSION['voter_id']) or isset($_SESSION['name'])) {
    header('Location: ../admin/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        Login | Account Management
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href=".././assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href=".././assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href=".././assets/images/favicon-16x16.png">
    <link rel="manifest" href=".././assets/images/site.webmanifest">
    <link rel="stylesheet" href=".././assets/css/main.css">
    <script src="https://kit.fontawesome.com/aabe1c8dd0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href=".././assets/css/responsive.css">
</head>

<body class="bg-primary">
    <div class="container ">
        <div class="card login-form">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <h2>Login</h2>
                        <hr>
                        <?php
                        display_message();
                        login_user();
                        ?>
                        <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="voterid">Voter ID:</label>
                                <input type="number" id="voter_id" class="form-control" name="voter_id" placeholder="Voter Id">
                            </div>
                            <div class="form-group">
                                <label for="username">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <i class="fa-solid fa-eye-slash" id="hide" onclick="myFunction()"></i>
                                <i class="fa-solid fa-eye" id="show" onclick="myFunction()"></i>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="remember" name="remember_me" id="remember">
                                    Remember me
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button class="button" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                        <p>Don't have an account yet? <a href="signup.php">Sign Up</a></p>
                        <p><a href="reset.html">Forgot Password?</a></p>
                    </div>
                </div>
                <div class="col-6 login-img">
                    <img src=".././assets/images/IMG-1665.JPG" alt="login image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <script src=".././assets/js/index.js" async defer></script>
</body>

</html>