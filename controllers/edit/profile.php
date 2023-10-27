<?php
if(!isset($_SESSION['user_id'])) {
	header('Location: /login');
}

$content ="
	<div class='container'>Honden1</div>
	<div class='container'>Honden2</div>
	<div class='container'>Honden3</div>
	<div class='container'>Honden4</div>
	<div class='container'>Honden5</div>
";
require 'views/edit.view.php';