<header>
    <h2>
        <label for="nav-toggle"><span class="las la-bars"></span></label>
        Dashboard
    </h2>

    <div class="user-wrapper">
        <img src="../assets/images/New.jpg" width="40px" height="40px" alt="Profile image">
        <div>
            <h4><? echo $_SESSION["name"] ?></h4>
            <small><? echo $_SESSION["voter_id"] ?></small>
        </div>
    </div>
</header>