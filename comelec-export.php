
<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "vote3");
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM student";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
    <tr>  
        <th>Student ID</th>  
        <th>Student Name</th>  
        <th>Course</th>  
        <th>Year Level</th>
        <th>Gender</th>
    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>  
    <td>' . $row["school_id"] . '</td> 
    <td>' . $row["last_name"] .', '.$row["first_name"].', '.$row["middle_name"].  '</td>  
    <td>' . $row["course"] . '</td>  
    <td>' . $row["year_level"] . '</td>   
    <td>' . $row["gender"] . '</td>
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
    }
}
?>

<?php
$output = '';
if (isset($_POST["export-candidates"])) {
    $election_id = $_POST['election_id'];
    $query = "SELECT applicants.id, applicants.election_id ,applicants.first_name, applicants.last_name, applicants.middle_name, applicants.application_status, applicants.x,
    election.election_name, party.party, position.position_title
    FROM applicants 
    JOIN election  ON applicants.election_id = election.election_id
    JOIN party ON applicants.party_id = party.party_id
    JOIN position ON applicants.position_id = position.position_id
    WHERE applicants.application_status = 'final' AND applicants.election_id = '$election_id' AND applicants.x = 'active'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
    <tr>  
        <th>Student ID</th>  
        <th>Candidate Name</th>  
        <th>Position</th>  
        <th>Party</th>
        <th>Election</th>
    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>  
    <td>' . $row["id"] . '</td> 
    <td>' . $row["last_name"] .', '.$row["first_name"].', '.$row["middle_name"].  '</td>  
    <td>' . $row["position_title"] . '</td>  
    <td>' . $row["party"] . '</td>   
    <td>' . $row["election_name"] . '</td>
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
    } else{
        ?>
        <script>
            alert ('No record or data to be printed');
            window.location.href ='admin-candidate.php';
        </script>
        <?php
    }
}

if (isset($_POST["export-template"])) {
    $output .= '
<table class="table" bordered="1">  
<tr>  
    <th>student_id</th>  
    <th>school_id</th>  
    <th>last_name</th>  
    <th>first_name</th>
    <th>middle_name</th>
    <th>gender</th>
    <th>course</th>
    <th>year_level</th>
    <th>password</th>
    <th>x</th>
</tr>
';
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=download.xls');
    echo $output;

}
?>
