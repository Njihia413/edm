<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <div class="constituency-grid">
            <div class="constituencies">
                <div class="card">
                    <div class="card-header">
                        <h3>All Counties and its details</h3>
                    </div>

                    <div class="card-body">
                        <table width="100%" id="myTable">
                            <thead>
                                <tr>
                                    <td>County Id</td>
                                    <td>County Name</td>
                                    <td>Constituency Id</td>
                                    <td>Constituency Name</td>
                                    <td>Ward Id</td>
                                    <td>Ward Name</td>
                                </tr>
                            </thead>
                            <tbody>
                                <? getAllCountiesList(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

<?php include "../shared/footer.php"; ?>