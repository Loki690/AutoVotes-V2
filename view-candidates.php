<?php
require_once('class.php');
$vote->voterRegister();
include('includes/header.php');

if ($vote->getUserData() == true) {
    include('includes/usernav.php');
} else {
    include('includes/nav.php');
}

$election_id = $_GET['id'];
$election = $vote->getElection($election_id);
$positions = $vote->getPositionId();

date_default_timezone_set('Asia/Manila');
$start_date = $election['start_date'];
$end_date = $election['end_date'];
$now = date("Y-m-d H:i:s");

?>
<main>

    <div class="container justify-content-center text-center mt-5">
        <?php if ($now >= $start_date && $now <= $end_date) { ?>
            <h1>Election is Ongoing</h1>
            <div class="d-flex justify-content-center">
                <h4 class="px-2"><span id="days"></span><span class=""> Days</span></h4>
                <h4 class="px-2"><span id="hours"></span><span class=""> Hours</span></h4>
                <h4 class="px-2"><span id="minutes"></span><span class=""> Min</span></h4>
                <h4 class="px-2"><span id="seconds"></span><span class=""> Sec</span></h4>
            </div>
            <script type="text/javascript">
                function countdown() {
                    var now = new Date();
                    var eventDate = new Date("<?= date('F d, Y g:i A', strtotime($election['end_date'])) ?>");
                    var currentTime = now.getTime();
                    var eventTime = eventDate.getTime();
                    var remainingTime = eventTime - currentTime;
                    var seconds = Math.floor(remainingTime / 1000);
                    var minutes = Math.floor(seconds / 60);
                    var hours = Math.floor(minutes / 60);
                    var days = Math.floor(hours / 24);
                    hours %= 24;
                    minutes %= 60;
                    seconds %= 60;
                    document.getElementById("days").innerHTML = days;
                    document.getElementById("hours").innerHTML = hours;
                    document.getElementById("minutes").innerHTML = minutes;
                    document.getElementById("seconds").innerHTML = seconds;
                    if (remainingTime <= 0) {
                        location.reload();
                    } else {
                        setTimeout(countdown, 1000);
                    }
                }
                countdown();
            </script>
        <?php } else if ($now >= $end_date) { ?>
            <h1 class="text-danger">Election is Ended </h1>
        <?php } else if ($now <= $end_date) { ?>
            <script type="text/javascript">
                function countdown() {
                    var now = new Date();
                    var eventDate = new Date("<?= date('F d, Y g:i A', strtotime($election['start_date'])) ?>");
                    var currentTime = now.getTime();
                    var eventTime = eventDate.getTime();
                    var remainingTime = eventTime - currentTime;
                    var seconds = Math.floor(remainingTime / 1000);
                    var minutes = Math.floor(seconds / 60);
                    var hours = Math.floor(minutes / 60);
                    var days = Math.floor(hours / 24);
                    hours %= 24;
                    minutes %= 60;
                    seconds %= 60;
                    document.getElementById("days").innerHTML = days;
                    document.getElementById("hours").innerHTML = hours;
                    document.getElementById("minutes").innerHTML = minutes;
                    document.getElementById("seconds").innerHTML = seconds;
                    if (remainingTime <= 0) {
                        location.reload();
                    } else {
                        setTimeout(countdown, 1000);
                    }
                }
                countdown();
            </script>

            <div>
                <h2>Election starts in</h2>
            </div>
            <div class="d-flex justify-content-center">
                <h4 class="px-2"><span id="days"></span><span class=""> Days</span></h4>
                <h4 class="px-2"><span id="hours"></span><span class=""> Hours</span></h4>
                <h4 class="px-2"><span id="minutes"></span><span class=""> Min</span></h4>
                <h4 class="px-2"><span id="seconds"></span><span class=""> Sec</span></h4>
            </div>
        <?php } ?>

    </div>
    <!-- Dcc Logo-->
    <div class="container d-flex justify-content-center">
        <h2 class="title-app mt-5">Official Candidates</h2>
    </div>
    <!--Candidates-->
    <div class="container">

        <?php foreach ($positions as $pos) {
            $position_id = $pos['position_id'];
            $candidates = $vote->getCandidate($election_id, $position_id, $voterDetails = 'user');

        ?>
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
                <div class="row mx-2">
                    <h2 class="mx-3 mt-5 fw-bold text-center"> Running for <?= $pos['position_title'] ?></h2>
                    <?php foreach ($candidates as $candi) {
                        $party = $vote->getParty($candi['party_id']);
                        $voteCount = $vote->getVoteResults($candi['id']);
                    ?>
                        <div class="col-sm-3 mt-1">
                            <div class="card mt-3" style="border-radius:25px;" id="shadow2">
                                <h5 class="name mx-3 my-3 text-center">
                                    <?= $candi['first_name'] . " " . $candi['middle_name'] . " " . $candi['last_name'] ?>
                                </h5>
                                <a href="" tabindex="-1" data-bs-toggle="modal" data-bs-target="#candidate<?= $candi['id'] ?>"><img class="candidate-img px-2" src="uploads/<?= $candi['photo'] ?>" alt="">
                                </a>

                                <h5 class="party mx-3 my-3 text-center">
                                    <?= $party['party'] ?>
                                </h5>
                                <?php if ($now >= $start_date && $now <= $end_date) { ?>

                                <?php } elseif ($now >= $end_date) { ?>
                                    <div class="text-center">
                                        <?php if (!empty($voteCount)) { ?>

                                            <?php if ($voteCount <= 1 || 0) { ?>
                                                <p><?= $voteCount . " Vote" ?></p>
                                            <?php } else { ?>
                                                <p><?= $voteCount . " Votes" ?></p>
                                            <?php } ?>

                                        <?php } else { ?>
                                            <p><?= "0" . " Votes" ?></p>
                                        <?php } ?>
                                        </p>
                                        <div class="d-flex justify-content-center">
                                            <p>
                                                <!-- <?php if (!empty($candi['winner'])) { ?>
                                                    <span class="text-success"><strong><?= $candi['winner'] ?></strong></span>
                                                <?php } else { ?>
                                                <?php } ?> -->
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="modal fade modal-signin" id="candidate<?= $candi['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticbackdroplabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content rounded-5 shadow" style="border-radius: 30px;">
                                    <div class="modal-header p-3 pb-3">
                                        <h5 class="modal-title text-white" id="staticbackdroplabel">Candidates information
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <br>

                                    <div class="modal-body p-5 pt-0">
                                        <div class="container px-2 py-2" style="border-style: solid; border-width:1px; border-color:white; border-radius:20px">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="text-center mt-5">
                                                        <img src="uploads/<?= $candi['photo'] ?>" style="border-radius: 20px; height:170px; width:100%;" alt="viewpic">
                                                    </div>
                                                </div>
                                                <?php
                                                $pos = $vote->getposition($candi['position_id']);
                                                $par = $vote->getparty($candi['party_id']);
                                                ?>
                                                <div class="col-md-8">
                                                    <ul style="list-style-type: none; font-size:20px; margin-top:40px" id="ul-candi">
                                                        <li><span class="fw-bold">Name: </span> <?= $candi['first_name'] . " " . $candi['last_name'] ?> </li>
                                                        <li><span class="fw-bold">Age: </span> <?= $candi['age'] ?></li>
                                                        <li><span class="fw-bold">Course: </span> <?= $candi['course'] ?></li>
                                                        <li><span class="fw-bold">Year: </span> <?= $candi['year_lev'] ?></li>
                                                        <li><span class="fw-bold">Party: </span> <?= $par['party'] ?></li>
                                                        <li><span class="fw-bold">Running Position: </span><?= $pos['position_title'] ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>

                                    </div>

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
                        <!-- <a href="#" class="mt-2"><small>Forgot Access Code? </small> </a> -->
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

<!-- <script type="text/javascript">
    settimeout(function() {
        location = 'view-candidates.php?id=<?= $election_id ?>'
    }, 2000)
</script> -->

<?php
include('includes/footer.php');
?>
<?php
include('includes/modals.php');
?>
<!-- Login and register modals  -->
<?php

?>