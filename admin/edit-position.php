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
                    <? echo get_position_edit() ?>
                </div>
            </div>
        </div>
    </main>

</div>

<?php include "../shared/footer.php"; ?>