<?php



class Voting
{

  private $server = "mysql:host=localhost;dbname=vote3";
  private $user = "root";
  private $pass = "";
  private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

  protected $con;

  public function openConnection()
  {

    try {

      $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
      return $this->con;
    } catch (PDOException $e) {
      echo "There is some problem in the connection" . $e->getMessage();
    }
  }

  public function closeConnection()
  {
    $this->con = null;
  }


  public function getUsers()
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `student` ");
    $stmt->execute();
    $users = $stmt->fetchAll();
    $userCount = $stmt->rowCount();

    if ($userCount > 0) {
      return $users;
    } else {
      return 0;
    }
  }


  public function setUserData($array)
  {

    if (!isset($_SESSION)) {
      session_start();
    }

    $_SESSION['userdata'] = array(

      "studentID" => $array['student_id'],
      "school_id" => $array['school_id'],
      "last_name" => $array['last_name'],
      "first_name" => $array['first_name'],
      "middle_name" => $array['middle_name'],
      "gender" => $array['gender'],
      "course" => $array['course'],
      "year_level" => $array['year_level'],
      "password" => $array['password']

    );

    return $_SESSION['userdata'];
  }

  public function getUserData()
  {

    if (!isset($_SESSION)) {
      session_start();
    }
    if (isset($_SESSION['userdata'])) {
      return $_SESSION['userdata'];
    } else {
      // return header("Location: index.php");

    }
  }

  public function session()
  {

    if ($this->getUserData()) {
      return $this->getUserData();
    } else {
      return header("Location: welcome.php");
    }
  }


  public function Login()
  {

    if (isset($_POST['login-voter'])) {

      $school_id = $_POST['school_id'];
      $password = $_POST['password'];

      $connection = $this->openConnection();
      $stmt = $connection->prepare("SELECT * FROM `student` WHERE school_id = ? AND password = ? ");
      $stmt->execute([$school_id, $password]);

      $voter = $stmt->fetch();

      $total = $stmt->rowCount();

      if ($total > 0) {

        echo "Welcome " . $voter['first_name'];
        $this->setUserData($voter);

        header("Location: welcome.php");
      } else {

        header("Location: index.php");
      }
    }
  }

  public function loginAdmin(){

  }

  public function show_404()
  {

    http_response_code(404);
    echo "Page Not Found";
  }
  public function logout()
  {

    if (isset($_POST['logout'])) {

      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['userdata'] = null;
      unset($_SESSION['userdata']);

      header("Location: index.php");
    }
  }

  public function studentID($student_id)
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT COUNT(*) FROM `student_id` WHERE `student_id` = ?");

    $stmt->execute([$student_id]);

    $count = $stmt->fetchColumn();

    // $userCount = $stmt->rowCount();

    if ($count == 0) {
      // If student ID doesn't exist, show error message and exit
      echo "Student ID not found. Please check and try again.";
      exit;
    } else {
      return $this->voterRegister();
    }
  }

  public function voterRegister()
  {
    $connection = $this->openConnection();

    if (isset($_POST['voter-register'])) {

      $school_id = $_POST['school_id'];
      $stmt = $connection->prepare("SELECT COUNT(*) FROM `student_id` WHERE `student_id` = ?");

      $stmt->execute([$school_id]);

      $count = $stmt->fetchColumn();

      if ($count == 0) {

        // If student ID doesn't exist, show error message and exit
?>
        <script>
          alert('Invalid Student ID  <?= " " . $school_id ?>');
          window.location.href = "index.php";
        </script>
      <?php
        exit;
      } else {



        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $year = $_POST['year_level'];
        $password = $_POST['password'];
        $x = "active";

        $stmt = $connection->prepare("INSERT INTO `student`(`school_id`, `last_name`, `first_name`, `gender`, `course`, `year_level`, `password`, `x`) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$school_id, $last_name, $first_name, $gender, $course, $year, $password, $x]);

      ?>
        <script>
          alert('Register Successful');
          window.location.href = "index.php";
        </script>

      <?php

      }
    }
  }

  public function addPartyList()
  {
  }

  public function registerCandidate()
  {

    $connection = $this->openConnection();

    if (isset($_POST['register-candidate'])) {

      $school_id = $_POST['student_id'];

      $stmt = $connection->prepare("SELECT COUNT(*) FROM `student_id` WHERE `student_id` = ?");

      $stmt->execute([$school_id]);

      $count = $stmt->fetchColumn();

      if ($count == 0) {

        // If student ID doesn't exist, show error message and exit
      ?>
        <script>
          alert('Invalid Student ID<?= " " . $school_id ?>');
          window.location.href = "register-candi.php";
        </script>
      <?php
        exit;
      } else {


        $applicant_status = "initial";
        $requirements = "0";
        $x = "active";

        $student_id = $_POST['student_id'];
        $election_id = $_POST['election_id'];
        $data_filed = $_POST['date_filed'];
        $position = $_POST['position_id'];
        $party_id = $_POST['party_id'];
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $date_birth = $_POST['date_birth'];
        $place_birth = $_POST['place_birth'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $home_add = $_POST['home_add'];
        $status = $_POST['status'];
        $religion = $_POST['religion'];
        $language = $_POST['language'];
        $citizenship = $_POST['citizenship'];
        $contact_num = $_POST['contact_num'];
        $email = $_POST['email'];
        $spouse_name = $_POST['spouse_name'];
        $spouse_add = $_POST['spouse_add'];
        $num_child = $_POST['num_child'];
        $tertiary_lev = $_POST['tertiary_lev'];
        $course = $_POST['course'];
        $year_lev = $_POST['year_lev'];
        $major = $_POST['major'];
        $second_lev = $_POST['second_lev'];
        $secondary_grad = $_POST['secondary_grad'];
        $elementary = $_POST['elementary'];
        $elementary_grad = $_POST['elementary_grad'];
        $achievements = $_POST['achievements'];
        $organization = $_POST['organization'];
        $url = $_POST['url'];

        // $applicant_status = $_POST['application_status'];

        $image = rand(1000, 1000000)."-".$_FILES['photo']['name'];
        $image_loc = $_FILES['photo']['tmp_name'];
        $folder = "uploads/";
  
        $new_file_name = strtolower($image);
        $final_file = str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($image_loc, $folder.$final_file)){

          $stmt = $connection->prepare("INSERT INTO `applicants`(`student_id`, `election_id`, `date_filed`, `position_id`, `party_id`, `last_name`, `first_name`, `middle_name`, `gender`, `age`, `date_birth`, `place_birth`, `height`, `weight`, `home_add`, `status`, `religion`, `language`, `citizenship`, `contact_num`, `email`, `spouse_name`, `spouse_add`, `num_child`, `tertiary_lev`, `course`, `year_lev`, `major`, `second_lev`, `secondary_grad`, `elementary`, `elementary_grad`, `achievements`, `organization`, `requirements`, `url`, `application_status`, `x`, `photo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

          $stmt->execute([$student_id, $election_id, $data_filed, $position, $party_id, $last_name, $first_name, $middle_name, $gender, $age, $date_birth, $place_birth, $height, $weight, $home_add, $status, $religion, $language, $citizenship, $contact_num, $email, $spouse_name, $spouse_add, $num_child, $tertiary_lev, $course, $year_lev, $major, $second_lev, $secondary_grad, $achievements, $elementary, $elementary_grad, $organization, $requirements, $url, $applicant_status, $x, $final_file]);
  
        ?>
          <script>
            alert('Register Successfull');
            window.location.href = "index.php";
          </script>
  
        <?php
        }

    
      }
    }
  }

  public function addRequirements($id)
  {
  }

  public function cadidateList()
  {
  }
  public function votingResult()
  {
  }


  public function getAdmins()
  {


    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `admin`");
    $stmt->execute();
    $admins = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {

      if (isset($admins)) {

        return $admins;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function addAdmin()
  {
    if (isset($_POST['add-admin'])) {

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $middle_name = $_POST['middle_name'];
      $accesscode = $_POST['access_code'];
      $type = "admin";
      $x = "active";

      $connection = $this->openConnection();
      $stmt = $connection->prepare("INSERT INTO `admin`(`last_name`, `first_name`, `middle_name`, `accesscode`, `type`, `x`) VALUES (?,?,?,?,?,?)");
      $stmt->execute([$last_name, $first_name, $middle_name, $accesscode, $type, $x]);

      if($stmt == true){
        ?>
        <script>
           swal({
            title: "Added Successfully!",
            icon: "success"
            }).then(function() {
            // Redirect the user
            window.location.href='admin-dashboard.php';
            console.log('The Ok Button was clicked.');
                        });
        </script>
        <?php
      }else {
        return $this->show_404();
        echo $connection->errorInfo();
      }
    }
  }
  
  public function editAdmin(){

    $connection = $this->openConnection();
    if (isset($_POST['edit-admin'])) {

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $middle_name = $_POST['middle_name'];
      $accesscode = $_POST['access_code'];
      $admin_id = $_POST['admin_id'];


      $stmt = $connection->prepare("UPDATE `admin` SET `last_name`='$last_name',`first_name`='$first_name',`middle_name`='$middle_name',`accesscode`='$accesscode' WHERE `admin_id` = ?");
      $stmt->execute([$admin_id]);

        ?>
        <script>
        swal({
            title: "Successfully Updated!",
            icon: "success"
            }).then(function() {
            // Redirect the user
            window.location.href='admin-dashboard.php';
            console.log('The Ok Button was clicked.');
                        });
        </script>
        <?php
    }
  }

  public function deleteAdmin(){
  
    $connection = $this->openConnection();
    if(isset($_POST['delete-admin'])){

      $admin_id = $_POST['admin_id'];

      $stmt = $connection->prepare('DELETE FROM `admin` WHERE `admin_id` = ?');

      $stmt->execute([$admin_id]);

      ?>
         <script>
          alert('Deleted Successfull');
          window.location.href = "admin-dashboard.php";
        </script>
      <?php
    }

  }

  public function getComelec(){
    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `admin` WHERE `type` = 'comelec' ");
    $stmt->execute();
    $comelecs = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {

      if (isset($comelecs)) {

        return $comelecs;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  
  }


  public function getApplicants(){
    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `applicants`");
    $stmt->execute();
    $applicants = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if($total > 0){
      if(isset($applicants)){
        return $applicants;
      }
    }else{
      return $this->show_404();
      echo $connection->errorInfo();
    }

  }

  public function getElectionId(){
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `election` where `x` != 'deleted' ");
    $stmt->execute();
    $elections = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if($total > 0){
      if(isset($elections)){
        return $elections;
      }
    }else{
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }
  public function getPositionId(){
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `position` where `x` != 'deleted' ");
    $stmt->execute();
    $positions = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if($total > 0){
      if(isset($positions)){
        return $positions;
      }
    }else{
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function getPartyId(){
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `party` where `x` != 'deleted' ");
    $stmt->execute();
    $partys = $stmt->fetchAll();
    $total = $stmt->rowCount();

    if($total > 0){
      if(isset($partys)){
        return $partys;
      }
    }else{
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

}

$vote = new Voting();


?>