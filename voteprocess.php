<?php
// Include your PDO connection configuration
$dsn = "mysql:host=localhost;dbname=vote3"; // Replace with your database server and name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable error reporting
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set the default fetch mode to associative array
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci" // Optional: Set the character encoding
];

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $candi_ids = $_POST['candi_id'];
    $voter_id = $_POST['voter_id'];
    $elec_id = $_POST['elec_id'];
    $x = "active";
    
    try {
        // Create a new PDO instance
        $connection = new PDO($dsn, $username, $password, $options);
        
        // Prepare and execute the SQL statement
        $stmt = $connection->prepare("INSERT INTO `votes`(`student_id`, `applicant_id`, `position_id`, `election_id`, `x`) VALUES (?,?,?,?,?)");
        
        foreach ($candi_ids as $candi_id) {
            $pos_id = $_POST['pos_id'][$candi_id];
            $stmt->execute([$voter_id, $candi_id, $pos_id, $elec_id, $x]);
        }
        
        // Respond with a success message or perform additional operations if needed
        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        // Handle any errors that occurred during the database insertion
        echo "Error: " . $e->getMessage();
    }
} else {
    // Handle invalid request method
    echo "Invalid request method!";
}
?>

