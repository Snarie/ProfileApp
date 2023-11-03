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
                    <?php
                    if(isset($content)) {
                        echo $content;
                    }
                    ?>
			</section>
		</content>
	</main>
<?php
require 'partials/footer.php';
?>