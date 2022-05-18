<?php include "../db/helpers.php";
// all system functions 

// ================================== users management ==================================

function latestUsers()
{
    $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 10";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $id = $row['id'];
        $voter_id = $row['voter_id'];
        $national_id = $row['national_id'];
        $phone_number = $row['phone_number'];
        $county = $row['county'];
        $constituency = $row['constituency'];
        $created_at = $row['created_at'];
        $role = null;
        $is_admin = $row['is_admin'];
        $is_candidate = $row['is_candidate'];
        if ($is_admin) {
            $role = "Admin";
        } elseif ($is_candidate) {
            $role = "Candidate";
        } else {
            $role = "Voter";
        }
        echo <<<DELIMITER
        <tr>
            <td>$id</td>
            <td>$voter_id</td>
            <td>$county</td>
            <td>$constituency</td>
            <td>$national_id</td>
            <td>$phone_number</td>
            <td>$created_at</td>
            <td><span class="badge bg-primary">$role</span></td>
        </tr>
DELIMITER;
    }
}

// edit user request
if (isset($_GET['edit_user'])) {
    $id = $_GET['edit_user'];
    $sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
    $result = query($sql);
    confirm($result);
    if (mysqli_num_rows($result) == 1) {
        while ($row = fetch_array($result)) {
            $user_id = $row['id'];
            $voter_id = $row['voter_id'];
            $fullname = $row['fullname'];
            $national_id = $row['national_id'];
            $phone_number = $row['phone_number'];
            $county = $row['county'];
            $constituency = $row['constituency'];
            $created_at = $row['created_at'];
            $role = null;
            $is_admin = $row['is_admin'];
            $is_candidate = $row['is_candidate'];
            if ($is_admin) {
                $role = "Admin";
            } elseif ($is_candidate) {
                $role = "Candidate";
            } else {
                $role = "Voter";
            }
        }
    } else {
        redirect("users.php");
    }
}

// get page end with profile.php 
if (isset($_GET['edit_profile'])) {
    $voter_id = $_SESSION["voter_id"];
    $sql = "SELECT * FROM users WHERE voter_id = '$voter_id' LIMIT 1";
    $result = query($sql);
    confirm($result);
    if (mysqli_num_rows($result) == 1) {
        while ($row = fetch_array($result)) {
            $user_id = $row['id'];
            $voter_id = $row['voter_id'];
            $fullname = $row['fullname'];
            $national_id = $row['national_id'];
            $phone_number = $row['phone_number'];
            $county = $row['county'];
            $constituency = $row['constituency'];
            $created_at = $row['created_at'];
            $role = null;
            $is_admin = $row['is_admin'];
            $is_candidate = $row['is_candidate'];
            if ($is_admin) {
                $role = "Admin";
            } elseif ($is_candidate) {
                $role = "Candidate";
            } else {
                $role = "Voter";
            }
        }
    } else {
        redirect("index.php");
    }
}


// update user
if (isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $fullname = $_POST['fullname'];
    $national_id = $_POST['national_id'];
    $phone_number = $_POST['phone_number'];
    $county = $_POST['county'];
    $ward = $_POST['ward'];
    $constituency = $_POST['constituency'];
    $date_of_birth = $_POST['date_of_birth'];
    $role = $_POST['role'];

    $is_admin = null;
    $is_candidate = null;
    $is_voter = null;

    if ($role == "admin") {
        $is_admin = 1;
        $is_candidate = 0;
        $is_voter = 0;
    } elseif ($role == "candidate") {
        $is_admin = 0;
        $is_candidate = 1;
        $is_voter = 0;
    } else {
        $is_admin = 0;
        $is_candidate = 0;
        $is_voter = 1;
    }

    $sql = "UPDATE users SET ward = '$ward', date_of_birth = '$date_of_birth', fullname = '$fullname', national_id = '$national_id', phone_number = '$phone_number', county = '$county', constituency = '$constituency', is_admin = '$is_admin' , is_voter = '$is_voter', is_candidate = '$is_candidate' WHERE id = '$user_id'";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>User updated successfully</p>");
    } else {
        set_message("<p class='alert alert-danger'>User update failed</p>");
        redirect("users.php");
    }
}

