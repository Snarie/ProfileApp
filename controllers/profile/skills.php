<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];



$content = "skills";
require 'views/profile.view.php';