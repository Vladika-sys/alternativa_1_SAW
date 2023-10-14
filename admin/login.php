<?php

require_once "../db/dbConnection.php";
$dbConnection = connectMeToDB();

session_start();
//varianta vai de capul ei

//if (isset($_POST['submit'])) {
//    $login = $_POST['login'];
//    $password = $_POST['password'];
//    if (isset($dbConnection)) {
//        $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
//        $result = $dbConnection->query($sql);
//        var_dump($result);
//        if ($result->num_rows > 0) {
//            $_SESSION['login'] = $login;
//            header("Location: secrete_page.php");
//        }
//    }
//}
class UserAuthentication {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function login($login, $password) {
        session_start();
        try {
            $this->validateInput($login, $password);

            $user = $this->getUserByLogin($login);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['login'] = $login;
                header("Location: secrete_page.php");
                exit();
            } else {
                throw new Exception("Autentificare eșuată. Verificați datele de autentificare.");
            }
        } catch (Exception $e) {
            $_SESSION['auth_error'] = $e->getMessage();
            header("Location: ../login_form.php");
            exit();
        }
    }

    private function validateInput($login, $password): void
    {
        if (empty($login)) {
            throw new Exception("Loginul este obligatoriu");
        }

        $loginPattern = '/^[A-Za-z0-9]+$/';
        if (!preg_match($loginPattern, $login)) {
            throw new Exception("Login-ul conține doar litere (A-Za-z) și cifre");
        }

        if(strlen($login) < 3 || strlen($login) > 20) {
            throw new Exception("Login-ul trebuie să conțină între 3 și 20 de caractere");
        }

        if (empty($password)) {
            throw new Exception("Parola este obligatorie");
        }

        if(strlen($password) < 8 || strlen($password) > 36) {
            throw new Exception("Parola trebuie să aibă cel puțin 8 caractere și maxim 36 caractere");
        }

    }

    private function getUserByLogin($login) {
        $query = $this->dbConnection->prepare("SELECT * FROM users WHERE login = ? LIMIT 1");
        $query->bind_param("s", $login);

        if ($query->execute()) {
            $result = $query->get_result();
            $user = $result->fetch_assoc();
            $query->close();
            return $user;
        } else {
            throw new Exception("Nu exista un asemenea utilizator");
        }
    }
}

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $_SESSION['login'] = $login;

    $userAuth = new UserAuthentication($dbConnection);
    $userAuth->login($login, $password);
}