<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];


$content = "experience";
require 'views/profile.view.php';