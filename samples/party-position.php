<?php

function connectTables() {
    // Connect to the database using PDO
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database_name";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Query to join the position and party tables
    $sql = "SELECT position_table.position_name, position_table.count_availability, party_table.party_name, party_table.id_count
            FROM position_table
            INNER JOIN party_table
            ON position_table.position_name = party_table.party_name";

    // Execute the query and fetch the results
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Restrict the number of positions per party
    $positionCount = array();
    foreach ($results as $result) {
        $positionName = $result['position_name'];
        $partyName = $result['party_name'];
        $countAvailability = $result['count_availability'];
        $idCount = $result['id_count'];

        // If the party doesn't have any positions yet, add the position
        if (!isset($positionCount[$partyName])) {
            $positionCount[$partyName] = array($positionName => 1);
        }
        // If the party has positions, check if the position count is less than the availability count
        else {
            if (isset($positionCount[$partyName][$positionName])) {
                $positionCount[$partyName][$positionName]++;
            }
            else {
                $positionCount[$partyName][$positionName] = 1;
            }
            if ($positionCount[$partyName][$positionName] > $countAvailability) {
                // Position count exceeds availability count, remove the position
                $sql = "DELETE FROM party_table WHERE party_name = :partyName AND id_count = :idCount";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':partyName', $partyName);
                $stmt->bindParam(':idCount', $idCount);
                $stmt->execute();
            }
        }
    }

    // Close the database connection
    $conn = null;

    // Return the results
    return $results;
}






// Call the function to connect the tables and restrict positions per party
$results = connectTables();

// Loop through the results and display them in a table or list
echo "<table>";
echo "<tr><th>Position Name</th><th>Availability Count</th><th>Party Name</th><th>ID Count</th></tr>";
foreach ($results as $result) {
    echo "<tr><td>".$result['position_name']."</td><td>".$result['count_availability']."</td><td>".$result['party_name']."</td><td>".$result['id_count']."</td></tr>";
}
echo "</table>";










function createTables() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=myDatabase", "myUsername", "myPassword");

        // Create the positions table
        $sql = "CREATE TABLE positions (
            position_name VARCHAR(255) NOT NULL,
            count INT NOT NULL,
            PRIMARY KEY (position_name)
        )";
        $pdo->exec($sql);

        // Create the parties table
        $sql = "CREATE TABLE parties (
            party_name VARCHAR(255) NOT NULL,
            id_count INT NOT NULL,
            president_position VARCHAR(255) DEFAULT NULL,
            PRIMARY KEY (party_name),
            FOREIGN KEY (president_position) REFERENCES positions(position_name)
        )";
        $pdo->exec($sql);

        echo "Tables created successfully";
    } catch (PDOException $e) {
        echo "Error creating tables: " . $e->getMessage();
    }
}

function insertPartyWithPresident($party_name, $id_count, $president_position) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=myDatabase", "myUsername", "myPassword");

        // Check if the president position is available
        $stmt = $pdo->prepare("SELECT count FROM positions WHERE position_name = :president_position");
        $stmt->execute(['president_position' => $president_position]);
        $result = $stmt->fetch();
        if ($result['count'] <= 0) {
            throw new Exception("The president position is not available");
        }

        // Insert the party with the president position
        $stmt = $pdo->prepare("INSERT INTO parties (party_name, id_count, president_position) VALUES (:party_name, :id_count, :president_position)");
        $stmt->execute(['party_name' => $party_name, 'id_count' => $id_count, 'president_position' => $president_position]);

        echo "Party added successfully";
    } catch (PDOException $e) {
        echo "Error inserting party: " . $e->getMessage();
    }



    function insertPosition($position_name, $available_count, $party_name) {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=myDatabase", "myUsername", "myPassword");
    
            // Check if party has reached position limit
            $stmt = $pdo->prepare("SELECT COUNT(*) AS party_count FROM party WHERE party_name = :party_name");
            $stmt->execute(['party_name' => $party_name]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $party_count = $result['party_count'];
    
            $stmt = $pdo->prepare("SELECT SUM(available_count) AS total_count FROM positions WHERE party_name = :party_name");
            $stmt->execute(['party_name' => $party_name]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total_count = $result['total_count'] ? $result['total_count'] : 0;
    
            if ($total_count + $available_count > $party_count) {
                echo "Cannot add position, party has reached position limit";
                return;
            }
    
            // Insert the position
            $stmt = $pdo->prepare("INSERT INTO positions (position_name, available_count, party_name) VALUES (:position_name, :available_count, :party_name)");
            $stmt->execute(['position_name' => $position_name, 'available_count' => $available_count, 'party_name' => $party_name]);
    
            echo "Position added successfully";
        } catch (PDOException $e) {

            echo "Error inserting position: " . $e->getMessage();
            
        }
    }



    insertPosition("Senator", 5, "LP");

    



}


?>

