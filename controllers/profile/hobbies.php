<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];



$content = "hobbies";

$links = "";
if($name === $_SESSION['username']) {
	$links = "
	<ul class='navbar menu-right'>
	<li class='nav link'>
		<a href='/edit/hobbies'><i class='material-symbols-outlined'>edit_square</i>Edit hobbies</a>
	</li>
	</ul>	
	";
}
require 'views/profile.view.php';