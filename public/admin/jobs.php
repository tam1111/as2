<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Job list</title>
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

	<section class="left">
		<ul>
			<li><a href="jobs.php">Jobs</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

	

	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>


			<h2>Jobs</h2>

			<a class="new" href="addjob.php">Add new job</a>

			<form action="filter.php" method="get">
  <select name="filter_category">
    <option value="">All Categories</option>
	<option value="">IT</option>
    <?php foreach ($categories as $category): ?>
      <option value="<?php echo $category['name']; ?>" <?php echo $filter_category === $category['name'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
    <?php endforeach; ?>
  </select>
  <input type="submit" value="Filter">
</form>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Title</th>';
			echo '<th style="width: 15%">Salary</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 15%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			$stmt = $pdo->query('SELECT * FROM job');

			foreach ($stmt as $job) {
				$applicants = $pdo->prepare('SELECT count(*) as count FROM applicants WHERE jobId = :jobId');

				$applicants->execute(['jobId' => $job['id']]);

				$applicantCount = $applicants->fetch();

				echo '<tr>';
				echo '<td>' . $job['title'] . '</td>';
				echo '<td>' . $job['salary'] . '</td>';
				echo '<td><a style="float: right" href="editjob.php?id=' . $job['id'] . '">Edit</a></td>';
				echo '<td><a style="float: right" href="applicants.php?id=' . $job['id'] . '">View applicants (' . $applicantCount['count'] . ')</a></td>';
				echo '<td><form method="post" action="deletejob.php">
				<input type="hidden" name="id" value="' . $job['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';

		}

		else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}


	?>

</section>
	</main>

	<footer>
	<?php
		require 'footer.php';
		?>
	</footer>
</body>
</html>


