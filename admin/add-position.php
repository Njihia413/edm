<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <div class="add-position-grid">
            <div class="add-positions">
                <div class="card">
                    <div class="card-header">
                        <h3>Create a new position</h3>
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="position">Position <span class="text-danger">*</label>
                                    <input type="text" id="position" name="position" placeholder="Enter new position..." required><br>
                                </div>
                                <div class="container">
                                    <p>Status</p>
                                    <label class="switch">
                                        <input type="checkbox" name="status" checked>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="container2">
                                    <button type="submit" class="button" name="create_position"><span class="las la-plus"></span><span>Create</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</div>

<?php include "../shared/footer.php"; ?>