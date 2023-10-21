<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Changed from: https://github.com/dalisc/hover-collapsible-sidebar -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
		<link rel="stylesheet" href="\public\css\menu.css">
		<script src="\public\js\menu.js"></script>
	</head>

	<body>
		<header>This is the HTML header</header>
		<!-- https://fonts.google.com/icons -->
		<sidebar id="mySidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
			<a href="/" <?= ($_SERVER['REQUEST_URI'] == '/' ? 'active' : ''); ?>>
				<span>
					<i class="material-icons">home</i>
					<span class="icon-text">Home</span>
				</span>
			</a><br>
			<a href="/about" <?= ($_SERVER['REQUEST_URI'] == '/about' ? 'active' : ''); ?>>
				<span>
					<i class="material-icons">info</i>
					<span class="icon-text">About</span>
				</span>
			</a><br>
			<a href="/skills" <?= ($_SERVER['REQUEST_URI'] == '/skills' ? 'active' : ''); ?>>
				<span>
					<i class="material-icons">rule</i>
					<span class="icon-text">Skills</span>
				</span>
			</a><br>
			<a href="/details" <?= ($_SERVER['REQUEST_URI'] == '/details' ? 'active' : ''); ?>>
				<span>
					<i class="material-symbols-outlined">page_info</i>
					<span class="icon-text">Details</span>
				</span>
			</a><br>
			<a href="/contact" <?= ($_SERVER['REQUEST_URI'] == '/contact' ? 'active' : ''); ?>>
				<span>
					<i class="material-icons">email</i>
					<span class="icon-text">Contact</span>
				</span>
			</a>
		</sidebar>
		<main id="myMain">
			<section><p><?php echo $mySection ?></p></section>
			<content><?php echo $myContent ?></content>
		</main>
		<footer>Footer</footer>
	</body>
</html>