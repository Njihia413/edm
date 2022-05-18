<?php include "../auth/check-auth.php"; ?>
<?php include "../functions/functions.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard- Welcome Back</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <style>
        .pr-5 {
            padding-right: 10px;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .text-lowercase {
            text-transform: lowercase;
        }
    </style>
</head>

<body>
    <input type="checkbox" id="nav-toggle">

    <?php include "siderbar.php"; ?>