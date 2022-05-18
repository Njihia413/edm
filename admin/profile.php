<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>
    <main>
        <div class="add-user-grid">
            <div class="add-users">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Profile: <span class="badge bg-secondary"><?php echo $role ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-6 pr-5">
                                    <label for="fullname">FullName <span class="text-danger">*</label>
                                    <input type="text" id="fullname" name="fullname" placeholder="FullName" value="<?php echo $fullname ?>" required><br>
                                    <label for="county">County <span class="text-danger">*</label>
                                    <select id="county" name="county" required>
                                        <?php echo counties() ?>
                                    </select>
                                    <label for="ward">Ward</label>
                                    <select id="ward" name="ward" required>
                                        <? wards() ?>
                                    </select>
                                    <label for="constituency">Constituency <span class="text-danger">*</label>
                                    <select id="constituency" name="constituency" required>
                                        <?php echo constituency() ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="nationalID">National ID <span class="text-danger">*</label>
                                    <input type="number" id="nationalID" name="national_id" placeholder="Minimum of 8 digits required..." value="<?php echo $national_id ?>" required><br>
                                    <label for="date">Date Of Birth <span class="text-danger">*</label>
                                    <input type="date" id="date" name="date_of_birth" value="<?php echo $date_of_birth ?>" required><br>
                                    <label for="phonenumber">Phone Number <span class="text-danger">*</label>
                                    <input type="text" id="phonenumber" name="phone_number" placeholder="Please enter valid phone number..." value="<?php echo $phone_number ?>" required><br>
                                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                    <div class="create-btn">
                                        <button type="submit" class="button" name="update_profile"><span class="las la-save"></span><span>Update</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


</div>

<?php include "../shared/footer.php"; ?>