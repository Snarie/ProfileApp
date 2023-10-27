<?php
if(!isset($_SESSION['user_id'])) {
	header('Location: /login');
}


require 'views/edit.view.php';