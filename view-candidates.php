<?php
require_once('class.php');

$vote->Login();
$vote->voterRegister();
$vote->loginAdmin();


include('includes/header.php');

if ($vote->getUserData() == true) {
    include('includes/usernav.php');
} else {
    include('includes/nav.php');
}

$election_id = $_GET['id'];
$election = $vote->getElection($election_id);
$positions = $vote->getPositionId();
$start_date = $election['start_date'];
$end_date = $election['end_date'];
$now = date("Y-m-d H:i:s");

?>
<main>
    <!-- Dcc Logo-->
    <div class="container d-flex justify-content-center">
        <h5 class="title-app mt-5">Candidates</h5>
    </div>
    <!--Candidates-->
    <div class="container">

        <?php foreach ($positions as $pos) {
            $position_id = $pos['position_id'];
            $candidates = $vote->getCandidate($election_id, $position_id, $voterDetails = 'user');

        ?>
            <div class="row">
                <?php if (!empty($candidates)) {
                    // Sort candidates by vote result in descending order
                    usort($candidates, function ($a, $b) use ($vote) {
                        $aResult = $vote->getVoteResults($a['id']);
                        $bResult = $vote->getVoteResults($b['id']);
                        return $bResult - $aResult;
                    });

                    $posCount = $pos['count'];

                    // Determine the number of winners based on $pos_count
                    if ($posCount >= count($candidates)) {
                        $winnersCount = count($candidates);
                    } else {
                        $winnersCount = $posCount;
                    }

                    // Set the label for the top candidates as "Winner"
                    for ($i = 0; $i < $winnersCount; $i++) {
                        $candidates[$i]['winner'] = "Wins";
                    }
                ?>
                    <h3 class="mx-3 mt-4"> <?= $pos['position_title']?></h3>
                    <?php foreach ($candidates as $candi) {
                        $party = $vote->getParty($candi['party_id']);
                        $voteCount = $vote->getVoteResults($candi['id']);
                    ?>
                        <div class="col-sm-4">
                            <div class="card mx-3 mt-3" style="border-radius:25px;" id="shadow2">
                                <a href="" tabindex="-1" data-bs-toggle="modal" data-bs-target="#candidate<?= $candi['id'] ?>"><img class="card-img img-fluid" style="width:500px; height: 200px; border-top-left-radius:25px; border-top-right-radius:25px;" src="img/donaldmc.jpg" alt=""></a>
                                <h5 class="name mx-3 my-3 text-center">
                                    <?= $candi['first_name'] . " " . $candi['middle_name'] . " " . $candi['last_name'] ?>
                                </h5>
                                <h5 class="position mx-3 my-3 text-center">
                                    Running for <?= $pos['position_title'] ?>
                                </h5>
                                <h5 class="position mx-3 my-3 text-center">
                                    <?= $party['party'] ?>
                                </h5>
                                <?php if ($now >= $start_date && $now <= $end_date) { ?>

                                <?php } else { ?>
                                    <div class="text-center">
                                    <?php if(!empty($voteCount)){ ?>

                                        <?php if($voteCount <= 1 || 0) {?>
                                            <p><?= $voteCount." Vote" ?></p>
                                            <?php }else{ ?>
                                        <p><?= $voteCount." Votes" ?></p>
                                        <?php } ?>

                                        <?php }else{ ?>
                                            <p><?= "0"." Votes" ?></p>
                                            <?php } ?>
                                    </p>
                                        <div class="d-flex justify-content-center">
                                            <p>
                                                <?php if (!empty($candi['winner'])) { ?>
                                                    <span class="text-success"><?= $candi['winner'] ?></span>
                                                <?php } else { ?>

                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- View Candidate-->
                        <div class="modal fade modal-signin" id="candidate<?= $candi['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
                                    <div class="modal-header p-3 pb-3">
                                        <h5 class="modal-title" id="staticBackdropLabel">Adding Admin</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <br>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
            </div>

        <?php } ?>
    <?php } ?>
    </div>
    <!--Candidates-->

</main>

<!-- modal admin login -->
<div class="modal fade modal-signin" id="login-admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content rounded-5 shadow" style="border-radius: 30px">
            <div class="modal-header p-3 pb-3">
                <h5 class="modal-title text-white" id="staticBackdropLabel">
                    Admin Login
                </h5>
                <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <br />
            <div class="modal-body p-5 pt-0">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-2">
                        <label for="exampleInputPassword1" class="form-label">Access Code</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="accesscode" placeholder="Password" required />
                        <a href="#" class="mt-2"><small>Forgot Access Code? </small> </a>
                    </div>
                    <div class="d-flex pt-1">
                        <button type="submit" id="loginbutton" name="login-admin" class="btn btn-primary mt-2 flex-grow-1">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/footer.php');
?>
<?php
include('includes/modals.php');
?>
<!-- Login and register modals  -->




<?php

?>