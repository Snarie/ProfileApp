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
$sql = "SELECT * FROM users
		WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $pageowner, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$pageOwnerId = $result['id'];






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$gender = $_POST['gender'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$about = $_POST['about'];
	$experience = $_POST['experience'];
	$skills = $_POST['skills'];
	$sql = "INSERT INTO profiles (id, gender, firstname, lastname, email, about, experience, skills)
			VALUES (:userid, :firstname, :lastname, :email, :about, :gender, :experience, :skills)
			ON DUPLICATE KEY UPDATE 
			gender = :gender,
			firstname = :firstname,
			lastname = :lastname,
			email = :email,
			about = :about,
			experience = :experience,
			skills = :skills";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':userid', $pageOwnerId, PDO::PARAM_INT);
	$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
	$stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
	$stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':about', $about, PDO::PARAM_STR);
	$stmt->bindParam(':experience', $experience, PDO::PARAM_STR);
	$stmt->bindParam(':skills', $skills, PDO::PARAM_STR);
	$stmt->execute();
} else {
	$sql = "SELECT *
			FROM profiles
			WHERE id = :userid AND icon IS NOT NULL";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':userid', $pageOwnerId, PDO::PARAM_INT);
	$stmt->execute();
	$profileInfo = $stmt->fetch(PDO::FETCH_ASSOC);

	$gender = $profileInfo['gender'];
	$firstname = $profileInfo['firstname'];
	$lastname = $profileInfo['lastname'];
	$email = $profileInfo['email'];
	$about = $profileInfo['about'];
	$experience = $profileInfo['experience'];
	$skills = $profileInfo['skills'];
}
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
		<table class='formtable'>
			<tbody>
				<tr class='header-row'>
					<th>
						General Settings
					</th><th></th>
				</tr>
				<tr>
					<td style='width:180px; height: 40px;'>My Gender:</td>
					<td>
        				<select name='gender' id='gender'>
                        	<option value='man'".($gender==='man' ? 'selected': ' ').">Man</option>
            				<option value='woman'".($gender==='woman' ? 'selected': ' ').">Woman</option>
            				<option value='non-binary'".($gender==='non-binary' ? 'selected': ' ').">Non Binary</option>
        				</select>
					</td>
				</tr>
				<tr>
					<td style='width:180px; height: 40px;'>Firstname:</td>
					<td>
        				<input name='firstname' placeholder='firstname:' value='$firstname'>
					</td>
				</tr>
				<tr>
					<td style='width:180px; height: 40px;'>Lastname:</td>
					<td>
        				<input name='lastname' placeholder='lastname:' value='$lastname'>
					</td>
				</tr>
				<tr>
					<td style='width:180px; height: 40px;'>Email:</td>
					<td>
        				<input name='email' placeholder='email:' value='$email'>
					</td>
				</tr>
				<tr>
					<td style='width:180px; height: 200px;'>About:</td>
					<td>
        				<textarea name='about' rows='9' cols='50' placeholder='About me text...'>$about</textarea>
					</td>
				</tr>
				<tr>
					<td style='width:180px; height: 200px;'>Experience:</td>
					<td>
        				<textarea name='experience' rows='9' cols='50' placeholder='Your experience...'>$experience</textarea>
					</td>
				</tr>
				<tr>
					<td style='width:180px; height: 200px;'>Experience:</td>
					<td>
        				<textarea name='skills' rows='9' cols='50' placeholder='Your skills...'>$skills</textarea>
					</td>
				</tr>
				<tr>
					<td><button type='submit' value='Submit'>Submit</button></td>
				</tr>
			</tbody>
		</table>
		</form><br><br>
	</content>";



$returnpage = 'profile';
require 'views/edit.view.php';