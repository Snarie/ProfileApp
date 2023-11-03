<?php
require_once 'tools\DB.php';

$routes = [
    "/" => "controllers/home.php",
	"/home" => "controllers/home.php",
	"/about" => "controllers/aboutus.php",
	"/forum/faq" => "controllers/faq.php",

	"/login" => "controllers/login.php",
	"/register" => "controllers/register.php",

    "/profile" => "controllers/profile/profile.php",
	"/profile/contact" => "controllers/profile/contact.php",
	"/profile/experience" => "controllers/profile/experience.php",
    "/profile/hobbies" => "controllers/profile/hobbies.php",
    "/profile/skills" => "controllers/profile/skills.php",

	"/edit/picture" => "controllers/edit/picture.php",
	"/edit/about" => "controllers/edit/about.php",
	"/edit/contact" => "controllers/edit/contact.php",
	"/edit/experience" => "controllers/edit/experience.php",
	"/edit/hobbies" => "controllers/edit/hobbies.php",
	"/edit/skills" => "controllers/edit/skills.php"
];




$conn = require 'private.php';

require 'autologin.php';

$path = $_SERVER['PATH_INFO'] ?? '/';
//echo $path." ";
$parts = explode('/', $path);
if($parts[1] === 'profile'){
    unset($parts[2]);
}

$route = join('/', array_values($parts));
//echo $route." ";
if(array_key_exists($route, $routes)){
    require $routes[$route];
//    echo $route."<br>";
}else{
//    http_response_code(404);
    echo "404<br>";
    echo $route."<br>";
    echo $_SERVER['PATH_INFO'];
    phpinfo();
}