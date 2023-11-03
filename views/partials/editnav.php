<?php
//$route = $route ?? '/';
$pageowner = $_GET['id'];
$id = $_SESSION['username'];
$url = $_SERVER['PATH_INFO'];
$editpage = explode('/', $url)[2];
?>
<div class="menu row-smaller">
	<ul class="navbar menu-left">
		<li class="nav link">
            <a href="/profile/<?=$id?>"><?=$id?>'s Profile</a>
        </li>
        <li class="nav link">
            <a href="/profile/<?=$id?><?php echo $returnpage ==='profile'? '': $returnpage ?>">Return to <?=$returnpage?></a>
        </li>

	</ul>
	<?php
	if(isset($links)){
		echo $links;
	}
	?>
</div>