<?php
$name = explode('/', $_SERVER['PATH_INFO'])[2];

$sql = "select h.name, u.username
        from hobbies_users hu   
        join users u on u.id = hu.userid
        join hobbies h on h.id = hu.hobbyid
        where u.username = '$name';
";


$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$content = '';
foreach($results as $result) {
    $content .= $result['name']."<br>";
}
//$content .= $name;
$content .= '
    </div>
</article>';

$links = "";
if(isset($_SESSION['username'])) {
	if($name === $_SESSION['username']) {
		$links = "
	<ul class='navbar menu-right'>
	<li class='nav link'>
	
		<a href='/edit/profile'><i class='material-symbols-outlined'>edit_square</i>Edit profile</a>
	</li>
	</ul>	
	";
	}
}
//require 'views/base.view.php';
require 'views/profile.view.php';