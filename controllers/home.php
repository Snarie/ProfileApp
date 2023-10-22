<?php

 $sql = "SELECT username FROM users";
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $content = "";
 foreach($results as $result) {
	 $content .= "<a href='/profile/{$result['username']}'>{$result['username']}</a><br>";
 }
require 'views/base.view.php';