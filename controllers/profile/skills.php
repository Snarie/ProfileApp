<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];



$content = "skills";

$links = "";
if($name === $_SESSION['username']) {
	$links = "
	<ul class='navbar menu-right'>
	<li class='nav link'>
		<a href='/edit/skills'><i class='material-symbols-outlined'>edit_square</i>Edit skills</a>
	</li>
	</ul>	
	";
}
require 'views/profile.view.php';