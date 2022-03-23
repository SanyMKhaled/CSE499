
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <style>

table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
tr {
  text-align: center;
}

    </style>

    <title>LPG Store</title>
  </head>
  <body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="dashboard.php" class="font-weight-bold">LPG Store</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-primary site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-white"></span></a></span>


              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li ><a href="dashboard.php" class="nav-link">Home</a></li>
                  <li ><a href="users.php" class="nav-link">Users</a></li>
                  <li><a href="products.php" class="nav-link">Products</a></li>
                  <li class="active"><a href="payments.php" class="nav-link">Payments</a></li>
                  <li><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>
    <div class="hero">
      

    <div style="padding-top:100px">
<?php
include_once 'connection.php';
$result = mysqli_query($con,"SELECT * FROM orders");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table align="center" style="border: 1px solid black;
  border-collapse: collapse;">
  
  <tr>
  <td >Customer ID</td>
    <td >Order Id</td>
    <td>Name</td>
    <td>Email</td>
    <td>Phone</td>
    <td>Amount</td>
    <td>Address</td>
    <td>Status</td>
    <td>Trx ID</td>
    <td>Currency</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr> <td><?php echo $row["customer_id"]; ?></td>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["phone"]; ?></td>
    <td><?php echo $row["amount"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
    <td><?php echo $row["transaction_id"]; ?></td>
    <td><?php echo $row["currency"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>






















      
  </div>

    
      </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>