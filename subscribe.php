<?php


require_once "./db/dbConnection.php";

session_start();

$dbConnection = connectMeToDB();

class SubscribeNewUser {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function subscribeUser($email): void
    {
        try {
            $this->validateEmail($email);

            if ($this->isEmailUnique($email) && $this->insertEmailIntoDatabase($email)) {
                $message = "Înregistrare cu succes.";
            } else {
                $message = "Sunteti deja abonat";
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        $_SESSION["message"] = $message;
        header("Location: index.php");
    }

    private function validateEmail($email):void {
        if (empty($email)) {
            throw new Exception("Emailul este obligatoriu");
        }

        $emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
        if (!preg_match($emailPattern, $email)) {
            throw new Exception("Emailul nu corespunde sablonului");
        }
    }

    private function isEmailUnique($email):bool {
        $sql = "SELECT * FROM emails WHERE email = ?";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows === 0;
    }

    private function insertEmailIntoDatabase($email) {
        $date = date("Y-m-d");
        $sql = "INSERT INTO emails (email, data) VALUES (?, ?)";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bind_param("ss", $email, $date);
        return $stmt->execute();
    }
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $subscribeNewUser = new SubscribeNewUser($dbConnection);
    $subscribeNewUser->subscribeUser($email);
}