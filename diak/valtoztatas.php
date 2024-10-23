<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /');
    die();
}

$db = new PDO('sqlite:../database/users.db');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $db->prepare("UPDATE timetable SET teacher = :teacher, room = :room, status = :status WHERE id = :id");
    $stmt->bindValue(':teacher', $_POST['teacher']);
    $stmt->bindValue(':room', $_POST['room']);
    $stmt->bindValue(':status', $_POST['status']);
    $stmt->bindValue(':id', (int)$_POST["id"], PDO::PARAM_INT);
    $stmt->execute();

    header('Location: megtekintes.php?id='.$_POST['id']);
} else {
    die("Helytelen kérelem.");
}