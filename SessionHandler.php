<?php

// Create a custom session handler
// Added it from earlier project i made
// It is not in use right now
// Might be usefull if the remember_me cookie isnt enough

//$conn = new PDO(....)
//$sessionHandler = new CustomSessionHandler($db);

//session_set_save_handler($sessionHandler, true);
//session_start();

class SessionHandler implements SessionHandlerInterface {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function open($savePath, $sessionName) {
        return true;
    }

    public function close() {
        return true;
    }

    public function read($session_id) {
        $stmt = $this->pdo->prepare("SELECT data FROM sessions WHERE session_id = :session_id AND expiration > NOW()");
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        return $result ? $result : '';
    }

    public function write($session_id, $session_data) {
        $stmt = $this->pdo->prepare("REPLACE INTO sessions (session_id, user_id, data, expiration) VALUES (:session_id, :user_id, :data, :expiration)");
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $expiration = date('Y-m-d H:i:s', time() + ini_get('session.gc_maxlifetime'));
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':data', $session_data, PDO::PARAM_STR);
        $stmt->bindParam(':expiration', $expiration, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    public function destroy($session_id) {
        $stmt = $this->pdo->prepare("DELETE FROM sessions WHERE session_id = :session_id");
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    public function gc($maxlifetime) {
        $stmt = $this->pdo->prepare("DELETE FROM sessions WHERE expiration < NOW()");
        $stmt->execute();

        return true;
    }
}

