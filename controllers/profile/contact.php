<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];

$sql = "SELECT * FROM content where page='contact'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$content = "<p>Contact</p><p>Adres<br>Woonplaats</p>";

$links = "";
if($name === $_SESSION['username']) {
	$links = "
	<ul class='navbar menu-right'>
	<li class='nav link'>
		<a href='/edit/contact'><i class='material-symbols-outlined'>edit_square</i>Edit contact</a>
	</li>
	</ul>	
	";
}
require 'views/profile.view.php';