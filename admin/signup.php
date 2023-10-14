<?php

require_once "../db/dbConnection.php";
$dbConnection = connectMeToDB();
//varianta vai de capul ei
//if (isset($_POST['submit'])) {
//    $login = $_POST['login'];
//    $password = $_POST['password'];
//
//    // Assuming $dbConnection is a valid MySQLi connection object
//    $sql = "INSERT INTO users (login, password) VALUES ('$login', '$password')";
//    if ($dbConnection) {
//        $result = mysqli_query($dbConnection, $sql);
//        if ($result) {
//            header("Location: ../login_form.php");
//        } else {
//            echo "<h2>Inregistrare nereusita</h2>";
//            echo "Error: " . mysqli_error($dbConnection); // Output the MySQL error message for debugging
//        }
//    }
//}
session_start();
class UserRegistration {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function registerUser($login, $password) {
        try {
            $this->validateLogin($login);
            $this->validatePassword($password);

            if ($this->isLoginUnique($login)) {
                $userEnteredPassword = password_hash($password, PASSWORD_DEFAULT);
                if ($this->insertUserIntoDatabase($login, $userEnteredPassword)) {
                    header("Location: ../login_form.php");
                    exit();
                } else {
                    throw new Exception("Probleme la înregistrare");
                }
            } else {
                throw new Exception("Există utilizator cu acest login");
            }
        } catch (Exception $e) {
            $_SESSION['signup_error'] = $e->getMessage();
            header("Location: ../signup_form.php");
            exit();
        }
    }

    private function validateLogin($login): void
    {
        if (empty($login)) {
            throw new Exception("Loginul este obligatoriu");
        } elseif (!preg_match('/^[A-Za-z0-9]+$/', $login)) {
            throw new Exception("Login-ul conține doar litere (A-Za-z) și cifre");
        }
    }

    private function validatePassword($password): void
    {
        if (empty($password)) {
            throw new Exception("Parola este obligatorie");
        } elseif (strlen($password) < 8 || strlen($password) > 36) {
            throw new Exception("Parola trebuie să aibă cel puțin 8 caractere și maxim 36 caractere");
        }
    }

    private function isLoginUnique($login): bool
    {
        $stmt = $this->dbConnection->prepare("SELECT * FROM users WHERE login = ? LIMIT 1");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows === 0;
    }

    private function insertUserIntoDatabase($login, $userEnteredPassword) {
        $query = $this->dbConnection->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
        $query->bind_param("ss", $login, $userEnteredPassword);
        return $query->execute();
    }
}

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $_SESSION['login'] = $login;

    $createdUser = new UserRegistration($dbConnection);
    $createdUser->registerUser($login, $password);
}



