 <?php
 ob_start();
 session_start();
 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "spotify-clone";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=spotify-clone", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

//Create connection
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?> 