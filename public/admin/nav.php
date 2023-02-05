
<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Jobs
				<ul>
				<?php $categories = $pdo->query('SELECT * FROM category'); ?>
				<?php foreach ($categories as $category): ?>
               <li><a href="#"><?php echo $category['name']; ?></a></li>
                  <?php endforeach; ?>
				  

				</ul>
			</li>
			<li><a href="/about.html">About Us</a></li>

		</ul>
		

	</nav>
	
	<!-- <li><a href="it.php">IT</a></li>
					<li><a href="hr.php">Human Resources</a></li>
					<li><a href="sales.php">Sales</a></li> -->