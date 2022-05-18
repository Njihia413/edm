<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <?php
        display_message();
        ?>
        <div class="add-party">
            <a href="add-party.php"><button type="button" class="button"><span class="las la-plus"></span><span>Add a new party</span></button></a>
        </div>
        <div class="party-grid">
            <div class="parties">
                <div class="card">
                    <div class="card-header">
                        <h3>All Parties</h3>
                    </div>
                    <div class="card-body">
                        <table width="100%" id="myTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Party Name</td>
                                    <td>Total candidates</td>
                                    <td>Date</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <? echo displayParties(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include "../shared/footer.php"; ?>