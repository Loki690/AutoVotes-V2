<?php
$vote->vote2();
?>
<form action="" method="POST">
    <div class="container">
        <h3 class="mx-3 mt-4"><?= $election['election_name'] ?></h3>
        <?php foreach ($positions as $pos) {
            $position_id = $pos['position_id'];
            $candidates = $vote->getCandidate($elec_id, $position_id);
            if (!empty($candidates)) { ?>
        <div class="row">
            <h3 class="mx-3 mt-4"> Candidates for <?= $pos['position_title'] ?></h3>
            <h4 class="mx-3 mt-4"> Only Vote <?= $pos['count'] . " " . $pos['position_title'] ?></h4>
            <input type="hidden" value="<?= $pos['count'] ?>" name="pos_count[<?= $pos['position_id'] ?>]">
            <?php $checkedCount = 0; ?>
            <?php foreach ($candidates as $candi) { ?>
            <div class="col-sm-4">
                <div class="card mx-3 mt-3">
                    <img class="card-img img-fluid" src="uploads/<?= $candi['photo'] ?>" width="200" alt="">
                    <h4 class="mx-3 my-3 text-center">
                        <?= $candi['first_name'] . " " . $candi['middle_name'] . " " . $candi['last_name'] ?></h4>
                    <div class="progress mx-5 mb-3">
                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">25</div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <input type="hidden" value="<?= $voterDetails['studentID'] ?>" name="voter_id">
                        <input type="hidden" value="<?= $candi['position_id'] ?>" name="pos_id[<?= $candi['id'] ?>]">
                        <input type="hidden" value="<?= $elec_id ?>" name="elec_id">
                        <?php if ($pos['count'] == 1) { ?>
                        <div class="d-flex justify-content-center">
                            <input class="mx-3" type="radio" id="myRadioButton"
                                name="candi_id[<?= $pos['position_id'] ?>]" value="<?= $candi['id'] ?>">
                            <label for="myRadioButton">Vote</label>
                        </div>
                        <?php } else { ?>
                        <div class="d-flex justify-content-center">
                            <input class="mx-3 candi-checkbox" type="checkbox" id="checkbox_<?= $candi['id'] ?>"
                                name="candi_id[<?= $pos['position_id'] ?>][]" value="<?= $candi['id'] ?>"
                                data-position-count="<?= $pos['count'] ?>">
                            <label for="checkbox_<?= $candi['id'] ?>">Vote</label>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if ($pos['count'] != 1) { ?>
            <script>
            var checkbox_<?= $candi['id'] ?> = document.querySelector('#checkbox_<?= $candi['id'] ?>');
            checkbox_<?= $candi['id'] ?>.addEventListener('change', function() {
                var position_count = checkbox_<?= $candi['id'] ?>.dataset.positionCount;
                var checkboxes = document.querySelectorAll(
                    'input[name="candi_id[<?= $pos['position_id'] ?>][]"]');
                var checkedCount = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        checkedCount++;
                    }
                });
                if (checkedCount > position_count) {
                    alert("You can only vote for " + position_count + " candidates for this position.");
                    checkbox_<?= $candi['id'] ?>.checked = false;
                }
            });
            </script>
            <?php } ?>
            <?php } ?>
        </div>
        <?php } ?>
        <?php } ?>
        <div class="d-flex justify-content-center mt-5">
            <button class="btn btn-primary mx-3" type="submit" name="submitVote">Submit Vote</button>
            <button class="btn btn-danger mx-3" type="reset">Reset</button>
        </div>
    </div>

</form>


<?php
    $farmer_rate = mysqli_query($conn, "SELECT wp.worker_id, wp.img, wp.Firstname, wp.MiddleName, wp.LastName, SUM(fr.rate) as sum_rate, RANK() OVER (ORDER BY SUM(fr.rate) DESC) as rate_rank FROM workerprofile wp INNER JOIN farmer_rate fr ON wp.worker_id = fr.worker_id GROUP BY wp.worker_id, wp.img, wp.Firstname, wp.MiddleName, wp.LastName ORDER BY rate_rank LIMIT 3;");
    if (mysqli_num_rows($farmer_rate)> 0){
        while ($fetch_rate = mysqli_fetch_assoc($farmer_rate) ){
        }
    }
?>