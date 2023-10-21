<main id="myMain">
    <?php
    $route = $_SERVER['PATH_INFO'] ?? '/';
    $parts = explode('/', $route);
    if($parts[1] === 'profile'){
//        echo"<section>";
        include 'views/partials/profilenav.php';
//        echo"</section>";
    }
    ?>
	<content><?php echo $content ?></content>
</main>