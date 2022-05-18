<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <?php
        display_message();
        ?>
        <div class="add-position">
            <a href="add-position.php"><button type="button" class="button"><span class="las la-plus"></span><span>Add a new position</span></button></a>
        </div>
        <div class="position-grid">
            <div class="positions">
                <div class="card">
                    <div class="card-header">
                        <h3>All Positions</h3>
                    </div>

                    <div class="card-body">
                        <table width="100%" id="myTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Position</td>
                                    <td>Total candidates</td>
                                    <td>Date</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <? getAllPositions() ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

<?php include "../shared/footer.php"; ?>