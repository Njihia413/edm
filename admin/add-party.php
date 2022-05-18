<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <div class="add-party-grid">
            <div class="add-parties">
                <div class="card">
                    <div class="card-header">
                        <h3>Create a new party</h3>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <!-- <div class="col-3">
                                <img src="images/Flag.jpg" alt="Prof" width="200px" height="200px" class="party-img">
                            </div> -->
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="party">Party<span class="text-danger">*</label>
                                            <input type="text" id="party" name="name" placeholder="Enter new party name..." required><br>
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
                                    <button type="submit" class="button" name="create_party"><span class="las la-plus"></span><span>Create</span></button>
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