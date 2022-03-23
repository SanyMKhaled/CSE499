<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style>
		nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
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

	    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" >
	      <ul class="nav navbar-nav " >
            <li class="nav-item active">
                <a class="nav-link" href="/cart/index.php" style="color: #fff;font-size: 18px!important;font-weight: 500;">Products <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/home.php" style="color: #fff;font-size: 18px!important;font-weight: 500;">Profile</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="/user/orders.php" style="color: #fff;font-size: 18px!important;font-weight: 500;">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #fff;font-size: 18px!important;font-weight: 500;">Contact</a>
            </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="view_cart.php" style="color: #fff;font-size: 18px!important;font-weight: 500;"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
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
	<h1 class="page-header text-center">Cart Details</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<form method="POST" action="save_cart.php">
			<table class="table table-bordered table-striped">
				<thead>
					<th></th>
					<th>Name</th>
					<th>Weight</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
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
								<tr>
									<td>
										<a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['weight']; ?></td>
									<td><?php echo number_format($row['price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">

									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>

									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>

									<?php $total += $_SESSION['qty_array'][$index]*$row['price']; 
									?>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total, 2); ?></b></td>
					</tr>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
			<button type="submit" class="btn btn-success" name="save">Save Changes</button>
			<a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
			
			<?php
          if(isset($_SESSION['email'])){
                ?>
				<a href="/499B/example_hosted.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
                <?php
            }  else{
                ?>   
                <a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
                <?php
            }
            ?>
			</form>
		</div>
	</div>
</div>
</body>
</html>