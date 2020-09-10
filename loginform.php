<html>
<head>
<link rel="icon" type="image/png" href="images/favicon.png" />
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="row-top">
		<div class="main">
			<div class="wrapper">
				<h1><a href="">VESIT<br><span style="font-family: arial; font-size: 15px;">Caterers</span></a></h1>
				<nav>
				  <ul class="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="menu.php">Menu</a></li>
					<li><a href="functionhall.php">Function Hall</a></li>
					<li><a href="reservation.php">Reservation</a></li>
					<li><a href="about-us.php">About Us</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a class="active" href="loginform.php">login</a></li>
				  </ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="row-bot">
		<div class="row-bot-bg">
			<div class="maincon">
				<div class="slider-wrapper">
					<div class="slider">
						<div id="slidercon" style="height: 200px; margin-top: 110px;">
							<div id="title">
								Login Form
							</div>
							<?php
							include('connect.php');
							$result = $db->prepare("SELECT * FROM falied");
							$result->execute();
							for($i=0; $row = $result->fetch(); $i++){
							$gcvgvc=$row['attempt'];
							$tttt=$row['time'];
							}
							$kjkjk=date('H:i:s');
								$time1 = strtotime($kjkjk);
								$time2 = strtotime($tttt);
								$diff = $time1 - $time2;
								if($diff>59){
									$mm=0;
									$sql = "UPDATE falied 
        SET attempt=?";
$q = $db->prepare($sql);
$q->execute(array($mm));
								}
							if($gcvgvc<=2){
							?>
							<form action="login.php" method="post">
								<?php
								?>
								<dl style="margin-left: 10px;">
									<dd>
										<span>Username</span>
										<input type="text" name="uname" />
									</dd><dd>
										<span>Password:</span>
										<input type="password" name="pword" />
									</dd><dd>
										<span>&nbsp;</span>
										<input type="submit" value="Login" />
									</dd>
								</dl>
							</form>
							<?php
							}
							if($gcvgvc>=3){
							echo '<span style="color: #ffffff; font-weight: bold; padding-left: 20px;width: 287px;display: inline-block;">You Have Reach The Maximum Login Attempts, Pls. Try after 30mins, <a href="loginform.php">Refresh</a> the page to try again.<span>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</php>