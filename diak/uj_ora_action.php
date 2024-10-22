<?php
$db = new PDO('sqlite:../database/users.db');

$stmt = $db->prepare("INSERT INTO timetable (day, class_time, subject, room, teacher) VALUES (:day, :class_time, :subject, :room, :teacher)");
$stmt->bindParam(':day', $_POST['day']);
$stmt->bindParam(':class_time', $_POST['class_time']);
$stmt->bindParam(':subject', $_POST['subject']);
$stmt->bindParam(':room', $_POST['room']);
$stmt->bindParam(':teacher', $_POST['teacher']);
$stmt->execute();
