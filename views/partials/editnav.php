<?php
//$route = $route ?? '/';
$id = $_SESSION['username'];
?>
<div class="menu row-smaller">
	<ul class="navbar menu-left">
		<li class="nav link" id="/profile"><a href="/profile/<?=$id?>"><?=$id?>'s Profile</a></li>
		<li class="nav link dropdown" id="profile/details">
			<a>Details</a>
			<ul class="subbar">
				<li class="drop link" id="/profile/grades">
					<a href="/profile/<?=$id?>/grades">Grades</a>
				</li>
				<li class="drop link" id="/profile/experience">
					<a href="/profile/<?=$id?>/experience">Experience</a>
				</li>
				<li class="drop link" id="/profile/hobbies">
					<a href="/profile/<?=$id?>/hobbies">Hobbies</a>
				</li>
				<li class="drop link" id="/profile/skills">
					<a href="/profile/<?=$id?>/skills">Skills</a>
				</li>
			</ul>
		</li>
		<li class="nav link" id="profile/about">
			<a href="/profile/<?=$id?>/about">About</a>
		</li>
		<li class="nav link" id="profile/contact">
			<a href="/profile/<?=$id?>/contact">Contact</a>
		</li>

	</ul>
	<?php
	if(isset($links)){
		echo $links;
	}
	?>
</div>