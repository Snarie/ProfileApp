<?php
$pageowner = $_GET['id'];
if(!isset($_SESSION['user_id'])) {
	header('Location: /login');
	exit;
}
if($_SESSION['username'] !== $pageowner && $_SESSION['username'] !== "admin"){
//	header('Location: /login');
	header('Location: /login');
	exit;
}

if (isset($_POST["submit"])) {
	$postmsg = "";
	if(empty($_FILES["iconFile"]["name"])) {
		$postmsg .= "No file attached. Please select an image to upload.";
	} else {
		$postmsg .= uploadImage($pageowner, $conn);
	}

}
function uploadImage($pageowner, $conn): string
{
	$msg = "";

	$targetDirectory = $_SERVER['DOCUMENT_ROOT']."/public/images/profile_icons/"; // Directory where the uploaded images are stored
	$imageFileType = strtolower(pathinfo($_FILES["iconFile"]["name"], PATHINFO_EXTENSION));

	// Generate a unique file name based on timestamp with only letters and digits
	$uniqid = preg_replace("/[^a-zA-Z0-9]/", "", uniqid('', true));
	$uniqueName = $pageowner . $uniqid . ".". $imageFileType;

	$targetFile = $targetDirectory . $uniqueName;

	if(move_uploaded_file($_FILES["iconFile"]["tmp_name"], $targetFile)) {

		$image = imagecreatefromstring(file_get_contents($targetFile));
		$width = imagesx($image);
		$height = imagesy($image);
		$newsize = min($width, $height);
		$croppedImage = imagecrop($image, [
			'x' => 0,
			'y' => 0,
			'width' => $newsize,
			'height' => $newsize
		]);

		if($croppedImage !== false) {
			imagejpeg($croppedImage, $targetFile);
			imagedestroy($image);
			imagedestroy($croppedImage);

			$sql = "SELECT * FROM users
					WHERE username = :username";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':username', $pageowner, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$userid = $result['id'];

			$sql = "SELECT icon
					FROM profiles
					WHERE id = :userid AND icon IS NOT NULL";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result) {
				$oldIconName = $result['icon'];
				$target = $targetDirectory . $oldIconName;
				$msg .= $oldIconName;
				if(file_exists($target)) {
					if(unlink($target)) {

						//$msg .= "Delete Succesfull   ";
					} else {
						//$msg .= "Delete Failed   ";
					}
				}
			}
			$sql = "INSERT INTO profiles (id, icon)
					VALUES (:userid, :iconName)
					ON DUPLICATE KEY UPDATE icon = :iconName";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
			$stmt->bindParam(':iconName', $uniqueName, PDO::PARAM_STR);
			$stmt->execute();
//			$uniqueName;
			$msg .= "Image uploaded succesfully.$userid";
		} else {
			$msg .= "Error cropping image";
		}
	} else {
		$msg .= "There was an error uploading the image";
	}
	return $msg;
}

$url = $_SERVER['PATH_INFO'];
$editpage = explode('/', $url)[2];
$content ="
	<content>
		<div class='smallnav'>
			<a href='/edit/about?id=$pageowner' class='". ($editpage === 'about' ? 'active': '')."'>Profile</a>
			<a href='/edit/picture?id=$pageowner' class='". ($editpage === 'picture' ? 'active': '')."'>Picture</a>
			<a href='/edit/hobbies?id=$pageowner' class='". ($editpage === 'hobbies' ? 'active': '')."'>Hobbies</a>
		</div><br>
";
if(isset($postmsg)) {
	$content .="<div class='container row-smallest' style='background-color: var(--secondary-color-2)'>$postmsg</div>";
}
$content .= "
		<div class='flex-container flex-center'>
		<form action='' method='post' enctype='multipart/form-data' id='uploadImage'>
        	<label for='iconFile'>Select .png file to upload:</label>
        	<br>
        	<input type='file' name='iconFile' id='iconFile'>
        	<input type='hidden' name='userID' value={$_SESSION['user_id']}>
        	<input type='submit' value='Upload Image' name='submit'>
    	</form>
    	</div>
    </content>
";

$returnpage = 'profile';
require 'views/edit.view.php';