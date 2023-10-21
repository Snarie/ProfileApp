<?php

function OpenDB($db)
{
    // $db = [
    //     "servername" => "localhost",
    //     "username" => "root",
    //     "drowssap" => "Blub!976",
    //     "dbname" => "profileApp"
    // ];
    $dsn = "mysql:host=".$db['servername'].";dbname=".$db['dbname'].";charset=utf8mb4";
    $conn = new PDO(
        $dsn,
        $db['username'],
        $db['drowssap']
    );
//    $conn = new PDO("mysql:host={$db['servername']}", $db["username"], $db["drowssap"]);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($conn->query("SELECT * FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '{$db['dbname']}'")->rowCount() > 0) {
	   $conn = new PDO("mysql:dbname={$db['dbname']};host={$db['servername']}", $db["username"], $db["drowssap"]);
    } else {
		$file = file_get_contents('models/modules.sql', FALSE, NULL);
        $sql = "CREATE DATABASE {$db['dbname']}";
        $conn->exec($sql);
		$conn = null;
		$conn = new PDO("mysql:dbname={$db['dbname']};host={$db['servername']}", $db["username"], $db["drowssap"]);
        $conn->exec($file);
    }
    return $conn;
}