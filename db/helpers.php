<?php include "connection.php";



/**HELPER FUNCTIONS  */

function fetch_array($result)
{
    return  mysqli_fetch_array($result);
}

/**query function */

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}


/**redirect function */

// function redirect($location)
// {
//     return header("Location: " . $location);
// }Pa$$w0rd!

/**last id insterted function======================== */

function last_insert_id()
{
    global $connection;
    return mysqli_insert_id($connection);
}

/**==============set message function= */

function set_message($msg)
{

    if (!empty($msg)) {

        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

/**============display the message create through the session========== */

function display_message()
{

    if (isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

/**=====function to check whtether there an error to the query========== */

function confirm($result)
{
    global $connection;

    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

/**============prevent mysql stringinjection=============================== */

function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

/**============function to count rows===== */

function count_rows($result)
{
    return mysqli_num_rows($result);
}

/**===========function to generate a unique token and set it to session===== */

function token_generator()
{
    return $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
}

/**===========function to hast user password========================== */

function hash_password($password)
{
    return password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
}


// generate password
function generate_password()
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, 8);
    return $password;
}

// generate a random number of a given length
function generate_voter_id()
{
    $chars = "0123456789";
    $voter_id = substr(str_shuffle($chars), 0, 6);
    return $voter_id;
}

/**===========clean from htmlentities========================== */

function clean($string)
{
    return htmlentities($string);
}


/**===========send email to user email========================== */

function send_email($email, $subject, $message, $headers)
{
    return mail($email, $subject, $message, $headers);
}


// get all constituency
function counties()
{
    $results = query("SELECT DISTINCT(county_name) FROM counties");
    confirm($results);
    if (count_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo '<option value="' . $row["county_name"] . '">' . $row["county_name"] . '</option>';
        }
    }
    return;
}

// get all constituency
function constituency()
{
    $results = query("SELECT DISTINCT(constituency_name) FROM counties");
    confirm($results);
    if (count_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo '<option value="' . $row["constituency_name"] . '">' . $row["constituency_name"] . '</option>';
        }
    }
    return;
}

// get all counties and its details
function getAllCountiesList()
{
    $results = query("SELECT * FROM counties");
    confirm($results);
    if (count_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo '<tr>
                    <td>' . $row["county_id"] . '</td>
                    <td style="text-transform:capitalize;">' . strtolower($row["county_name"]) . '</td>
                    <td style="text-transform:capitalize;">' . strtolower($row["constituency_id"]) . '</td>
                    <td style="text-transform:capitalize;">' . strtolower($row["constituency_name"]) . '</td>
                    <td style="text-transform:capitalize;">' . strtolower($row["ward_id"]) . '</td>
                    <td style="text-transform:capitalize;">' . strtolower($row["ward_name"]) . '</td>
                </tr>';
        }
    }
    return;
}

// get all wards
function wards()
{
    $results = query("SELECT DISTINCT(ward_name) FROM counties");
    confirm($results);
    if (count_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo '<option value="' . $row["ward_name"] . '">' . $row["ward_name"] . '</option>';
        }
    }
    return;
}

function is_admin()
{
    if (isset($_SESSION['voter_id'])) {
        $voter_id = $_SESSION['voter_id'];
        $results = query("SELECT * FROM users WHERE voter_id = '$voter_id'");
        confirm($results);
        if (count_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                return $row['is_admin'];
            }
        }
    }
}

function is_voter()
{
    if (isset($_SESSION['voter_id'])) {
        $voter_id = $_SESSION['voter_id'];
        $results = query("SELECT * FROM users WHERE voter_id = '$voter_id'");
        confirm($results);
        if (count_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                return $row['is_voter'];
            }
        }
    }
}

function is_candidate()
{
    if (isset($_SESSION['voter_id'])) {
        $voter_id = $_SESSION['voter_id'];
        $results = query("SELECT * FROM users WHERE voter_id = '$voter_id'");
        confirm($results);
        if (count_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                return $row['is_candidate'];
            }
        }
    }
}
