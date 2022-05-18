<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <?php
        display_message();
        ?>
        <div class="add-user">
            <a href="add-user.php" id="add"><button type="button" class="button"><span class="las la-plus"></span><span>Add a new user</span></button></a>
        </div>
        <div class="user-grid">
            <div class="users">
                <div class="card">
                    <div class="card-header">
                        <h3>All Users</h3>
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
                                    <td>Role</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <? getAllUser(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


</div>

<?php include "../shared/footer.php"; ?>