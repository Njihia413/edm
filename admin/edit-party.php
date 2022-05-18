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
                        <h3> party</h3>
                    </div>

                    <div class="card-body">
                        <? getParty() ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include "../shared/footer.php"; ?>