<?php
require_once 'tools\DB.php';
/**
 * Server variabelen
 * SERVER
 * GET
 * POST
 */
//$App = parse_ini_file("env.ini", true);
//$App = require 'private.php';
// $dbconn = $App['database'];

$routes = [
    "/" => "controllers/home.php",
    "/profile" => "controllers/profile/profile.php",
    "/profile/details" => "controllers/profile/details.php",
    "/profile/grades" => "controllers/profile/grades.php",
    "/profile/hobbies" => "controllers/profile/hobbies.php",
    "/profile/experience" => "controllers/profile/experience.php",
    "/profile/skills" => "controllers/profile/skills.php",
    "/profile/about" => "controllers/profile/about.php",
    "/profile/contact" => "controllers/profile/contact.php",
    "/login" => "controllers/login.php",
    "/register" => "controllers/register.php"
];

//    "/details/cijfers" => "controllers/details/cijfers.php",
//    "/details/ervaringen" => "controllers/details/ervaringen.php",
//    "/details/hobbies" => "controllers/details/hobbies.php",
//    "/details/profiel" => "controllers/details/profiel.php",
//    "/details/profiel/settings" => "controllers/details/settings.php",



$conn = require 'private.php';

require 'autologin.php';

$route = $_SERVER['PATH_INFO'] ?? '/';
$parts = explode('/', $route);
if($parts[1] === 'profile'){
    unset($parts[2]);
}

$route = join('/', array_values($parts));
//echo $route;
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