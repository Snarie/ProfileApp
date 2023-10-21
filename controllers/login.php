<?php
$message ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        //bind param_str to expect string type
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $hashed_password = $row['password'];
            if(password_verify($password, $hashed_password)) {
                $message .= "Login succesfull";
                $user_id = $row['id'];

                session_start();
                $_SESSION['user_id'] = $user_id;

                if(isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                    $token = bin2hex(random_bytes(32)); //secure token
                    $expiration = strtotime('+30 days'); //expire 30 days

                    $sql = "INSERT INTO remember_tokens (user_id, token, expiration) VALUES (:user_id, :token, :expiration)";
                    $stmt = $conn->prepare($sql);
                    $date = date('Y-m-d H:i:s', $expiration);
                    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
                    $stmt->bindParam(':expiration', $date, PDO::PARAM_STR);
                    $stmt->execute();

                    //set the remember_me cookie
                    setcookie('remember_me', $user_id . ':' . $token, $expiration, '/');

                }
            } else {
                $message .= "Login failed. Check your username and password.";
            }

        } else {
            $message .= "User not found";
        }

    }
}
$content = "
<p>login<br></p>
<form action='/login' method='post'>
        <label for='username'>Username:</label>
        <input type='text' name='username' id='username' required><br><br>
        <label for='password'>Password:</label>
        <input type='password' name='password' id='password' required><br><br>
        <input type='submit' value='Login'>
        <label for='remember_me'>Remember Me:</label>
        <input type='checkbox' name='remember_me' id='remember_me'>

    </form>
    <a href='/register'>register</a>
    <p><br>$message</p>
";
require 'views/base.view.php';