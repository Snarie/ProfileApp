<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];

$sql = "SELECT * FROM content where page='about'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$content = "about";

$links = "";
if($name === $_SESSION['username']) {
	$links = "
	<ul class='navbar menu-right'>
	<li class='nav link'>
		<a href='/edit/contact'><i class='material-symbols-outlined'>edit_square</i>Edit about</a>
	</li>
	</ul>	
	";
}


require 'views/profile.view.php';