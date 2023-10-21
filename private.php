<?php
$data = [
    "database" =>[
        'servername' => "localhost",
        'username' => "root",
        'password' => "Sprits#nummer20",
        'dbname' => "profileapp"
    ],
    "information"=>[
        'test' => 'profileapp'
    ]
];

$db = $data["database"];
$dsn = "mysql:host=".$db['servername'].";dbname=".$db['dbname'].";charset=utf8mb4";
try {
    $conn = new PDO(
        $dsn,
        $db['username'],
        $db['password']);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected succesfully";
    return $conn;
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    return "";
}