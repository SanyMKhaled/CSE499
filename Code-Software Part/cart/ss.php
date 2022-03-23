
<h1> <?php
	session_start();
	echo $_SESSION['email'];
?></h1>

    <?php
          if(isset($_SESSION['email'])){
                ?>
                
            <span class="nav-item">
            <button type="button" class="btn btn-light"><a href="/user/login-user.php">Login</a></button>
            </span>

                <?php
            }  else{
                ?>   
                
            <span class="nav-item">
            <button type="button" class="btn btn-light"><a href="/user/logout-user.php">Logout</a></button>
            </span>

                <?php
            }
            ?>