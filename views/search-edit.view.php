<?php
require 'partials/head.php';

require 'partials/header.php';
?>
	<main id="main">
		<?php
		include 'views/partials/editnav.php';
		?>
		<content>
			<section>
				<?=$content?>
			</section>
		</content>
	</main>
<?php
require 'partials/footer.php';
?>