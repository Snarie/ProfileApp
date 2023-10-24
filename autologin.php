<?php
$loginmsg = "";
session_start();
if(isset($_SESSION['user_id'])) {
    //valid session is found
	userName($_SESSION['user_id'], $conn);
    $loginmsg = "valid session";

} elseif(isset($_COOKIE['remember_me'])) {
    list($user_id, $token) = explode(':', $_COOKIE['remember_me']);

    $sql = "SELECT user_id 
            FROM remember_tokens 
            WHERE user_id = :user_id 
            AND token = :token 
            AND expiration > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':token',$token, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result){
        //valid cookie is found
        $_SESSION['user_id'] = $user_id;
		userName($_SESSION['user_id'], $conn);
        $loginmsg = "valid cookie";
    } else {
	    $sql = "DELETE FROM remember_tokens WHERE user_id = :user_id AND token = :token";
	    $stmt = $conn->prepare($sql);
	    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
	    $stmt->execute();

    }
}
function userName($user_id, $conn): void
{
	if(isset($_SESSION['username'])){
		return;
	}
	$sql = "SELECT username FROM users where id = :user_id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
	$stmt->execute();

	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['username'] = $result['username'];
}
//echo $_COOKIE['remember_me'];
//echo $loginmsg;