// profile update
if (isset($_POST['update_profile'])) {
    $user_id = $_POST['user_id'];
    $fullname = $_POST['fullname'];
    $national_id = $_POST['national_id'];
    $phone_number = $_POST['phone_number'];
    $county = $_POST['county'];
    $ward = $_POST['ward'];
    $constituency = $_POST['constituency'];
    $date_of_birth = $_POST['date_of_birth'];


    $sql = "UPDATE users SET ward = '$ward', date_of_birth = '$date_of_birth', fullname = '$fullname', national_id = '$national_id', phone_number = '$phone_number', county = '$county', constituency = '$constituency' WHERE id = '$user_id'";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>User updated successfully</p>");
        redirect("profile.php?edit_profile");
    } else {
        set_message("<p class='alert alert-danger'>User update failed</p>");
        redirect("profile.php?edit_profile");
    }
}


// delete user
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    $sql = "DELETE FROM users WHERE id = '$id'";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>User deleted successfully</p>");
        redirect("users.php");
    } else {
        set_message("<p class='alert alert-danger'>User delete failed</p>");
        redirect("users.php");
    }
}

// get all users within the system
function getAllUser()
{
    $sql = "SELECT * FROM users ORDER BY voter_id ASC";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $id = $row['id'];
        $fullname = $row['fullname'];
        $voter_id = $row['voter_id'];
        $national_id = $row['national_id'];
        $phone_number = $row['phone_number'];
        $county = $row['county'];
        $constituency = $row['constituency'];
        $created_at = $row['created_at'];
        $role = null;
        $is_admin = $row['is_admin'];
        $is_candidate = $row['is_candidate'];
        if ($is_admin) {
            $role = "Admin";
        } elseif ($is_candidate) {
            $role = "Candidate";
        } else {
            $role = "Voter";
        }
        echo <<<DELIMITER
        <tr>
        <td>$voter_id</td>
        <td>$fullname</td>
        <td>$national_id</td>
        <td>$phone_number</td>
            <td>$county</td>
            <td>$constituency</td>
            <td>$created_at</td>
            <td><span class="badge bg-primary">$role</span></td>
            <td>
                <div class="action">
                    <a href="edit-user.php?edit_user=$id" id="edit"><span class="las la-edit"></span><span>Edit</span></button></a>
                    <a href="users.php?delete_user=$id" id="delete" onclick="return confirm('Are you sure you want to delete this user?')"><span class="las la-trash"></span><span>Delete</span></button></a>
                </div>
            </td>
        </tr>
DELIMITER;
    }
}

// create user
if (isset($_POST['create_user'])) {
    $fullname = $_POST['fullname'];
    $national_id = $_POST['national_id'];
    $phone_number = $_POST['phone_number'];
    $county = $_POST['county'];
    $ward = $_POST['ward'];
    $constituency = $_POST['constituency'];
    $date_of_birth = $_POST['date_of_birth'];
    $role = $_POST['role'];

    $is_admin = null;
    $is_candidate = null;
    $is_voter = null;

    if ($role == "admin") {
        $is_admin = 1;
        $is_candidate = 0;
        $is_voter = 0;
    } elseif ($role == "candidate") {
        $is_admin = 0;
        $is_candidate = 1;
        $is_voter = 0;
    } else {
        $is_admin = 0;
        $is_candidate = 0;
        $is_voter = 1;
    }

    $generated_password = generate_password();
    $voter_id = generate_voter_id();

    $password = hash_password($generated_password);

    $sql = "INSERT INTO users (voter_id, fullname, national_id, phone_number, county, ward, constituency, date_of_birth, is_admin, is_voter, is_candidate,password) VALUES ('$voter_id', '$fullname', '$national_id', '$phone_number', '$county', '$ward', '$constituency', '$date_of_birth', '$is_admin', '$is_voter', '$is_candidate', '$password')";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        // send sms to user with generated password and voter id
        $message = "Welcome to Edm. Here is your voter Id and password. Your voter id is '$voter_id' and your password is '$generated_password' to login to the system";
        $result   = $sms->send([
            'to'      => $phone_number,
            'message' => $message,
        ]);
        if ($result) {
            set_message("<p class='alert alert-success'>User created successfully</p>");
            redirect("users.php");
        } else {
            set_message("<p class='alert alert-danger'>User created successfully but sms failed to send</p>");
            redirect("users.php");
        }
        set_message("<p class='alert alert-success'>User created successfully</p>");
        redirect("users.php");
    } else {
        set_message("<p class='alert alert-danger'>User creation failed</p>");
        redirect("users.php");
    }
}

