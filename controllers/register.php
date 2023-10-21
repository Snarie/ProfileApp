<?php
$message ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        $sql = "SELECT username FROM users where username = :username";
        $stmt= $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $message .= "Username is already in use";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $conn->prepare($sql);
            //bind variables later for cleaner code
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->execute();
            $message .= "succes";
        }
    }
}
$content = "
<p>register<br></p>
<form action='/register' method='post'>
        <label for='username'>Username:</label>
        <input type='text' name='username' id='username' required><br><br>
        <label for='password'>Password:</label>
        <input type='password' name='password' id='password' required><br><br>
        <input type='submit' value='Register'>
    </form>
    <a href='/login'>login</a>
    <p><br>$message</p>
";
require 'views/base.view.php';