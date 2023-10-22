<?php
require 'partials/head.php';

require 'partials/header.php';
//	require 'partials/nav.php';
?>
<main id="main">
	<?php
	include 'views/partials/profilenav.php';
	?>
	<content class="profile-grid">
			<section class="area-left">
				<img class="profile-icon-large" src="/public/images/moveIcon_def.png" alt="profile">
				wefejqnfiquvnipureh
			</section>
			<section class="area-right">
                <?=$content?>
			</section>
	</content>
</main>
<?php
require 'partials/footer.php';
?>