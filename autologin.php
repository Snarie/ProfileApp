<?php
$loginmsg = "";
session_start();
if(isset($_SESSION['user_id'])) {
    //valid session is found
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
        $loginmsg = "valid cookie";
    }
}