<?php

$type     = 'mysql';                             // Type of database
$server   = '192.185.2.183';                    // Server the database is on
$db       = 'mikemh_luna_messages';    // Name of the database
$port     = '3306';                           // Port is usually 3306 in Hostgator
$charset  = 'utf8mb4';                       // UTF-8 encoding using 4 bytes of data per char

$username = 'mikemh_lunaAdmin';     // Enter YOUR cPanel username and user here
$password = 'RdWavHF+3T?rqZ-';           // Enter YOUR user password here



// DO *NOT* CHANGE ANYTHING BENEATH THIS LINE


// Array containing options for configuring PDO
$options  = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,       // Set error mode to throw exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Set default fetch mode to associative array
    PDO::ATTR_EMULATE_PREPARES => false,            // Disable emulation of prepared statements
];


$dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset"; // Create DSN
try {                                                              // Try connecting to the db
    $pdo = new PDO($dsn, $username, $password, $options);         // Create a new PDO instance
}
catch (PDOException $e) {                  // Catch any exceptions that occur during connection
    throw new PDOException($e->getMessage(), $e->getCode());    // Re-throw exception
}

/*
 * Executes an SQL query using PDO, optionally binding parameters.
 *
 * @param PDO $pdo                      An instance of the PDO class.
 * @param string $sql                   The SQL query string.
 * @param array|null $arguments         Optional array of parameters to bind to the SQL query.
 * @return PDOStatement PDOStatement    A PDOStatement object containing the result set.
 */
function pdo(PDO $pdo, string $sql, array $arguments = null)
    {
        if (!$arguments) {                   // If no arguments provided
            return $pdo->query($sql);       // Run SQL query and return PDOStatement object
        }
        $statement = $pdo->prepare($sql);  // If arguments, prepare SQL statement
        $statement->execute($arguments);  // Bind & execute SQL statement w/provided arguments
        return $statement;               // Return PDOStatement object
    }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['req'] == "SUBMIT_MESSAGE") {
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO messages VALUES (:MESSAGE_TEXT, :user, NOW())";
        $params = [];
        $params['user'] = $email;
        $params['MESSAGE_TEXT'] = $message;

        $query = $pdo->prepare($sql);
        $query->execute($params);
        header("Location: /luna/login.php");
        exit();
    } else if ($_POST['req'] == "DELETE_MESSAGE") {
        $msg_timestamp = $_POST['msg_timestamp'];
        $sql = "DELETE FROM messages WHERE timestamp = :msg_timestamp";
        $params = [];
        $params['msg_timestamp'] = $msg_timestamp;
        $query = $pdo->prepare($sql);
        $query->execute($params);
        $numDeleted = $query->rowCount();
        header("Location: /luna/login.php?numDeleted=$numDeleted");
        exit();
    }
}

?>