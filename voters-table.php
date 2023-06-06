<?php
   // Database Connection
   $host     = 'localhost';
   $db       = 'vote3';
   $user     = 'root';
   $password = '';

   $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

   try {
        $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }



   // Reading value
   $draw = $_POST['draw'];
   $row = $_POST['start'];
   $rowperpage = $_POST['length']; // Rows display per page
   $columnIndex = $_POST['order'][0]['column']; // Column index
   $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
   $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
   $searchValue = $_POST['search']['value']; // Search value

   $searchArray = array();

   // Search
   $searchQuery = " ";
   if($searchValue != ''){
      $searchQuery = " AND (school_id LIKE :school_id OR 
           first_name LIKE :first_name OR
           middle_name LIKE :middle_name OR
           last_name LIKE :last_name OR 
           gender LIKE :gender OR 
           course LIKE :course OR 
           year_level LIKE :year_level OR 
           password LIKE :password ) ";
      $searchArray = array( 
           'school_id'=>"%$searchValue%",
           'first_name'=>"%$searchValue%",
           'middle_name'=>"%$searchValue%",
           'last_name'=>"%$searchValue%",
           'gender'=>"%$searchValue%",
           'course'=>"%$searchValue%",
           'year_level'=>"%$searchValue%",
           'password'=>"%$searchValue%"
      );
   }




   // Total number of records without filtering
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM student ");
   $stmt->execute();
   $records = $stmt->fetch();
   $totalRecords = $records['allcount'];

   // Total number of records with filtering
   $stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM student WHERE 1 ".$searchQuery);
   $stmt->execute($searchArray);
   $records = $stmt->fetch();
   $totalRecordwithFilter = $records['allcount'];

   // Fetch records
   $stmt = $conn->prepare("SELECT s.*, IF(v.student_id IS NOT NULL, 'Voted', '') AS voted_status
   FROM student AS s
   LEFT JOIN (SELECT DISTINCT student_id FROM votes) AS v ON s.school_id = v.student_id
   WHERE 1 ".$searchQuery."
   ORDER BY ".$columnName." ".$columnSortOrder."
   LIMIT :limit, :offset");



   // Bind values
   foreach ($searchArray as $key=>$search) {
      $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
   }

   $stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
   $stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
   $stmt->execute();
   $empRecords = $stmt->fetchAll();

   $data = array();

   $addedStudentIds = array(); // To keep track of added student IDs

   foreach ($empRecords as $row) {
       $studentId = $row['student_id'];
   
       // Check if the student ID has already been added
       if (!in_array($studentId, $addedStudentIds)) {
           $data[] = array(
               "school_id" => $row['school_id'],
               "first_name" => $row['first_name'],
               "middle_name" => $row['middle_name'],
               "last_name" => $row['last_name'],
               "gender" => $row['gender'],
               "course" => $row['course'],
               "year_level" => $row['year_level'],
               "password" => $row['password'],
               "voted_status" => $row['voted_status']
           );
   
           $addedStudentIds[] = $studentId; // Add the student ID to the added list
       }
   }
   
  

   // Response
   $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data
   );

   echo json_encode($response);
