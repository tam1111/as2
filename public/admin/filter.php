<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();
// Get all categories
 $category = [];
 
 $result = $pdo->query('SELECT * FROM job');


// Filter jobs

// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

// 	$stmt = $pdo->prepare('SELECT FROM job WHERE category = :category');
// 	$stmt->execute(['category' => $_POST['category']]);

//     header('location: job.php');
// } 
?>

$categories = $pdo->query('SELECT * FROM category');

$query = "SELECT * FROM job";

$result = mysqli_query($conn, $query);

$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

$stmt->execute(['id' => $_POST['id']]);