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
                        <h3>Create a new user</h3>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-6 pr-5">
                                    <label for="fullname">FullName <span class="text-danger">*</label>
                                    <input type="text" id="fullname" name="fullname" placeholder="FullName" required><br>
                                    <label for="county">County <span class="text-danger">*</label>
                                    <select id="county" name="county">
                                        <?php echo counties() ?>
                                    </select>
                                    <label for="ward">Ward <span class="text-danger">*</label>
                                    <select id="ward" name="ward">
                                        <? wards() ?>
                                    </select>
                                    <label for="constituency">Constituency <span class="text-danger">*</label>
                                    <select id="constituency" name="constituency">
                                        <?php echo constituency() ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="nationalID">National ID <span class="text-danger">*</label>
                                    <input type="number" id="nationalID" name="national_id" placeholder="Minimum of 8 digits required..." required><br>
                                    <label for="date">Date Of Birth <span class="text-danger">*</label>
                                    <input type="date" id="date" name="date_of_birth"><br>
                                    <label for="phonenumber">Phone Number <span class="text-danger">*</label>
                                    <input type="number" id="phonenumber" name="phone_number" placeholder="PhoneNumber" required><br>
                                    <label for="role">Role<span class="text-danger">*</label>
                                    <select id="role" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="voter">Voter</option>
                                        <option value="candidate">Candidate</option>
                                    </select>
                                    <div class="create-btn">
                                        <button type="submit" class="button" name="create_user"><span class="las la-plus"></span><span>Create</span></button>
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