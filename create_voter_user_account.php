<?php
include "db/connection.php";

require 'vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

$AT       = new AfricasTalking('maureenedm', 'b6266b7bd79d1d04fe7ef808a102c20927243d0cef58668fd8cb2043f54e7eb7');
$sms      = $AT->sms();


$body = file_get_contents('php://input');
$data = json_decode($body, true);

$password = password_hash($data['password'], PASSWORD_BCRYPT, array('cost' => 12));

$true = true;
$query = "INSERT INTO users(voter_id,fullname, password, national_id, phone_number, county, constituency,ward,is_voter) VALUES('{$data['voterId']}','{$data['fullname']}', '{$password}', '{$data['nationalId']}', '{$data['phoneNumber']}', '{$data['county']}', '{$data['constituency']}' , '{$data['ward']}', '{$true}')";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("QUERY FAILED" . mysqli_error($connection));
}

$result = $sms->send([
    'to'      => "+" . $data['phoneNumber'],
    'message' => "Welcome to Edm. Here is your voter Id:" . $data['voterId'] . " to login to the system"
]);
