<?php include "../db/helpers.php"; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up | Account Management</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href=".././assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href=".././assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href=".././assets/images/favicon-16x16.png">
    <link rel="manifest" href=".././assets/images//site.webmanifest">
    <link rel="stylesheet" href=".././assets/css/signup.css">
    <script src="https://kit.fontawesome.com/aabe1c8dd0.js" crossorigin="anonymous"></script>
    <!-- main scripts -->
    <script src="js/main.js"></script>
</head>

<body>
    <div class="container">
        <form id="Form1">
            <h2>Account Details</h2>
            <hr id="line1">
            <label for="fullname">FullName <span class="text-danger">*</label>
            <input type="text" id="fullname" name="full_name" placeholder="FullName" required><br>
            <label for="password">Password <span class="text-danger">*</label>
            <input type="password" class="active" id="password" name="password" minlength="6" placeholder="Enter a minimum of 6 characters..." required><br>
            <i class="fa-solid fa-eye-slash" id="hide" onclick="myFunction()"></i>
            <i class="fa-solid fa-eye" id="show" onclick="myFunction()"></i>
            <label for="password">Confirm Password <span class="text-danger">*</label>
            <input type="password" class="active" id="password" name="confirm_password" minlength="8" required><br>
            <i class="fa-solid fa-eye-slash" id="hide" onclick="myFunction()"></i>
            <i class="fa-solid fa-eye" id="show" onclick="myFunction()"></i>
            <div class="btn">
                <button class="button" type="button" form="form" id="Next1">Next</button><br>
            </div>
            <p id="p1">Already have an account? <a href="login.php">Login</a></p>
        </form>

        <form id="Form2">
            <h2>Personal Info</h2>
            <hr id="line1">
            <label for="nationalID">National ID <span class="text-danger">*</label>
            <input type="number" id="nationalID" name="national_id" placeholder="Minimum of 8 digits required..." required><br>
            <label for="date">Date Of Birth <span class="text-danger">*</label>
            <input type="date" id="date" name="date"><br>
            <label for="phonenumber">Phone Number <span class="text-danger">*</label>
            <input type="text" id="phonenumber" name="phone_number" placeholder="PhoneNumber" required><br>
            <div class="btn">
                <button class="button" type="button" form="form" id="Previous1">Previous</button><br>
                <button class="button" type="button" form="form" id="Next2">Next</button><br>
            </div>
        </form>

        <form id="Form3">
            <h2>Location</h2>
            <hr id="line1">
            <label for="county">County <span class="text-danger">*</label>
            <select id="county" name="county">
            <?php echo counties() ?>
            </select>
            <label for="constituency">Constituency <span class="text-danger">*</label>
            <select id="constituency" name="constituency" class="text-capitalize" required>
                <?php echo constituency() ?>
            </select>

            <label for="ward">Ward <span class="text-danger">*</label>
            <select id="ward" name="ward" required>
                <?php echo wards() ?>
            </select>
            <div class="btn">
                <button class="button" type="button" form="form" id="Previous2">Previous</button><br>
                <button class="button" type="submit" form="form" value="submit" onclick="createVoterUserAccount()">Sign Up</button><br>
            </div>
        </form>

        <div class="progress-bar">
            <div id="progress"></div>
            <div class="progress-col"><small>Step 1</small></div>
            <div class="progress-col"><small>Step 2</small></div>
            <div class="progress-col"><small>Step 3</small></div>
        </div>
    </div>

    <script src=".././assets/js/index.js" async defer></script>

</body>

</html>