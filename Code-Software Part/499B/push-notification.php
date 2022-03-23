<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM user WHERE id in(select sensor from sensordata where weight < 100 order by reading_time desc )";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "mail: " . $row["email"]."<br>";
    $mail = $row["email"];

$to_email= $mail;
$subject= "Gas Remaining";
$body = "This is a automated Refill system Test Notification";
$headers = "From: lpgstore.bd@gmail.com";

if(mail($to_email, $subject, $body, $headers)){
    echo "Email succesfully sent to $to_email...";
}else{
    echo "Email sending failed to $to_email...";
  }
} else {
  echo "0 results";
}
$conn->close();


?>
<?php header('Refresh: ; URL=/admin/users.php');?>