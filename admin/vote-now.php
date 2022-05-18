<?php
include "../shared/header.php";
?>

<div class="main-content">

    <?php include "../shared/top-nav.php" ?>

    <main>
        <!--Presidents Category-->
        <h1 class="category-title">Presidents</h1>
        <hr>
        <div class="row">
            <? echo getAllCandidatesToVote('President') ?>
            <!-- <div class="col-6">
                <div class="card">
                    <img class="card-img-top" src="../assets/images/Hustler.jpg" alt="Card-img">
                    <div class="card-body text-center">
                        <div class="card-text">
                            <h4>Name: <span>William Ruto</span></h4>
                            <h4>Party:<span>United Democratic Alliance</span></h4>
                            <h4><span class="las la-thumbs-up"></span><span class="badge rounded-pill bg-warning"><span class="votes">5 votes</span></span></h4>
                            <h4>Slogan: <span>Every Hustle Matters</span></h4>
                            <h4>Running Mate: <span>Rigathi Gachagua</span></h4>
                            <button type="button" class="button"><span class="las la-thumbs-up"></span><span>Vote</span></button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!--Governors-->
        <h1 class="category-title">Governors</h1>
        <hr>
        <div class="row">
            <? getAllCandidatesToVote('Governor') ?>
        </div>
        <!--Members of Parliament-->
        <h1 class="category-title">Members of Parliament</h1>
        <hr>
        <div class="row">
            <? getAllCandidatesToVote('Member of Parliament') ?>
        </div>
        <!--Senators-->
        <h1 class="category-title">Senators</h1>
        <hr>
        <div class="row">
            <? getAllCandidatesToVote('Senator') ?>
        </div>
        <!--Members of County Assembly-->
        <h1 class="category-title">Member of County Assembly</h1>
        <hr>
        <div class="row">
            <? getAllCandidatesToVote('Member of County Assembly') ?>
        </div>
    </main>

</div>

<?php include "../shared/footer.php"; ?>