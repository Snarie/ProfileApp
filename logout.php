<?php
session_start();

session_unset();
session_destroy();

if(isset($_COOKIE['remember_me'])) {
	list($user_id, $token) = explode(':', $_COOKIE['remember_me']);

	$conn = require 'private.php';

	$sql = "DELETE FROM remember_tokens WHERE user_id = :user_id AND token = :token";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt->bindParam(':token', $token, PDO::PARAM_STR);
	$stmt->execute();
}

header('Location: /');