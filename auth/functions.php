<?php include "../db/helpers.php";

session_start();

function redirect($location)
{
    return header("Location: " . $location);
}

function login_user()
{
    global $connection;

    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $voterid = clean($_POST['voter_id']);
        $password = clean($_POST['password']);
        $remember_me = isset($_POST['remember_me']);

        // print_r($voterid);

        /***********************email validation******************************************** */
        if (empty($voterid)) {
            $errors[] = "<div class ='alert alert-danger'>The voter Id field cannot be empty!!!!</div>";
        }

        /***********************password validation******************************************** */
        if (empty($password)) {

            $errors[] = "<div class ='alert alert-danger'>The password field cannot be empty!!!!</div>";
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error;
            }
        } else {

            // login user
            $sql = "SELECT voter_id,password,fullname FROM users WHERE voter_id = '" . $voterid . "'";
            $result = mysqli_query($connection, $sql);
            if (count_rows($result) == 1) {
                $row = fetch_array($result);
                $db_voterid = $row['voter_id'];
                $db_password = $row['password'];
                $fullname = $row['fullname'];
                if (password_verify($password, $db_password)) {
                    if ($remember_me == "on") {
                        setcookie("voter_id", $voterid, time() + 100);
                    }
                    $_SESSION['voter_id'] = $db_voterid;
                    $_SESSION['name'] = $fullname;
                    redirect("../admin/index.php");
                } else {
                    set_message("<div class ='alert alert-danger'>Error occurred while trying to login!Please enter correct login details</div>");
                    redirect("login.php");
                }
                return true;
            } else {
                set_message("<div class ='alert alert-danger'>Error occurred while trying to login!Please enter correct login details</div>");
                redirect("login.php");
            }
        }
    }
}
