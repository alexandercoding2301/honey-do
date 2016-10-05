<?php include 'database.php'; ?>
<?php 
	//Create Select Query
	$query = "SELECT * FROM requests ORDER BY id DESC ";
	$requests = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charest="utf-8"/>
		<title>Honey Do!</title>
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
	
	
	</head>
	<body>
		<div id="container"></header>
			<header><h1>Honey Do!</h1>
			<div id="do">
				<ul>
					<?php while($row = mysqli_fetch_assoc($requests)) : ?>
						<li class="request"><span><?php echo $row["Time"]?>- </span><strong> <?php echo $row["User"] ?>:</strong> <?php echo $row["Message"]?></li>
					<?php endwhile; ?>
					 
				</ul>
			
			
			
			</div>
			<div id="input">
				<?php if(isset($_GET['error']))   : ?>
					<div class="error"><?php echo $_GET['error']; ?></div>
				<?php endif; ?>
				<form method="post" action="process.php">
					<input type="text" name="User" placeholder="Enter Your Name"/>
					<input type="text" name="Message" placeholder="Enter Your Message"/>
					<br/>
					<input class="do-button" type="submit" name="submit" value="Honey Do"/>
				</form>
			
			
			
			</div>
		</div>
	
	
	
	
	




	</body>
</html>