// get position being edited 
function get_position_edit()
{
    if (isset($_GET['edit_position'])) {
        $id = $_GET['edit_position'];
        $sql = "SELECT * FROM positions WHERE id = '$id'";
        $result = query($sql);
        confirm($result);
        while ($row = fetch_array($result)) {
            $id = $row['id'];
            $position = $row['name'];
            echo <<<DELIMITER
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" name="id" value="$id">
                            <label for="position">Position <span class="text-danger">*</label>
                            <input type="text" id="position" name="position" placeholder="Enter new position..." value="$position" required><br>
                        </div>
                        <div class="container">
                            <p>Status</p>
                            <label class="switch">
                                <input type="checkbox" name="status" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="container2">
                            <button type="submit" class="button" name="update_position"><span class="las la-plus"></span><span>Update</span></button>
                        </div>
                    </div>
                </div>
            </form>
DELIMITER;
        }
    }
}

// create position
if (isset($_POST['create_position'])) {
    $position = $_POST['position'];
    // check if status is checked
    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
    }
    $sql = "INSERT INTO positions (name,status) VALUES ('$position','$status')";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>Position created successfully</p>");
        redirect("positions.php");
    } else {
        set_message("<p class='alert alert-danger'>Position creation failed</p>");
        redirect("positions.php");
    }
}

// edit position
if (isset($_POST['update_position'])) {
    $id = $_POST['id'];
    $position = $_POST['position'];
    // check if status is checked
    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
    }
    $sql = "UPDATE positions SET name='$position', status='$status' WHERE id='$id'";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>Position updated successfully</p>");
        redirect("positions.php");
    } else {
        set_message("<p class='alert alert-danger'>Position update failed</p>");
        redirect("positions.php");
    }
}

// delete position
if (isset($_GET['delete_position'])) {
    $id = $_GET['delete_position'];
    $sql = "DELETE FROM positions WHERE id='$id'";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>Position deleted successfully</p>");
        redirect("positions.php");
    } else {
        set_message("<p class='alert alert-danger'>Position deletion failed</p>");
        redirect("positions.php");
    }
}

// get all positions
function getAllPositions()
{
    $sql = "SELECT * FROM positions ORDER BY id ASC";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $total_candidates = $row['total_candidates'];
        $created_at = $row['created_at'];
        $status = $row['status'];
        if ($status == 1) {
            $status = "Active";
        } else {
            $status = "Inactive";
        }
        echo <<<DELIMITER
        <tr>
        <td>$id</td>
        <td>$name</td>
        <td>$total_candidates</td>
        <td>$created_at</td>
        <td><span class="badge bg-success">$status</span></td>
            <td>
                <div class="action">
                    <a href="edit-position.php?edit_position=$id" id="edit"><span class="las la-edit"></span><span>Edit</span></button></a>
                    <a href="positions.php?delete_position=$id" id="delete" onclick="return confirm('Are you sure you want to delete this position?')"><span class="las la-trash"></span><span>Delete</span></button></a>
                </div>
            </td>
        </tr>
DELIMITER;
    }
}

// create_party
if (isset($_POST['create_party'])) {
    $name = $_POST['name'];

    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
    }

    $sql = "INSERT INTO parties (name,status) VALUES ('$name','$status')";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>Party created successfully</p>");
        redirect("parties.php");
    } else {
        set_message("<p class='alert alert-danger'>Party creation failed</p>");
        redirect("parties.php");
    }
}

// display parties
function displayParties()
{
    $sql = "SELECT * FROM parties ORDER BY id ASC";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $total_candidates = $row['total_candidates'];
        $created_at = $row['created_at'];
        $status = $row['status'];
        if ($status == 1) {
            $status = "Active";
        } else {
            $status = "Inactive";
        }
        echo <<<DELIMITER
        <tr>
        <td>$id</td>
        <td>$name</td>
        <td>$total_candidates</td>
        <td>$created_at</td>
        <td><span class="badge bg-success">$status</span></td>
            <td>
                <div class="action">
                    <a href="edit-party.php?edit_party=$id" id="edit"><span class="las la-edit"></span><span>Edit</span></button></a>
                    <a href="parties.php?delete_party=$id" id="delete" onclick="return confirm('Are you sure you want to delete this party?')"><span class="las la-trash"></span><span>Delete</span></button></a>
                </div>
            </td>
        </tr>
DELIMITER;
    }
}

