<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];

$links = "";
if(isset($_SESSION['username'])) {
	if($name === $_SESSION['username']) {
		$links = "
			<ul class='navbar menu-right'>
			<li class='nav link'>
			<a href='/edit/hobbies?id={$_SESSION['username']}'><i class='material-symbols-outlined'>edit_square</i>Edit hobbies</a>
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

$sql = "select *
        from hobbies_users hu   
        join users u on u.id = hu.userid
        join hobbies h on h.id = hu.hobbyid
        where u.username = :username;
";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username',$name, PDO::PARAM_STR);
$stmt->execute();
$hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);


$content = "";

foreach($hobbies as $hobby) {
	$content .= "<h1>{$hobby['name']}</H1>
				 <p>{$hobby['description']}</p>";
}
require 'views/profile.view.php';