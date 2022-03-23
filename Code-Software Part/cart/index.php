<?php
	session_start();
	//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	//unset qunatity
	unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Shopping Cart using Session in PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style>
		.product_image{
			height:200px;
		}
		.product_name{
			height:80px; 
			padding-left:20px; 
			padding-right:20px;
		}
		.product_footer{
			padding-left:20px; 
			padding-right:20px;
		}
		nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
	a{
        color: #fff;
        font-size: 20px!important;
        font-weight: 500;
	}
	button a{
        color: #6665ee;
        font-weight: 500;
    }
	
    
	</style>
</head>
<body>

	<nav class="navbar navbar-dark" style="background: #6665ee!important ; padding:10px 10px!important">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">LPG Store</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/cart/index.php">Products <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/home.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
			  <li>

			  <?php
          if(isset($_SESSION['email'])){
                ?>
                
            <span class="nav-item">
            <button type="button" class="btn btn-light"><a href="/user/logout-user.php">Logout</a></button>
            </span>

                <?php
            }  else{
                ?>   
                
            <span class="nav-item">
            <button type="button" class="btn btn-light"><a href="/user/login-user.php">Login</a></button>
            </span>

                <?php
            }
            ?>
			  </li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">	
	<?php

		//info message
		if(isset($_SESSION['message'])){
			?>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				</div>
			</div>
			<?php
			unset($_SESSION['message']);
		}
		//end info message
		//fetch our products	
		//connection
		$conn = new mysqli('localhost', 'root', '', 'sdata');

		$sql = "SELECT * FROM products";
		$query = $conn->query($sql);
		$inc = 4;
		while($row = $query->fetch_assoc()){
			$inc = ($inc == 4) ? 1 : $inc + 1; 
			if($inc == 1) echo "<div class='row text-center'>";  
			?>
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row product_image">
							<img src="<?php echo $row['photo'] ?>" width="80%" height="auto">
						</div>
						<div class="row product_name">
							<h4><?php echo $row['name'] ; ?></h4>
							<h4><?php echo $row['weight'] ; ?></h4>
						</div>
						<div class="row product_footer">
							<p style="text-align:center"><b>Price: <?php echo $row['price']; ?></b></p> <br>
							<span ><a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add to Cart</a></span>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		if($inc == 1) echo "<div></div><div></div><div></div></div>"; 
		if($inc == 2) echo "<div></div><div></div></div>"; 
		if($inc == 3) echo "<div></div></div>";
		
		//end product row 
	?>
</div>
</body>
</html>