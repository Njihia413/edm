<?php
include "../shared/header.php";
// include "../functions/functions.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <h2>Hello! Welcome back, <small><? echo $_SESSION["name"] ?></small>
        </h2>
        <?php if (is_admin() == 1) : ?>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><? countAllUsers() ?></h1>
                        <span>Users</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><? countAllVoters() ?></h1>
                        <span>Voters</span>
                    </div>
                    <div>
                        <span class="las la-hand-paper"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><? countAllCandidates() ?></h1>
                        <span>Candidates</span>
                    </div>
                    <div>
                        <span class="las la-address-card"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>6</h1>
                        <span>Positions</span>
                    </div>
                    <div>
                        <span class="las la-thumbtack"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="users">
                    <div class="card">
                        <div class="card-header">
                            <h3>Latest Users</h3>
                            <a href="users.php"><button>See all <span class="las la-arrow-right"></span></button></a>
                        </div>

                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Voter Id</td>
                                        <td>County</td>
                                        <td>Constituency</td>
                                        <td>National ID</td>
                                        <td>Mobile</td>
                                        <td>Created At</td>
                                        <td>Role</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? latestUsers() ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="voters">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Voters</h3>
                            <a href="voters.php"><button>See all <span class="las la-arrow-right"></span></button></a>
                        </div>

                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Photo</td>
                                        <td>Voter Id</td>
                                        <td>Full Names</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php latestVoters() ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </main>
</div>

<?php include "../shared/footer.php"; ?>