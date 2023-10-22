<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];


$content = "grades";
require 'views/profile.view.php';