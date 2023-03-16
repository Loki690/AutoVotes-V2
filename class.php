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

  public function Login(){

    if (isset($_POST['login-voter'])){

      $school_id = $_POST['school_id'];
      $password = $_POST['password'];

      $connection = $this->openConnection();
      $stmt = $connection->prepare("SELECT * FROM `student` WHERE student_id = ? AND password = ? ");
      $stmt->execute([$school_id, $password]);

      $voter= $stmt->fetch();

      $total = $stmt->rowCount();

      if($total > 0 ){
        
        echo "Welcome ".$voter['first_name'];
        $this->setUserData($voter);

        header("Location: welcome.php");

      }else{
        
        header("Location: login.php");

      }

  }

  }
  public function show_404(){

    http_response_code(404);
    echo "Page Not Found";
  }

  }

  

  $vote = new Voting();


?>