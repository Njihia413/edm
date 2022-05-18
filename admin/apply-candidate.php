<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>


    <main>
        <?php
        display_message();
        ?>
        <div class="add-user-grid">
            <div class="add-users">
                <div class="card">
                    <div class="card-header">
                        <h3>Apply for Candidate</h3>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <label for="constituency">Candidate<span class="text-danger">*</label>
                                    <select id="county" name="id" required>
                                        <?php echo getCandidates() ?>
                                    </select>
                                    <label for="county">County <span class="text-danger">*</label>
                                    <select id="county" name="county" required>
                                        <?php echo counties() ?>
                                    </select>
                                    <label for="ward">Ward <span class="text-danger">*</label>
                                    <select id="ward" name="ward" required>
                                        <? wards() ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="constituency">Constituency <span class="text-danger">*</label>
                                    <select id="constituency" name="constituency" required>
                                        <?php echo constituency() ?>
                                    </select>
                                    <label for="position">Position<span class="text-danger">*</label>
                                    <select id="position" name="position" required>
                                        <? echo getPositions() ?>
                                    </select>
                                    <label for="position">Party<span class="text-danger">*</label>
                                    <select id="party" name="party" required>
                                        <? echo getPartyInSelect() ?>
                                    </select>
                                    <div class="create-btn">
                                        <button type="submit" class="button" name="apply_candidate"><span>Apply</span></button>
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