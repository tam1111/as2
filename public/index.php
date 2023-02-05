<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Home</title>
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
<img src="images/randombanner.php"/>
	<main class="home">
		<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</a></p>

		<h2>Select the type of job you are looking for:</h2>
		<ul>
					<li><a href="it.php">IT</a></li>
					<li><a href="hr.php">Human Resources</a></li>
					<li><a href="sales.php">Sales</a></li>

				</ul>
			</li>

	</main>


	<footer>
	<?php
		require 'footer.php';
		?>
	</footer>
</body>
</html>
