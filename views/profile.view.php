<?php
$url = $_SERVER['PATH_INFO'];
$pageOwner = explode('/', $url)[2];
$sql = "SELECT * FROM users
		WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $pageOwner, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$result) {
    header('Location: /home');
}
$pageOwnerId = $result['id'];


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
				<?php

				$sql = "SELECT *
					    FROM profiles
					    WHERE id = :userid AND icon IS NOT NULL";
				$stmt = $conn->prepare($sql);
				$stmt->bindParam(':userid', $pageOwnerId, PDO::PARAM_INT);
				$stmt->execute();
				$profileInfo = $stmt->fetch(PDO::FETCH_ASSOC);
				if($profileInfo) {
					$iconName = "/public/images/profile_icons/".$profileInfo['icon'];
				} else {
					$iconName =  "/public/images/moveIcon_def.png";
				}
				?>
                <img class="profile-icon-large" src="<?=$iconName?>" alt="profile">
                <div>
				<?php
                if(isset($profileInfo['firstname'])) {
                    $firstname = htmlspecialchars($profileInfo['firstname'], ENT_QUOTES, 'UTF-8');
                    echo "<div class='container row-mini even-colored'>
                            <p class='left'>firstname:</p>
                            <p class='right'>$firstname</p>
                          </div>";
                }
                if(isset($profileInfo['lastname'])) {
                    $lastname = htmlspecialchars($profileInfo['lastname'], ENT_QUOTES, 'UTF-8');
	                echo "<div class='container row-mini even-colored'>
                            <p class='left'>lastname:</p>
                            <p class='right'>$lastname</p>
                          </div>";
                }
                if(isset($profileInfo['email'])) {
                    $email = htmlspecialchars($profileInfo['email'], ENT_QUOTES, 'UTF-8');
	                echo "<div class='container row-mini even-colored'>
                            <p class='left'>email:</p>
                            <p class='right'>$email</p>
                          </div>";
                }
                if(isset($profileInfo['gender'])) {
                    $gender = $profileInfo['gender'];
	                echo "<div class='container row-mini even-colored'>
                            <p class='left'>gender:</p>
                            <p class='right'>$gender</p>
                          </div>";
                }
                ?>
                </div>
			</section>
			<section class="area-right" style="padding: 20px">
                <?=$content?>
			</section>
	</content>
</main>
<?php
require 'partials/footer.php';
?>