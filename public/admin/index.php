<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Admin Home</title>
	</head>
	<body>
	<header>
		<section>
			<?php
			require 'section.php';
			?>

		</section>
	</header>
	<nav>
	    <?php
		require 'nav.php';
		?>

	</nav>
	<img src="/images/randombanner.php"/>
	<main class="sidebar">



	<?php
	if (isset($_POST['submit'])) {
		if ($_POST['password'] == 'letmein') {
			$_SESSION['loggedin'] = true;
		}
	}


	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	?>

	<section class="left">
		<ul>
			<li><a href="jobs.php">Jobs</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">
	<h2>You are now logged in</h2>
	</section>
	<?php
	}

	else {
		?>
		<h2>Log in</h2>

		<form action="index.php" method="post" style="padding: 40px">

			<label>Enter Password</label>
			<input type="password" name="password" />

			<input type="submit" name="submit" value="Log In" />
		</form>
	<?php
	}
	?>


	</main>

	<footer>
	<?php
		require 'footer.php';
		?>
	</footer>
</body>
</html>

