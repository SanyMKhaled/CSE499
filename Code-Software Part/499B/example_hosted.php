<?php
	session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Example - Hosted Checkout | SSLCommerz</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>Payment By SSLCommerz</h2>
        <p class="lead">Enter your Information to proced to Payment</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill"></span>
            </h4>
            <?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'sdata');
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $row['name'];?></h6>
                        <small class="text-muted"><?php echo $row['weight'];?></small>
                    </div>
                    <span class="text-muted"><?php echo $row['price'];?></span>
                    <?php  number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['price'];
                                    $final=$total ?>
                </li>           
                        <?php
								$index ++;
							}
						}
						else{
							?>
							<?php
						}
                        ?>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong><?php echo number_format($total, 2); ?></strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your Profile</span>
            </h4>
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
								?>
            <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><strong>Customer ID</strong></h6>
                    </div>
                    <span class="text-muted"><?php echo $row['id'];?></span>
                </li>  

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><strong>Name</strong></b></h6>
                    </div>
                    <span class="text-muted"><?php echo $row['name'];?></span>
                </li> 

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><strong>Phone</strong></h6>
                    </div>
                    <span class="text-muted"><?php echo $row['phone'];?></span>
                </li> 

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><strong>Email</strong></h6>
                    </div>
                    <span class="text-muted"><?php echo $row['email'];?></span>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><strong>Address</strong></h6>
                    </div>
                    <span class="text-muted"><?php echo $row['Location'];?></span>
                </li>   
                
                <li class="list-group-item d-flex justify-content-between">
                    <span><strong>Payable Total (BDT)</strong></span>
                    <?php ;
                    echo $final ?>
                </li>
                <a href="/499B/checkout_hosted.php"><button class="btn btn-primary btn-md btn-block" type="submit"> Pay Now</button></a>
                        <?php

							}
						}
						else{
							?> <?php
						}?>
            </ul>
        </div>   
        </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; LPG Store</p>
        <ul class="list-inline">
        </ul>
    </footer>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>
