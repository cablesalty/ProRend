<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: /diak/orarend.php");
    die();
}

$db = new PDO('sqlite:./database/users.db');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];

            header('Location: /diak/orarend.php');
            die();
        } else {
            die("Helytelen felhasználónév vagy jelszó.");
        }
    } else {
        die("Hiányzó adatok!");
    }
} else {
    die("Helytelen kérelem!");
}