// get party being edited
function getParty()
{
    if (isset($_GET['edit_party'])) {
        $id = $_GET['edit_party'];
        $sql = "SELECT * FROM parties WHERE id='$id'";
        $result = query($sql);
        confirm($result);
        while ($row = fetch_array($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $status = $row['status'];
            if ($status == 1) {
                $status = "checked";
            } else {
                $status = "";
            }
            echo <<<DELIMITER
            <form action="" method="post">
            <input type="hidden"name="id" value="$id">
                <div class="row">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-6">
                                <label for="party">Party<span class="text-danger">*</label>
                                <input type="text" id="party" name="name" placeholder="Enter new party name..." value="$name" required><br>
                            </div>
                            <div class="col-3">
                                <div class="switch-container">
                                    <p>Status</p>
                                    <label class="switch">
                                        <input type="checkbox" name="status" checked>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="party-container">
                        <button type="submit" class="button" name="update_party"><span class="las la-plus"></span><span>Update</span></button>
                    </div>
                </div>
            </form>
    DELIMITER;
        }
    }
}


// edit party
if (isset($_POST['update_party'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    if (isset($_POST['status'])) {
        $status = 1;
    } else {
        $status = 0;
    }

    $sql = "UPDATE parties SET name='$name', status='$status' WHERE id='$id'";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>Party updated successfully</p>");
        redirect("parties.php");
    } else {
        set_message("<p class='alert alert-danger'>Party update failed</p>");
        redirect("parties.php");
    }
}

// delete party
if (isset($_GET['delete_party'])) {
    $id = $_GET['delete_party'];
    $sql = "DELETE FROM parties WHERE id='$id'";
    $result = query($sql);
    confirm($result);
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>Party deleted successfully</p>");
        redirect("parties.php");
    } else {
        set_message("<p class='alert alert-danger'>Party deletion failed</p>");
        redirect("parties.php");
    }
}

// get positions in select
function getPositions()
{
    $sql = "SELECT * FROM positions";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $name = $row['name'];
        echo "<option value='$name'><span class='text-capitalize'>$name</span></option>";
    }
}

// get all users where is_candidate = 1
function getCandidates()
{
    $sql = "SELECT * FROM users WHERE is_candidate = 1";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $fullname = $row['fullname'];
        $id = $row['id'];
        echo "<option value='$id'>$fullname</option>";
    }
}


// get party in select
function getPartyInSelect()
{
    $sql = "SELECT * FROM parties";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $name = $row['name'];
        echo "<option value='$name'><span class='text-capitalize'>$name</span></option>";
    }
}

// apply_candidate
if (isset($_POST['apply_candidate'])) {
    $id = $_POST['id'];
    $party = $_POST['party'];
    $county = $_POST['county'];
    $ward = $_POST['ward'];
    $position = $_POST['position'];
    $constituency = $_POST['constituency'];

    $sql = "UPDATE users SET is_candidate = 1, party = '$party', county = '$county', ward = '$ward', position = '$position', constituency = '$constituency' WHERE id = '$id'";
    $result = query($sql);
    confirm($result);


    // update candidate count in parties table where name = party 
    $sql = "SELECT * FROM parties WHERE name = '$party'";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $candidates = $row['candidates'];
        $candidates++;
        $sql = "UPDATE parties SET total_candidates = '$candidates' WHERE name = '$party'";
        $result = query($sql);
        confirm($result);
    }

    // update candidate count in positions table where name = position
    $sql = "SELECT * FROM positions WHERE name = '$position'";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $candidates = $row['candidates'];
        $candidates++;
        $sql = "UPDATE positions SET total_candidates = '$candidates' WHERE name = '$position'";
        $result = query($sql);
        confirm($result);
    }
    if (mysqli_affected_rows($connection) == 1) {
        set_message("<p class='alert alert-success'>Candidate applied successfully</p>");
        redirect("apply-candidate.php");
    } else {
        set_message("<p class='alert alert-danger'>Candidate application failed</p>");
        redirect("apply-candidate.php");
    }
}
// ================================== voters management ==================================


function latestVoters()
{
    $sql = "SELECT * FROM users WHERE is_voter = 1 ORDER BY id DESC LIMIT 10";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $fullname = $row['fullname'];
        $voter_id = $row['voter_id'];
        echo <<<DELIMITER
        <tr>
            <td><img src="../assets/images/New.jpg" width="30px" height="30px" alt="Profile Image"></td>
            <td>$voter_id</td>
            <td>$fullname</td>
        </tr>
DELIMITER;
    }
}


