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
      return header("Location: index.php");
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
        $this->setUserData($voter);

?>
        <script>
          swal({
            title: "Login Success!",
            icon: "success"
          }).then((success) => {
            if (success) {
              window.location.href = 'index.php';
            }
          });
        </script>

      <?php

      } else {
      ?>
        <script>
          swal({
            title: "Wrong ID number or Password",
            icon: "warning"
          });
        </script>
        <?php
      }
    }
  }


  public function setAdminData($array)
  {

    if (!isset($_SESSION)) {
      session_start();
    }
    $_SESSION['admindata'] = array(
      "last_name" => $array['last_name'],
      "first_name" => $array['last_name'],
      "accesscode" => $array['accesscode'],
      "type" => $array['type'],
    );

    return $_SESSION['admindata'];
  }

  public function getAdminData()
  {

    if (!isset($_SESSION)) {
      session_start();
    }

    if (isset($_SESSION['admindata'])) {
      return $_SESSION['admindata'];
    } else {
      return header("Location: index.php");
    }
  }

  public function adminSession()
  {

    if ($this->getAdminData()) {
      return $this->getAdminData();
    } else {
      return header("Location: index.php");
    }
  }
  public function loginAdmin()
  {

    $connection = $this->openConnection();

    if (isset($_POST['login-admin'])) {

      // $last_name = $_POST['last_name'];
      $accesscode = $_POST['accesscode'];

      $stmt = $connection->prepare("SELECT * FROM `admin` WHERE accesscode = ?");
      $stmt->execute([$accesscode]);

      $admin = $stmt->fetch();
      $total = $stmt->rowCount();

      if ($total > 0) {

        if ($admin['type'] === 'comelec') {
          $this->setAdminData($admin);
        ?>

          <script>
            swal({
              title: "Login Success!",
              text: "logged in as COMELEC",
              icon: "success"
            }).then((success) => {
              if (success) {
                window.location.href = 'comelec.php';
              }
            });
          </script>

        <?php

        } else {
          $this->setAdminData($admin);
        ?>

          <script>
            swal({

              title: "Login Success!",
              text: "logged in as admin",
              icon: "success"
            }).then((success) => {
              if (success) {
                window.location.href = 'admin-dashboard.php';
              }
            });
          </script>

        <?php

        }
      } else {
        ?>

        <script>
          swal({
            title: "Wrong Passcode!",

            icon: "warning"
          });
        </script>

      <?php
      }
    }
  }

  public function logoutAdmin()
  {

    if (isset($_POST['logout-admin'])) {

      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['admindata'] = null;
      unset($_SESSION['admindata']);

      header("Location: index.php");
    }
  }

  public function setComelecData($array)
  {

    if (!isset($_SESSION)) {
      session_start();
    }
    $_SESSION['comelecdata'] = array(
      "last_name" => $array['lastname'],
      "first_name" => $array['last_name'],
      "accesscode" => $array['accesscode'],
      "type" => $array['type'],
    );

    return $_SESSION['comelecdata'];
  }

  public function getComelecData()
  {
    if (!isset($_SESSION)) {
      session_start();
    }
    if (isset($_SESSION['comelecdata'])) {

      return $_SESSION['comelecdata'];
    } else {
      return header("Location: index.php");
    }
  }

  public function comelecSession()
  {
    if ($this->getComelecData()) {
      return $this->getComelecData();
    } else {
      return header("Location: index.php");
    }
  }

  public function comelecLogin()
  {
    $connection = $this->openConnection();
    if (isset($_POST['login-comelec'])) {

      $accesscode = $_POST['accesscode'];
      $type = 'comelec';

      $stmt = $connection->prepare("SELECT * FROM `admin` WHERE `accesscode` = '$accesscode' AND `type` = '$type'");
      $stmt->execute();

      $comelec = $stmt->fetch();
      $total = $stmt->rowCount();

      if ($total > 0) {
        $this->setComelecData($comelec);
        header("Location: comelec.php");
      } else {
        return $connection->errorInfo();
      }
    }
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

  public function checkStudentID($student_id)
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
    }
    // } else {
    //   // return $this->voterRegister();
    // }
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
          alert('Registration Successful');
          window.location.href = "index.php";
        </script>

      <?php

      }
    }
  }



  public function registerCandidate()
  {

    $connection = $this->openConnection();

    if (isset($_POST['register-candidate'])) {

      $school_id = $_POST['student_id'];

      $stmt = $connection->prepare("SELECT COUNT(*) FROM `student` WHERE `school_id` = ?");

      $stmt->execute([$school_id]);

      $count = $stmt->fetchColumn();

      if ($count == 0) {

        // If student ID doesn't exist, show error message and exit
      ?>
        <script>
          alert('Invalid Student ID<?= " " . $school_id ?>');
          window.location.href = "index.php";
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
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["photo"]["name"]);
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          $new_file_name = rand(1000, 1000000) . "-" . $_FILES['photo']['name'];
          $final_file = str_replace(' ', '-', strtolower($new_file_name));
          $temp_file = $_FILES["photo"]["tmp_name"];

          // Check if file already exists
          if (file_exists($target_file)) {
        ?>
            <script>
              alert('File already exist');
              window.location.href = "index.php";
            </script>
          <?php
            return $this->show_404();
          }

          // Check file size
          if ($_FILES["photo"]["size"] > 5000000) {
            // Resize and compress the image
            $max_width = 800;
            $max_height = 600;
            list($image_width, $image_height, $image_type) = getimagesize($temp_file);

            // Resize the image if it's larger than the maximum width or height
            if ($image_width > $max_width || $image_height > $max_height) {
              $ratio = min($max_width / $image_width, $max_height / $image_height);
              $new_width = round($image_width * $ratio);
              $new_height = round($image_height * $ratio);
              $new_image = imagecreatetruecolor($new_width, $new_height);

              if ($image_type == IMAGETYPE_JPEG) {
                $old_image = imagecreatefromjpeg($temp_file);
              } elseif ($image_type == IMAGETYPE_PNG) {
                $old_image = imagecreatefrompng($temp_file);
              } elseif ($image_type == IMAGETYPE_GIF) {
                $old_image = imagecreatefromgif($temp_file);
              }

              imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
              imagedestroy($old_image);
              imagejpeg($new_image, $temp_file, 75);
              imagedestroy($new_image);
            }
          }
          if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
          ?>
            <script>
              alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
              window.location.href = "index.php";
            </script>
            <?php
            return $this->show_404();
          }

          // Upload file
          if (move_uploaded_file($temp_file, $target_dir . $final_file)) {
            $stmt = $connection->prepare("INSERT INTO `applicants`(`student_id`, `election_id`, `date_filed`, `position_id`, `party_id`, `last_name`, `first_name`, `middle_name`, `gender`, `age`, `date_birth`, `place_birth`, `height`, `weight`, `home_add`, `status`, `religion`, `language`, `citizenship`, `contact_num`, `email`, `spouse_name`, `spouse_add`, `num_child`, `tertiary_lev`, `course`, `year_lev`, `major`, `second_lev`, `secondary_grad`, `elementary`, `elementary_grad`, `achievements`, `organization`, `requirements`, `url`, `application_status`, `x`, `photo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->execute([$student_id, $election_id, $data_filed, $position, $party_id, $last_name, $first_name, $middle_name, $gender, $age, $date_birth, $place_birth, $height, $weight, $home_add, $status, $religion, $language, $citizenship, $contact_num, $email, $spouse_name, $spouse_add, $num_child, $tertiary_lev, $course, $year_lev, $major, $second_lev, $secondary_grad,  $elementary, $elementary_grad, $achievements, $organization, $requirements, $url, $applicant_status, $x, $final_file]);

            if ($stmt == true) {
            ?>
              <script>
                swal({
                  title: "Candidacy Submitted!",
                  icon: "success"
                });
              </script>
            <?php
            } else {
            ?>
              <script>
                swal({
                  title: "Submittion Failed, Contact Jerecho",
                  icon: "warning"
                });
              </script>
        <?php
            }
          }
        }
      }
    }
  }


  public function getAdmins()
  {


    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `admin` where `type` = 'admin'");
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

      if ($stmt == true) {
        ?>
        <script>
          alert('Added Admin');
          window.location.href = "admin-dashboard.php";
        </script>
      <?php

      } else {
        return $this->show_404();
        echo $connection->errorInfo();
      }
    }
  }

  public function editAdmin()
  {

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
          window.location.href = 'admin-dashboard.php';
          console.log('The Ok Button was clicked.');
        });
      </script>
    <?php
    }
  }

  public function editComelec()
  {

    $connection = $this->openConnection();
    if (isset($_POST['edit-comelec'])) {

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $middle_name = $_POST['middle_name'];
      $accesscode = $_POST['access_code'];
      $admin_id = $_POST['admin_id'];


      $stmt = $connection->prepare("UPDATE `admin` SET `last_name`='$last_name',`first_name`='$first_name',`middle_name`='$middle_name',`accesscode`='$accesscode' WHERE `admin_id` = ?");
      $stmt->execute([$admin_id]);

    ?>
      <script>
        alert('Successfully Updated! <?= $first_name . " " . $last_name ?>');
        window.location.href = "admin-add-com.php";
      </script>
    <?php
    }
  }

  public function deleteAdmin()
  {

    $connection = $this->openConnection();
    if (isset($_POST['delete-admin'])) {

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

  public function deleteComelec()
  {

    $connection = $this->openConnection();
    if (isset($_POST['delete-comelec'])) {
      $admin_id = $_POST['admin_id'];

      $stmt = $connection->prepare('DELETE FROM `admin` WHERE `admin_id` = ?');
      $stmt->execute([$admin_id]);
    ?>
      <script>
        confirm('Deleted Successfull');
        window.location.href = "admin-add-com.php";
      </script>
    <?php
    }
  }

  public function getComelec()
  {
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


  public function getApplicants()
  {

    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `applicants`");
    $stmt->execute();
    $applicants = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($applicants)) {
        return $applicants;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }



  public function getApplicantsForCandidate()
  {

    $connection = $this->openConnection();
    $applicants = [];
    if (isset($_POST['search-election'])) {
      $election_id = $_POST['election'];
      $stmt = $connection->prepare("SELECT * FROM `applicants` WHERE `application_status` = 'final' AND `election_id` = '$election_id' AND `x` = 'active' ORDER BY id DESC");
      $stmt->execute();
      $applicants = $stmt->fetchAll();
    } else {
      $stmt = $connection->prepare("SELECT * FROM `applicants` where `application_status` = 'final' AND `x` = 'active' ORDER BY id DESC");
      $stmt->execute();
      $applicants = $stmt->fetchAll();
    }

    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($applicants)) {

        return $applicants;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function getApplicantsApproval()
  {

    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `applicants` where not `application_status` =  'for_interview' and not `application_status` = 'denied' and not `application_status` = 'final'");
    $stmt->execute();
    $applicants = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($applicants)) {
        return $applicants;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function getApplicantsForInterview()
  {

    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `applicants` where `application_status` = 'for_interview'");
    $stmt->execute();
    $applicants = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($applicants)) {
        return $applicants;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function getDeniedApplicants()
  {

    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `applicant_logs` where `application_status` = 'denied'");
    $stmt->execute();
    $applicants = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($applicants)) {
        return $applicants;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function getElectionId()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `election` where `x` = 'active' ORDER BY `election_id` DESC ");
    $stmt->execute();
    $elections = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($elections)) {
        return $elections;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }
  public function getPositionId()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `position` where `x` != 'deleted' ");
    $stmt->execute();
    $positions = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($positions)) {
        return $positions;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function getPartyId()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `party` where `x` != 'deleted' ");
    $stmt->execute();
    $partys = $stmt->fetchAll();
    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($partys)) {
        return $partys;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function getParty($party_id)
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `party` WHERE `party_id` = '$party_id' ");
    $stmt->execute();
    $partys = $stmt->fetch();
    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($partys)) {

        return $partys;
      }
    } else {
    }
  }

  public function getPosition($position_id)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `position` WHERE `position_id` = '$position_id' ");
    $stmt->execute();
    $positions = $stmt->fetch();
    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($positions)) {

        return $positions;
      }
    } else {

      return $connection->errorInfo();
    }
  }

  public function getElection($election_id)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `election` WHERE `election_id` = '$election_id' ");
    $stmt->execute();
    $elections = $stmt->fetch();
    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($elections)) {

        return $elections;
      }
    } else {

      return $connection->errorInfo();
    }
  }

  public function getCandidates()
  {
    $connection = $this->openConnection();
    $candidates = [];

    if (isset($_POST['search-election'])) {

      $election_id = $_POST['election'];
      $position_id = $_POST['position'];
      $stmt = $connection->prepare("SELECT * FROM `applicants` WHERE `application_status` = 'final' AND `election_id` = '$election_id' AND  `position_id` = '$position_id' AND `x` = 'active'");
      $stmt->execute();
      $candidates = $stmt->fetchAll();
    } else {
      // $stmt = $connection->prepare("SELECT * FROM `applicants` WHERE `application_status` = 'final'");
      // $stmt->execute();
      // $candidates = $stmt->fetchAll();
    }

    $total = count($candidates);

    if ($total > 0) {
      return $candidates;
    } else {
    }
  }

  public function getCandidate($election_id, $position_id, $school_id)
  {
    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT COUNT(*) FROM `votes` WHERE `student_id` = ? AND `election_id` = ?");
    $stmt->execute([$school_id, $election_id]);
    $count = $stmt->fetchColumn();

    if ($count == 0) {

      $stmt = $connection->prepare("SELECT * FROM `applicants` where `application_status` = 'final' AND `election_id` = '$election_id' AND `position_id` = '$position_id' AND `x` = 'active' ");
      $stmt->execute();
      $applicants = $stmt->fetchAll();

      $total = $stmt->rowCount();

      if ($total > 0) {
        if (isset($applicants)) {
          return $applicants;
        }
      }
    } else {
    ?>
      <script>
        swal({
        title:"You already voted!",
        icon:"success"
        }).then((success) => {
        window.location.href = 'student-myvotes.php';
        }
        );
      </script>
      <?php
    }
  }


  public function getPositonCandidate($election_id, $position_id, $id)
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `applicants` WHERE `election_id` = '$election_id' and `position_id` = '$position_id' where `id` = ? ");
    $stmt->execute([$id]);
    $candidates = $stmt->fetch();
    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($candidates)) {

        return $candidates;
      }
    } else {

      return $connection->errorInfo();
    }
  }

  public function getApplicant($applicant_id)
  {

    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT * FROM `applicants` WHERE `student_id` = ?");
    $stmt->execute([$applicant_id]);
    $applicant = $stmt->fetch();

    $total = $stmt->rowCount();

    if ($total > 0) {

      if (isset($applicant)) {
        return $applicant;
      }
    }
  }

  public function getApplicantDenied($applicant_id)
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `applicants` WHERE `id` = ?");

    $stmt->execute([$applicant_id]);
    $applicant = $stmt->fetch();

    $total = $stmt->rowCount();

    if ($total > 0) {

      if (isset($applicant)) {
        return $applicant;
      }
    }
  }

  public function addComelec()
  {

    if (isset($_POST['add-comelec'])) {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $middle_name = $_POST['middle_name'];
      $accesscode = $_POST['accesscode'];
      $type = "comelec";
      $x = "active";

      $connection = $this->openConnection();
      $stmt = $connection->prepare("SELECT * FROM `admin` WHERE `accesscode` = ?");
      $stmt->execute([$accesscode]);
      $existingRecord = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($existingRecord) {
        // Access code already exists, show error message
      ?>
        <script>
          alert('Access Code already taken <?= $accesscode ?>');
          window.location.href = "admin-add-com.php";
        </script>
        <?php
      } else {
        // Access code doesn't exist, insert new record
        $stmt = $connection->prepare("INSERT INTO `admin`(`last_name`, `first_name`, `middle_name`, `accesscode`, `type`, `x`) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$last_name, $first_name, $middle_name, $accesscode, $type, $x]);
        if ($stmt == true) {
        ?>
          <script>
            alert('Added Comelec');
            window.location.href = "admin-add-com.php";
          </script>
        <?php
        }
      }
    }
  }

  public function addElection()
  {
    $connection = $this->openConnection();

    if (isset($_POST['add-election'])) {

      $x = "active";

      $election_name = $_POST['election_name'];
      $election_date = $_POST['election_date'];
      $election_start = $_POST['election_start'];
      $election_end = $_POST['election_end'];

      $startdate = date('Y-m-d H:i:s', strtotime($election_date . " " . $election_start . ":00:00"));
      $enddate = date('Y-m-d H:i:s', strtotime($election_date . " " . $election_end . ":00:00"));

      // Check if file was uploaded without errors
      if (isset($_FILES["election_poster"]) && $_FILES["election_poster"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["election_poster"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_file_name = rand(1000, 1000000) . "-" . $_FILES['election_poster']['name'];
        $final_file = str_replace(' ', '-', strtolower($new_file_name));
        $temp_file = $_FILES["election_poster"]["tmp_name"];

        // Check if file already exists
        if (file_exists($target_file)) {
        ?>
          <script>
            alert('File already exist');
            window.location.href = "admin-election.php";
          </script>
        <?php
          return $this->show_404();
        }

        // Check file size
        if ($_FILES["election_poster"]["size"] > 5000000) {
          // Resize and compress the image
          $max_width = 800;
          $max_height = 600;
          list($image_width, $image_height, $image_type) = getimagesize($temp_file);

          // Resize the image if it's larger than the maximum width or height
          if ($image_width > $max_width || $image_height > $max_height) {
            $ratio = min($max_width / $image_width, $max_height / $image_height);
            $new_width = round($image_width * $ratio);
            $new_height = round($image_height * $ratio);
            $new_image = imagecreatetruecolor($new_width, $new_height);

            if ($image_type == IMAGETYPE_JPEG) {
              $old_image = imagecreatefromjpeg($temp_file);
            } elseif ($image_type == IMAGETYPE_PNG) {
              $old_image = imagecreatefrompng($temp_file);
            } elseif ($image_type == IMAGETYPE_GIF) {
              $old_image = imagecreatefromgif($temp_file);
            }

            imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
            imagedestroy($old_image);
            imagejpeg($new_image, $temp_file, 75);
            imagedestroy($new_image);
          }
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        ?>
          <script>
            alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location.href = "admin-election.php";
          </script>
          <?php
          return $this->show_404();
        }

        // Upload file
        if (move_uploaded_file($temp_file, $target_dir . $final_file)) {
          $stmt = $connection->prepare("INSERT INTO `election`(`election_name`, `start_date`, `end_date`, `x`, `election_poster`) VALUES (?,?,?,?,?)");
          $stmt->execute([$election_name, $startdate, $enddate, $x, $final_file]);

          if ($stmt == true) {
          ?>
            <script>
              alert('Added Election');
              window.location.href = "admin-election.php";
            </script>
          <?php
          } else {
          ?>
            <script>
              alert('Failed');
              window.location.href = "admin-election.php";
            </script>
        <?php
          }
        }
      }
    }
  }



  public function editElection()
  {


    $connection = $this->openConnection();

    if (isset($_POST['edit-election'])) {

      $election_name = $_POST['election_name'];
      $election_start = $_POST['election_start'];
      $election_end = $_POST['election_end'];
      $status = $_POST['status'];
      $election_id = $_POST['election_id'];
      $startdate = $election_start;
      $enddate = $election_end;

      $stmt = $connection->prepare("UPDATE `election` SET `election_name`='$election_name',`start_date`='$startdate',`end_date`='$enddate',`x`='$status' WHERE `election_id` = ?");
      $stmt->execute([$election_id]);
      if ($stmt) {
        ?>
        <script>
          alert('Election Updated!');
          window.location.href = "admin-election.php";
        </script>
        <?php
      } else {
        return $this->show_404();
        echo $connection->errorInfo();
      }
    }
  }

  public function updatePoster()
  {
    $connection = $this->openConnection();

    if (isset($_POST['update-poster'])) {

      $election_id = $_POST['election_id'];

      if (isset($_FILES["election_poster"]) && $_FILES["election_poster"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["election_poster"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_file_name = rand(1000, 1000000) . "-" . $_FILES['election_poster']['name'];
        $final_file = str_replace(' ', '-', strtolower($new_file_name));
        $temp_file = $_FILES["election_poster"]["tmp_name"];

        // Check if file already exists
        if (file_exists($target_file)) {
        ?>
          <script>
            alert('File already exist');
            window.location.href = "admin-election.php";
          </script>
        <?php
          return $this->show_404();
        }

        // Check file size
        if ($_FILES["election_poster"]["size"] > 5000000) {
          // Resize and compress the image
          $max_width = 800;
          $max_height = 600;
          list($image_width, $image_height, $image_type) = getimagesize($temp_file);

          // Resize the image if it's larger than the maximum width or height
          if ($image_width > $max_width || $image_height > $max_height) {
            $ratio = min($max_width / $image_width, $max_height / $image_height);
            $new_width = round($image_width * $ratio);
            $new_height = round($image_height * $ratio);
            $new_image = imagecreatetruecolor($new_width, $new_height);

            if ($image_type == IMAGETYPE_JPEG) {
              $old_image = imagecreatefromjpeg($temp_file);
            } elseif ($image_type == IMAGETYPE_PNG) {
              $old_image = imagecreatefrompng($temp_file);
            } elseif ($image_type == IMAGETYPE_GIF) {
              $old_image = imagecreatefromgif($temp_file);
            }

            imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
            imagedestroy($old_image);
            imagejpeg($new_image, $temp_file, 75);
            imagedestroy($new_image);
          }
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        ?>
          <script>
            alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location.href = "admin-election.php";
          </script>
          <?php
          return $this->show_404();
        }

        // Upload file
        if (move_uploaded_file($temp_file, $target_dir . $final_file)) {
          $stmt = $connection->prepare("UPDATE `election` SET `election_poster`= '$final_file' WHERE `election_id` = '$election_id'");
          $stmt->execute();

          if ($stmt == true) {
          ?>
            <script>
              alert('Election Updated');
              window.location.href = "admin-election.php";
            </script>
          <?php
          } else {
          ?>
            <script>
              alert('Failed');
              window.location.href = "admin-election.php";
            </script>
      <?php
          }
        }
      }
    }
  }

  public function deleteElection()
  {
    $connection = $this->openConnection();
    if (isset($_POST['delete-election'])) {

      $election_id = $_POST['election_id'];
      $stmt = $connection->prepare('DELETE FROM `election` WHERE `election_id` = ?');
      $stmt->execute([$election_id]);
      ?>
      <script>
        confirm('Deleted Successful');
        window.location.href = "admin-election.php";
      </script>
    <?php
    }
  }

  public function getVoters()
  {
    $connection = $this->openConnection();
    $applicants = [];

    if (isset($_GET['search-course'])) {
      $course = $_GET['course'];
      $stmt = $connection->prepare("SELECT * FROM `student` WHERE `x` != 'deleted' AND `course` = :course");
      $stmt->bindParam(':course', $course);
      $stmt->execute();
      $applicants = $stmt->fetchAll();
    } else {
      $stmt = $connection->prepare("SELECT * FROM `student` WHERE `x` != 'deleted'");
      $stmt->execute();
      $applicants = $stmt->fetchAll();
    }

    $total = count($applicants);

    if ($total > 0) {
      return $applicants;
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function deleteVoter()
  {

    $connection = $this->openConnection();
    if (isset($_POST['delete-voter'])) {

      $voter_id = $_POST['voter_id'];
      $x = "deleted";

      $stmt = $connection->prepare("UPDATE `student` SET `x` = '$x' WHERE `student_id` = ? ");
      $stmt->execute([$voter_id]);
    ?>
      <script>
        confirm('Deleted Successful');
        window.location.href = "comelec-voter.php";
      </script>
      <?php
    }
  }

  public function addPosition()
  {

    $connection = $this->openConnection();


    if (isset($_POST['add-position'])) {


      $type = $_POST['type'];
      $position = $_POST['position'];
      $x = "active";
      $count = $_POST['count'];

      if ($type == 'single') {
        $stmt = $connection->prepare("INSERT INTO `position`(`position_title`,`type`, `x`) VALUES (?,?,?)");
        $stmt->execute([$position, $type, $x]);
      ?>
        <script>
          confirm('Position Added');
          window.location.href = "comelec-position.php";
        </script>
      <?php
      } else {
        $stmt = $connection->prepare("INSERT INTO `position`(`position_title`,`type`,`count`, `x`) VALUES (?,?,?,?)");
        $stmt->execute([$position, $type, $count, $x]);
      ?>
        <script>
          confirm('Position Added');
          window.location.href = "comelec-position.php";
        </script>
      <?php
      }
    }
  }

  public function deletePosition()
  {
    $connection = $this->openConnection();
    if (isset($_POST['delete-position'])) {

      $position_id = $_POST['position_id'];
      $x = "deleted";

      $stmt = $connection->prepare("UPDATE `position` SET `x` = '$x' WHERE `position_id` = ? ");
      $stmt->execute([$position_id]);
      ?>
      <script>
        confirm('Deleted Successful');
        window.location.href = "comelec-position.php";
      </script>
    <?php
    }
  }

  public function editPosition()
  {

    $connection = $this->openConnection();
    if (isset($_POST['edit-position'])) {

      $position = $_POST['position'];
      $position_id = $_POST['position_id'];

      $stmt = $connection->prepare("UPDATE `position` SET `position_title` = '$position' WHERE `position_id` = ? ");
      $stmt->execute([$position_id]);

    ?>
      <script>
        confirm('Updated!');
        window.location.href = "comelec-position.php";
      </script>
    <?php

    }
  }

  public function getRequirements()
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `requirements` where `x` != 'deleted' ");
    $stmt->execute();
    $req = $stmt->fetchAll();
    $total = $stmt->rowCount();

    if ($total > 0) {
      if (isset($req)) {
        return $req;
      }
    } else {
      return $this->show_404();
      echo $connection->errorInfo();
    }
  }

  public function addRequirement()
  {

    $connection = $this->openConnection();

    if (isset($_POST['add-requirement'])) {

      $requirement = $_POST['requirement'];
      $stmt = $connection->prepare("INSERT INTO `requirements`    (`requirement`) VALUES (?) ");
      $stmt->execute([$requirement]);

    ?>
      <script>
        alert('Added Requirement');
        window.location.href = "comelec-requirement.php";
      </script>
    <?php

    }
  }

  public function editRequirement()
  {

    $connection = $this->openConnection();
    if (isset($_POST['edit-requirement'])) {

      $requirement = $_POST['requirement'];
      $requirement_id = $_POST['requirement_id'];

      $stmt = $connection->prepare("UPDATE `requirements` SET `requirement` = '$requirement' WHERE `requirement_id` = ? ");
      $stmt->execute([$requirement_id]);

    ?>
      <script>
        confirm('Updated!');
        window.location.href = "comelec-requirement.php";
      </script>
    <?php

    }
  }

  public function deleteRequirement()
  {

    $connection = $this->openConnection();
    if (isset($_POST['delete-requirement'])) {

      $requirement_id = $_POST['requirement_id'];
      $x = "deleted";

      $stmt = $connection->prepare("UPDATE `requirements` SET `x` = '$x' WHERE `requirement_id` = ? ");
      $stmt->execute([$requirement_id]);
    ?>
      <script>
        confirm('Successful');
        window.location.href = "comelec-requirement.php";
      </script>
    <?php
    }
  }

  public function addParty()
  {
    $connection = $this->openConnection();

    if (isset($_POST['add-party'])) {

      $party = $_POST['party'];

      $stmt = $connection->prepare("INSERT INTO `party` (`party`) VALUES (?) ");
      $stmt->execute([$party]);

    ?>
      <script>
        alert('Added Party');
        window.location.href = "comelec-party.php";
      </script>
    <?php

    }
  }

  public function editParty()
  {
    $connection = $this->openConnection();
    if (isset($_POST['edit-party'])) {

      $party = $_POST['party'];
      $party_id = $_POST['party_id'];

      $stmt = $connection->prepare("UPDATE `party` SET `party` = '$party' WHERE `party_id` = ? ");
      $stmt->execute([$party_id]);

    ?>
      <script>
        confirm('Updated!');
        window.location.href = "comelec-party.php";
      </script>
    <?php

    }
  }

  public function deleteParty()
  {

    $connection = $this->openConnection();
    if (isset($_POST['delete-party'])) {

      $party_id = $_POST['party_id'];
      $x = "deleted";

      $stmt = $connection->prepare("UPDATE `party` SET `x` = '$x' WHERE `party_id` = ? ");
      $stmt->execute([$party_id]);
    ?>
      <script>
        confirm('Successful');
        window.location.href = "comelec-party.php";
      </script>
    <?php
    }
  }

  public function acceptFinalCandi()
  {

    $connection = $this->openConnection();
    if (isset($_POST['accept-candidate'])) {

      $applicant = $_POST['id'];
      $status = "final";

      $stmt = $connection->prepare("UPDATE `applicants` SET `application_status` = '$status' WHERE `id` = ? ");
      $stmt->execute([$applicant]);

    ?>
      <script>
        confirm('Applicant Accepted');
        window.location.href = "admin-interview.php";
      </script>
    <?php

    }
  }

  public function deniedCandi()
  {

    $connection = $this->openConnection();
    if (isset($_POST['denied-candidate'])) {

      $applicant = $_POST['id'];
      $status = "denied";
      $notes = $_POST['notes'];

      $stmt = $connection->prepare("UPDATE `applicants` SET `application_status` = '$status' WHERE `id` = ? ");
      $stmt->execute([$applicant]);

      $stmt = $connection->prepare("INSERT INTO `applicant_logs`(`applicant_id`, `note`, `application_status`) VALUES (?,?,?)");
      $stmt->execute([$applicant, $notes, $status]);

    ?>
      <script>
        confirm('Applicant Denied');
        window.location.href = "admin-interview.php";
      </script>
    <?php

    }
  }

  public function deleteDeniedCandi()
  {

    $connection = $this->openConnection();
    if (isset($_POST['delete-denied'])) {
      $applicant = $_POST['id'];
      $stmt = $connection->prepare("DELETE FROM `applicant_logs` WHERE `applicant_log_id` = ?");
      $stmt->execute([$applicant]);
    ?>
      <script>
        confirm('Applicant Deleted');
        window.location.href = "comelec-disapproved.php";
      </script>
      <?php
    }
  }

  public function submitReq()
  {
    $connection = $this->openConnection();

    if (isset($_POST['submit-req'])) {
      $id = $_POST['id'];

      if (isset($_POST['requirement'])) {
        $requirement = implode(",", $_POST['requirement']);

        if (empty($requirement)) {
      ?>
          <script>
            alert('Please select at least one requirement');
            window.location.href = "comelec-approval.php";
          </script>
          <?php
        } else {
          $stmt = $connection->prepare("UPDATE `applicants` SET `requirements` = '$requirement', `application_status` = 'for_interview' WHERE `id` = ? ");
          $stmt->execute([$id]);

          if ($stmt) {
          ?>
            <script>
              confirm('Requirement Submitted');
              window.location.href = "comelec-approval.php";
            </script>
          <?php
          } else {
          ?>
            <script>
              confirm('Requirements Required');
              window.location.href = "comelec-approval.php";
            </script>
        <?php
          }
        }
      } else {
        ?>
        <script>
          alert('Please select at least one requirement');
          window.location.href = "comelec-approval.php";
        </script>
        <?php
      }
    }
  }

  public function insertExcelFile()
  {
      $connection = $this->openConnection();
  
      // Check if form is submitted
      if (isset($_FILES["formFileLg"])) {
  
          $filename = $_FILES["formFileLg"]["tmp_name"];
  
          if ($_FILES["formFileLg"]["size"] > 0) {
  
              $file = fopen($filename, "r");
  
              while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                  $stmt = $connection->prepare("INSERT IGNORE INTO `student`(`student_id`, `school_id`, `last_name`, `first_name`, `middle_name`, `gender`, `course`, `year_level`, `password`, `x`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                  $stmt->execute($emapData);
              }
              
              if ($stmt) {
                ?>
                <script>
                  alert('Submitted Successfully');
                  window.location.href = "comelec-voter.php";
                </script>
                <?php
            } else {
                echo $connection->errorInfo();
            }
              fclose($file);
          }
      }
  }


  public function vote()
  {
    $connection = $this->openConnection();

    if (isset($_POST["vote"])) {

      $candi_id = $_POST['candi_id'];
      $voter_id = $_POST['voter_id'];
      $pos_id = $_POST['pos_id'];
      $elec_id = $_POST['elec_id'];
      $x = "active";

      $stmt = $connection->prepare("INSERT INTO `votes`(`student_id`, `applicant_id`, `position_id`, `election_id`, `x`) VALUES (?,?,?,?,?)");

      $stmt->execute([$voter_id, $candi_id, $pos_id, $elec_id, $x]);

      if ($stmt) {
        ?>
        <script>
          confirm('Votes Counted!');
          window.location.href = "student-vote.php?id=<?= $elec_id ?>";
        </script>
      <?php
      }
    }
  }

  public function vote2()
  {
    $connection = $this->openConnection();

    if (isset($_POST["vote"])) {

      $candi_ids = $_POST['candi_id'];
      $voter_id = $_POST['voter_id'];
      $elec_id = $_POST['elec_id'];
      $x = "active";
      // $pos_count = $_POST['pos_count'];
      foreach ($candi_ids as $candi_id) {
        $pos_id = $_POST['pos_id'][$candi_id];
        $stmt = $connection->prepare("INSERT INTO `votes`(`student_id`, `applicant_id`, `position_id`, `election_id`, `x`) VALUES (?,?,?,?,?)");
        $stmt->execute([$voter_id, $candi_id, $pos_id, $elec_id, $x]);
      }

      if ($stmt) {
      ?>
        <script>
          swal({ 
          title: "Votes Counted!",
          icon: "success"
          }).then((success) => {
          if(success){
          window.location.href = 'student-myvotes.php';
          }
          });
        </script>
        <?php
      }
    }
  }

  public function getVoterVote($voter_id, $candi_id, $pos_id)
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `votes` WHERE `student_id` = ? AND `applicant_id` = ? AND `position_id` = ?");

    $stmt->execute([$voter_id, $candi_id, $pos_id]);
    $voters = $stmt->fetch();

    $total = $stmt->rowCount();

    if ($total > 0) {

      if (isset($voters)) {
        return $voters;
      }
    } else {
    }
  }

  public function insertPosition($position_name, $available_count, $party_name)
  {


    if (isset($_POST['register-candidate'])) {

      $pdo = new PDO("mysql:host=localhost;dbname=myDatabase", "myUsername", "myPassword");

      // Check if party has reached position limit
      $stmt = $pdo->prepare("SELECT COUNT(*) AS party_count FROM party WHERE party_name = :party_name");
      $stmt->execute(['party_name' => $party_name]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $party_count = $result['party_count'];

      $stmt = $pdo->prepare("SELECT SUM(acount) AS total_count FROM positions WHERE party_name = :party_name");
      $stmt->execute(['party_name' => $party_name]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $total_count = $result['total_count'] ? $result['total_count'] : 0;

      if ($total_count + $available_count > $party_count) {
        echo "Cannot add position, party has reached position limit";
        return;
      }

      // Insert the position
      $stmt = $pdo->prepare("INSERT INTO positions (position_name, count) VALUES (:position_name, :available_count, :party_name)");
      $stmt->execute(['position_name' => $position_name, 'available_count' => $available_count]);

      echo "Position added successfully";
    }
  }

  public function selectPosition($position_title)
  {

    $connection = $this->openConnection();

    $stmt = $connection->prepare("SELECT
    FROM position p
    JOIN (
      SELECT party_title, COUNT(*) as party_count
      FROM party
      GROUP BY party_title
    ) pc ON p.count > pc.party_count
    JOIN party pa ON pa.party_title = pc.party_title
    WHERE pa.party_count < p.count AND p.position_title = :position_title");

    $stmt->bindParam(":position_title", $position_title);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getVoterVotes($student_id, $position_id, $election_id)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT a.last_name, a.first_name, a.middle_name, a.photo
    FROM votes v
    JOIN applicants a ON v.applicant_id = a.id WHERE v.student_id = '$student_id' AND v.position_id = '$position_id' AND v.election_id = '$election_id'
    ");
    $stmt->execute();
    $votes = $stmt->fetchAll();

    $total = $stmt->rowCount();

    if ($total > 0) {

      if (isset($votes)) {

        return $votes;
      }
    } else {
    }
  }


  public function getVoteResults($applicant_id)
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT COUNT(*) FROM votes WHERE applicant_id = :applicant_id");
    $stmt->bindParam(':applicant_id', $applicant_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchColumn();

    if ($result) {
      return $result;
    } else {
    }
  }



  public function calculateAge($id, $date_birth)
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT `date_birth` FROM `applicants` WHERE `id` = :id AND `date_birth` = :date_birth");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':date_birth', $date_birth);
    $stmt->execute();
    $birthday = $stmt->fetch();
    $total = $stmt->rowCount();

    if ($total > 0) {
      $dob = new DateTime($birthday['date_birth']);
      $now = new DateTime();
      $age = $dob->diff($now)->y;

      return $age;
    }
  }

  public function countCandidate()
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT COUNT(*) AS total FROM `applicants` WHERE `application_status` = 'final' ");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];

    return $total;
  }

  public function countApplicants()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT COUNT(*) AS total FROM `applicants`");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];

    return $total;
  }

  public function countElections()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT COUNT(*) AS total FROM `election`");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];

    return $total;
  }

  public function countVoters()
  {
    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT COUNT(*) AS total FROM `student` WHERE `x` != 'deleted'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $result['total'];

    return $total;
  }

  public function resultPrint()
  {
    $connection = $this->openConnection();
    require_once('tcpdf/tcpdf.php');

    ob_start();
    // initialize TCPDF
    if (isset($_POST['print-result'])) {
      // $elec_id = $_POST['elec_id'];
      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $pdf->SetCreator('Your Name');
      $pdf->SetAuthor('Your Name');
      $pdf->SetTitle('Election Results');
      $pdf->AddPage();

      // get vote results data
      $stmt = $connection->prepare("SELECT * FROM `applicants` WHERE `application_status` = 'final'");
      $stmt->execute();
      $voteResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // output table header row
      $pdf->SetFillColor(255, 255, 255); // white
      $pdf->SetTextColor(0, 0, 0); // black
      $pdf->SetDrawColor(0, 0, 0); // black
      $pdf->Cell(30, 10, 'Student ID', 1, 0, 'C', true);
      $pdf->Cell(50, 10, 'Name', 1, 0, 'C', true);
      $pdf->Cell(40, 10, 'Election', 1, 0, 'C', true);
      $pdf->Cell(40, 10, 'Position', 1, 0, 'C', true);
      $pdf->Cell(30, 10, 'Vote Count', 1, 1, 'C', true);

      // output table rows
      $pdf->SetFont('helvetica', '', 12);
      if (!empty($voteResults)) {
        foreach ($voteResults as $result) {

          $voteResult = $this->getVoteResults($result['id']);
          $position = $this->getPosition($result['position_id']);
          $election = $this->getElection($result['election_id']);

          $pdf->Cell(30, 10, $result['student_id'], 1, 0, 'C');
          $pdf->Cell(50, 10, $result['first_name'] . ' ' . $result['middle_name'] . ' ' . $result['last_name'], 1, 0, 'C');
          $pdf->Cell(40, 10, $election['election_name'], 1, 0, 'C');
          $pdf->Cell(40, 10, $position['position_title'], 1, 0, 'C');
          $pdf->Cell(30, 10, $voteResult, 1, 1, 'C');
        }
      }

      // output the PDF document
      $pdf->Output('election_results.pdf', 'I');
      exit;
    }
    // end output buffering and clean the buffer
    ob_end_clean();
  }

  public function saveQRCode()
  {

    $connection = $this->openConnection();
    if (isset($_POST['save-qr'])) {

      $election_id = $_POST['election_id'];

      $election_qr = rand(1000, 1000000) . "-" . $_FILES['qr-code']['name'];
      $image_loc = $_FILES['qr-code']['tmp_name'];
      $folder = "uploads/";

      $new_file_name = strtolower($election_qr);
      $final_file = str_replace(' ', '-', $new_file_name);

      if (move_uploaded_file($image_loc, $folder . $final_file)) {
        $stmt = $connection->prepare("UPDATE `election` SET `election_qr`= '$final_file' WHERE `election_id` = '$election_id'");
        $stmt->execute();
        if ($stmt == true) {
        ?>
          <script>
            alert('Election Updated!');
            window.location.href = "admin-election.php";
          </script>
        <?php
        } else {
          return $this->show_404();
          echo $connection->errorInfo();
        }
      }
    }
  }

  public function isStudentVoted($student_id, $election_id)
  {

    $connection = $this->openConnection();
    $stmt = $connection->prepare("SELECT * FROM `votes` WHERE `student_id` = '$student_id' AND `election_id` = '$election_id' ");
    $stmt->execute();
    $votes = $stmt->fetch();

    if ($votes) {
      return $votes;
    } else {
      return false;
    }
  }
  public function exportStudent()
  {
    $connection = $this->openConnection();
    $output = '';
    if (isset($_POST['export'])) {
      $stmt = $connection->prepare("SELECT * FROM `student`");
      $stmt->execute();
      $result = $stmt->fetchAll();

      if ($result > 0) {
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
        while ($row = ($result)) {
          $output .= '
<tr>  
<td>' . $row["school_id"] . '</td> 
<td>' . $row["last_name"] . ', ' . $row["first_name"] . ', ' . $row["middle_name"] .  '</td>  
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
  }
  public function exportCandidates()
  {
    $connection = $this->openConnection();
    $output = '';

    if (isset($_POST['export-candidates'])) {
      $election_id = $_POST['election_id'];
      $stmt = $connection->prepare("SELECT applicants.id, applicants.election_id ,applicants.first_name, applicants.last_name, applicants.middle_name, applicants.application_status, applicants.x,
      election.election_name, party.party, position.position_title
      FROM applicants 
      JOIN election  ON applicants.election_id = election.election_id
      JOIN party ON applicants.party_id = party.party_id
      JOIN position ON applicants.position_id = position.position_id
      WHERE applicants.application_status = 'final' AND applicants.election_id = '$election_id' AND applicants.x = 'active'");

      $stmt->execute();
      $result = $stmt->fetchAll();

      if ($result > 0) {
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
        while ($row = ($result)) {
          $output .= '
         <tr>  
         <td>' . $row["school_id"] . '</td> 
         <td>' . $row["last_name"] . ', ' . $row["first_name"] . ', ' . $row["middle_name"] .  '</td>  
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
      } else {
        ?>
        <script>
          alert('No record or data to be printed');
          window.location.href = 'admin-candidate.php';
        </script>
      <?php
      }
    }
  }

  public function deleteCandidate()
  {
    $connection = $this->openConnection();

    if (isset($_POST['delete-candidate'])) {
      $candidate_id = $_POST['id'];
      $stmt = $connection->prepare("UPDATE `applicants` SET `x` = 'deleted' WHERE `id` = '$candidate_id' ");
      $stmt->execute();

      if ($stmt) {
      ?>
        <script>
          alert('Candidate deleted');
        </script>
<?php
      }
    }
  }

  public function isElectionEnded($end_date, $start_date, $elec_id){
    date_default_timezone_set('Asia/Manila');
    
    $now = date("Y-m-d H:i:s");
    if ($now >= $start_date && $now <= $end_date){
      header("Location: student-vote.php?id=<?= $elec_id;?>");

    }elseif($now >= $end_date ){
      ?>
      <script>
           alert('Election Ended');
           window.location.href = 'student-dashboard.php';
         </script>
       <?php
    }elseif ($now <= $end_date){
      ?>
      <script>
           alert('Election is not yet started');
           window.location.href = 'student-dashboard.php';
         </script>
       <?php
    }
  }
}

$vote = new Voting();

?>
