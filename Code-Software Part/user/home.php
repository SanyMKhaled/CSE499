<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href=".css">
    
    
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        width: 100%;
        text-align: left;
        font-size: 30px;
        font-weight: 600;
    }

    table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
tr {
  text-align: center;
}
#profile {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

 td,
 th {
    border: 1px solid #ddd;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

 tr:hover {
    background-color: #ddd;
}
th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3e4444;
    color: white;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/user/home.php">LPG Store </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/cart/index.php">Products <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/home.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            
			  <li>
            </ul>


            <span class="nav-item">
            <button type="button" class="btn btn-light"><a href="/user/logout-user.php">Logout</a></button>
            </span>

            
        </div>
    </nav>

    
<h1>Welcome <?php echo $fetch_info['name'] ?></h1>

<h1>Your Profile</h1>

    <table class="profile">
            <?php
        $email = $_SESSION['email'];
        $conn = mysqli_connect("localhost", "root", "", "sdata");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo"<th>User ID</th>";
                echo "<td>".$row['id']."</td>";
                echo "</tr>";

                $rid=$row['id'];

                echo "<tr>";
                echo"<th>Name </th>";
                echo "<td>".$row['name']."</td>";
                echo "</tr>";

                echo "<tr>";
                echo"<th>Phone</th>";
                echo "<td>".$row['phone']."</td>";
                echo "</tr>";

                echo "<tr>";
                echo"<th>Email</th>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";

                echo "<tr>";
                echo"<th>Status</th>";
                echo "<td>".$row['status']."</td>";
                echo "</tr>";
                include_once 'connection.php';
               
                   $cylinder = mysqli_query($con,"SELECT weight FROM sensordata where sensor= $rid order by reading_time DESC limit 1;
                   ");
                      if (mysqli_num_rows($cylinder) > 0) {
                     $i=0;
                     while($cdata = mysqli_fetch_array($cylinder)) {
                   
                echo "<tr>";
                echo"<th>Remaining Gas(ltr)</th>";
                echo "<td>".$cdata["weight"]." Ltr.</td>";
                echo "</tr>";
                 }
               }  

                echo "<tr>";
                echo"<th>Location</th>";
                echo "<td>".$row['Location']."</td>";
                echo "</tr>";
                }
                echo "</table>";
        }
        $conn->close();
        ?>
    </table>
    </div>

</body>
</html>