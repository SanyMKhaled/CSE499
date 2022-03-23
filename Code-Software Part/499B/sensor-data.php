<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$dbname = "sdata";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id, sensor, location, weight, reading_time FROM sensorData ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Sensor</td> 
        <td>Location</td> 
        <td>Weight (kg)</td> 
        <td>Timestamp</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_sensor = $row["sensor"];
        $row_location = $row["location"];
        $row_weight = $row["weight"]; 
        $row_reading_time = $row["reading_time"];
 echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_sensor . '</td> 
                <td>' . $row_location . '</td> 
                <td>' . $row_weight . '</td> 
                <td>' . $row_reading_time . '</td> 
              </tr>';
    }
    $result->free();
}
//strtotime("$row_reading_time + 6 hours");
$conn->close();
?> 
</table>
</body>
</html>