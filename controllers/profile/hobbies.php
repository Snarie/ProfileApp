<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];



$content = "hobbies";
require 'views/profile.view.php';