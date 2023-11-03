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

$search = $_POST['search'] ?? '';

$url = $_SERVER['PATH_INFO'];
$editpage = explode('/', $url)[2];
$content = "
<content>
<div class='smallnav'>
			<a href='/edit/about?id=$pageowner' class='". ($editpage === 'about' ? 'active': '')."'>Profile</a>
			<a href='/edit/picture?id=$pageowner' class='". ($editpage === 'picture' ? 'active': '')."'>Picture</a>
			<a href='/edit/hobbies?id=$pageowner' class='". ($editpage === 'hobbies' ? 'active': '')."'>Hobbies</a>
		</div>
	<form method='post'>
		<div class='container row-default' >
			<div class='flex-container flex-center'>
					<input type='text' name='search' placeholder='Search for hobbies...' value='$search'>
					<button type='submit'>Search</button>
        	</div>
    	</div>";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$hobbies = searchHobbies($conn, $search);
	if(isset($_POST['addhobby'])){
		addHobby($conn, $_SESSION['user_id'], $_POST['addhobby']);
	}
	if(isset($_POST['removehobby'])) {
		removeHobby($conn, $_SESSION['user_id'], $_POST['removehobby']);
	}
	$content .= "
		<div class='container row-smallest' style='background-color: var(--secondary-color-2'></div>
		<input type='hidden' name='pressedhobby' value=''>
		<table style='width: 100%'>
			<tbody>	";
	$userhobbies = getUserHobbies($conn, $_SESSION['user_id']);
	foreach($hobbies as $hobby){
		$even = (($even ?? 1)+1)%2; //counter 0>1>0
		$style = $even === 1 ? "style='background-color: var(--main-color-2);'" : '';
		if(in_array($hobby['name'], $userhobbies)) {
			$button = "<button type='submit' class='smallbtn status-remove' name='removehobby' value='{$hobby['name']}'>Remove</button>";
		} else {
			$button = "<button type='submit' class='smallbtn status-add' name='addhobby' value='{$hobby['name']}'>Add</button>";
		}
		$content .= "
			<tr class='color-bordered'>
				<td>
					<h2 style='color: var(--secondary-color'>{$hobby['name']}</h2>			
					<p style='font-size: 18px; '>{$hobby['description']}</p>
				</td>
				<td style='width: 90px;'>
						<input type='hidden' name='hobby' value='{$hobby['name']}'>
						$button
				</td>
			</tr>
		";
	}
	$content .= "
			</tbody>
		</table>
		</form>
		</content>";

}


$returnpage = 'hobbies';
require 'views/search-edit.view.php';

function getUserHobbies($conn, $userId) {
	$sql = "SELECT h.name FROM hobbies_users 
			JOIN users u ON u.id = hobbies_users.userid
			JOIN hobbies h ON h.id = hobbies_users.hobbyid
			WHERE u.id = :userid";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':userid', $userId, PDO::PARAM_INT);
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
}

function searchHobbies($conn, $search) {
	$sql = "SELECT * FROM hobbies WHERE name LIKE :search";

	$stmt = $conn->prepare($sql);
	$searchParam =    "%$search%";
	$stmt->bindParam(':search', $searchParam, PDO::PARAM_STR );
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addHobby($conn, $userId, $hobbyName) {
	$sql = "INSERT INTO hobbies_users (hobbyid, userid)
			SELECT h.id, :userid
			FROM hobbies h
			WHERE h.name = :hobby";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':userid', $userId, PDO::PARAM_INT);
	$stmt->bindParam(':hobby', $hobbyName, PDO::PARAM_STR);
	$stmt->execute();
}

function removeHobby($conn, $userId, $hobbyName) {
	$sql = "DELETE FROM hobbies_users
            WHERE userid = :userid
            AND hobbyid IN (SELECT id FROM hobbies WHERE name = :hobby)";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':userid', $userId, PDO::PARAM_INT);
	$stmt->bindParam(':hobby', $hobbyName, PDO::PARAM_STR);
	$stmt->execute();
}