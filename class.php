<?php

  class Voting {

    private $server = "mysql:host=localhost;dbname=vote3";
    private $user = "root";
    private $pass = "";
    private $options = array(PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

    protected $con;

    public function openConnection(){

      try{
  
        $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
        return $this->con;
  
      }catch(PDOException $e){
        echo "There is some problem in the connection". $e->getMessage();
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

      if($userCount > 0 ){
        return $users;
      }else{
        return 0;
      }

    }

    
    public function setUserData($array){
    
      if(!isset($_SESSION)){
        session_start();
      }

      $_SESSION['userdata'] = array (

        "studentID" => $array ['student_id'],
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

  public function getUserData(){
      
    if(!isset($_SESSION)){
      session_start();
    }
    if(isset($_SESSION['userdata'])){
      return $_SESSION['userdata'];
    }else{
      header("Location: index.php");
    }
  }


  public function Login(){

    if (isset($_POST['login-voter'])){

      $school_id = $_POST['school_id'];
      $password = $_POST['password'];

      $connection = $this->openConnection();
      $stmt = $connection->prepare("SELECT * FROM `student` WHERE school_id = ? AND password = ? ");
      $stmt->execute([$school_id, $password]);

      $voter= $stmt->fetch();

      $total = $stmt->rowCount();

      if($total > 0 ){
        
        echo "Welcome ".$voter['first_name'];
        $this->setUserData($voter);

        header("Location: welcome.php");

      }else{
        
        header("Location: index.php");

      }
  }
  }
  public function show_404(){

    http_response_code(404);
    echo "Page Not Found";

  }

  public function logout(){

    if(isset($_POST['logout'])){

      if(!isset($_SESSION)){
        session_start();
      }
      $_SESSION['userdata'] = null;
      unset($_SESSION['userdata']);
  
      header("Location: index.php");

    }
  }

  public function voterRegister(){

    if(isset($_POST['voter-register'])){

      $school_id = $_POST['school_id'];
      $last_name = $_POST['last_name'];
      $first_name = $_POST['first_name'];
      $gender = $_POST['gender'];
      $course = $_POST['course'];
      $year = $_POST['year_level'];
      $password = $_POST['password'];
      $x = "active";
     
        $connection = $this->openConnection();
        $stmt = $connection->prepare("INSERT INTO `student`(`school_id`, `last_name`, `first_name`, `gender`, `course`, `year_level`, `password`, `x`) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$school_id, $last_name, $first_name, $gender, $course, $year, $password, $x]);

        ?>
        <script>
          alert('Register Successful, Please Login');
          window.location.href="index.php";
        </script>
        <?php 
     
    }
 
  }

  }

  

  $vote = new Voting();


?>