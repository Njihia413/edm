<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>
    <main>
        <div class="voter-grid">
            <div class="voters">
                <div class="card">
                    <div class="card-header">
                        <h3>All Voters</h3>
                    </div>

                    <div class="card-body">
                        <table width="100%" id="myTable">
                            <thead>
                                <tr>
                                    <td>Voter Id</td>
                                    <td>Fullname</td>
                                    <td>National ID</td>
                                    <td>Mobile</td>
                                    <td>County</td>
                                    <td>Constituency</td>
                                    <td>Created At</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <? getAllVoters() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


</div>

<?php include "../shared/footer.php"; ?>