// get all voters
function getAllVoters()
{
    $sql = "SELECT * FROM users WHERE is_voter = 1 ORDER BY id DESC";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $id = $row['id'];
        $fullname = $row['fullname'];
        $voter_id = $row['voter_id'];
        $national_id = $row['national_id'];
        $phone_number = $row['phone_number'];
        $county = $row['county'];
        $constituency = $row['constituency'];
        $created_at = $row['created_at'];
        $status = $row['is_verified'];
        if ($status == 1) {
            $status = "<span class='bg-success'>Verified</span>";
        } else {
            $status = "<span class='bg-warning'>Not Verified</span>";
        }
        echo <<<DELIMITER
        <tr>
        <td>$voter_id</td>
        <td>$fullname</td>
        <td>$national_id</td>
        <td>$phone_number</td>
            <td>$county</td>
            <td>$constituency</td>
            <td>$created_at</td>
            <td>$status</td>
            <td>
                <div class="action">
                    <a href="edit-user.php?edit_user=$id" id="edit"><span class="las la-edit"></span><span>Edit</span></button></a>
                    <a href="users.php?delete_user=$id" id="delete" onclick="return confirm('Are you sure you want to delete this user?')"><span class="las la-trash"></span><span>Delete</span></button></a>
                </div>
            </td>
        </tr>
DELIMITER;
    }
}

// ================================== counting users management ==================================

function countAllUsers()
{
    $sql = "SELECT * FROM users";
    $result = query($sql);
    confirm($result);
    $count = mysqli_num_rows($result);
    echo $count;
}

function countAllVoters()
{
    $sql = "SELECT * FROM users WHERE is_voter = 1";
    $result = query($sql);
    confirm($result);
    $count = mysqli_num_rows($result);
    echo $count;
}

function countAllCandidates()
{
    $sql = "SELECT * FROM users WHERE is_candidate = 1";
    $result = query($sql);
    confirm($result);
    $count = mysqli_num_rows($result);
    echo $count;
}


// ================================== candidate management ==================================

// get all voters
function getAllCandidates()
{
    $sql = "SELECT * FROM users WHERE is_candidate = 1 ORDER BY id DESC";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $id = $row['id'];
        $fullname = $row['fullname'];
        $voter_id = $row['voter_id'];
        $national_id = $row['national_id'];
        $phone_number = $row['phone_number'];
        $county = $row['county'];
        $constituency = $row['constituency'];
        $created_at = $row['created_at'];
        $status = $row['is_verified'];
        if ($status == 1) {
            $status = "<span class='bg-success'>Verified</span>";
        } else {
            $status = "<span class='bg-warning'>Not Verified</span>";
        }
        echo <<<DELIMITER
        <tr>
        <td>$voter_id</td>
        <td>$fullname</td>
        <td>$national_id</td>
        <td>$phone_number</td>
            <td>$county</td>
            <td>$constituency</td>
            <td>$created_at</td>
            <td>$status</td>
            <td>
                <div class="action">
                    <a href="edit-user.php?edit_user=$id" id="edit"><span class="las la-edit"></span><span>Edit</span></button></a>
                    <a href="users.php?delete_user=$id" id="delete" onclick="return confirm('Are you sure you want to delete this user?')"><span class="las la-trash"></span><span>Delete</span></button></a>
                </div>
            </td>
        </tr>
DELIMITER;
    }
}


function getAllCandidatesToVote($position)
{
    $sql = "SELECT * FROM users WHERE is_candidate = 1 AND position = '$position' ORDER BY id DESC";
    $result = query($sql);
    confirm($result);
    while ($row = fetch_array($result)) {
        $id = $row['id'];
        $fullname = $row['fullname'];
        $party = $row['party'];
        $county = $row['county'];
        echo <<<DELIMITER
        <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="https://avatars.githubusercontent.com/u/70540294?v=4" alt="Card-img">
                    <div class="card-body text-center">
                        <div class="card-text">
                            <h4>Name: <span>$fullname</span></h4>
                            <h4>County: <span>$county</span></h4>
                            <h4>Party: <span>$party</span></h4>
                            <h4><span class="badge rounded-pill bg-warning"><span class="votes">10 votes</span></span></h4>
                            <a href="" class="vote-button"><span class="las la-thumbs-up"></span><span>Vote</span></a>
                        </div>
                    </div>
                </div>
            </div>
DELIMITER;
    }
}
