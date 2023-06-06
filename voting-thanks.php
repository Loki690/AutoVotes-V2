<?php
require_once('class.php');
$elec_id = $_GET['id'];
$elections = $vote->getElection($elec_id);
$voterDetails = $vote->getUserData();
$positions = $vote->getPositionId();
$vote->session();;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,500;1,600;1,700;1,800&display=swap');

        html,
        body {
            position: relative;
            height: 100%;

        }

        body {
            background: #eee;
            font-family: Poppins, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
            background-image: linear-gradient(rgba(2, 0, 36, 0.5), rgba(2, 0, 36, 0.5)), url(img/dcccover.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        h1 {
            text-align: center;
            color: white;
            margin-top:15px;
        }


        swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }

        swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <h1>Thank you for voting!</h1>
    <swiper-container class="mySwiper" pagination="true" pagination-dynamic-bullets="true" effect="coverflow" grab-cursor="true" centered-slides="true" slides-per-view="auto" coverflow-effect-rotate="20" coverflow-effect-stretch="0" coverflow-effect-depth="100" coverflow-effect-modifier="1" coverflow-effect-slide-shadows="true">

        <?php
        $election = $vote->getElection($elec_id);

        foreach ($positions as $position) {
            $pos_id = $position['position_id'];
            $myvotes = $vote->getVoterVotes($voterDetails['school_id'], $pos_id, $election['election_id']);
        ?>
            <?php if (!empty($myvotes)) { ?>
                <?php foreach ($myvotes as $myvote) { ?>
                    <swiper-slide>
                        <span class="text-white text-center"><?= $myvote['first_name'] . " " . $myvote['middle_name'] . " " . $myvote['last_name'] ?></span>
                        <label><?= $position['position_title'] ?></label>
                        <img src="uploads/<?= $myvote['photo']; ?>" />
                    </swiper-slide>
                <?php } ?>
            <?php } else { ?>
                <li class="list-unstyled">
                    <span class="badge rounded-pill bg-info text-dark">No Data</span>
                </li>

            <?php } ?>
        <?php } ?>

    </swiper-container>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" href="student-myvotes.php" role="button">Leave Now</a>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

</body>

</html>
