<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];

$links = "";
if(isset($_SESSION['username'])) {
	if($name === $_SESSION['username']) {
		$links = "
			<ul class='navbar menu-right'>
			<li class='nav link'>
			<a href='/edit/about?id={$_SESSION['username']}'><i class='material-symbols-outlined'>edit_square</i>Edit experience</a>
			</li>
			</ul>";
	}
}
$sql = "SELECT * FROM users
		WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $name, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$result) {
	header('Location: /home');
}
$pageOwnerId = $result['id'];

$sql = "SELECT * FROM profiles WHERE id = :userid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userid', $pageOwnerId, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result) {
	$content = $result['experience'];
} else {
	$content = "";
}


require 'views/profile.view.php';