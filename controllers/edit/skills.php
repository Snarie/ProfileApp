<?php
if(!isset($_SESSION['user_id'])) {
	header('Location: /login');
}

$content = "";
require 'views/edit.view.php';