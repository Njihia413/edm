<div class="sidebar">
    <div class="sidebar-logo">
        <!--Logo-->
    </div>

    <div class="sidebar-menu nav">
        <ul>
            <li><a href="index.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
            </li>
        </ul>
        <?php if (is_admin() == 1) : ?>
            <ul>
                <li><a href="users.php"><span class="las la-users"></span><span>Users</span></a></li>
            </ul>

            <ul>
                <li><a href="voters.php"><span class="las la la-user-circle"></span><span>Voters</span></a></li>
            </ul>

            <ul>
                <li><a href="candidates.php"><span class="las la-address-card"></span><span>Candidates</span></a></li>
            </ul>
            <ul>
                <li><a href="counties.php"><span class="las la-map-marker"></span><span>Counties</span></a></li>
            </ul>

            <ul>
                <li><a href="positions.php"><span class="las la-thumbtack"></span><span>Positions</span></a></li>
            </ul>

            <ul>
                <li><a href="parties.php"><span class="las la-sitemap"></span><span>Party</span></a></li>
            </ul>

            <ul>
                <li><a href="apply-candidate.php"><span class="las la-address-card"></span><span>Apply for a Candidate</span></a></li>
            </ul>
        <?php endif ?>
        <ul>
            <li><a href="vote-now.php"><span class="las la-hand-paper"></span><span>Vote Now</span></a></li>
        </ul>

        <ul>
            <li><a href="profile.php?edit_profile"><span class="las la-user"></span><span>Profile</span></a></li>
        </ul>
        <?php if (is_admin() == 1) : ?>
            <ul>
                <li><a href="reports.php"><span class="las la-file-alt"></span><span>Reports</span></a></li>
            </ul>
        <?php endif ?>
    </div>
</div>