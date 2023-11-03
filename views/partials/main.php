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
	<content style="padding: 40px;"><?php echo $content ?></content>
</main>