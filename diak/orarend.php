<?php
session_start();

if (!isset($_SESSION['username'])) {

    // Fetch and display results
    foreach ($_SESSION as $crap) {
        echo $crap . "<br>";
    }

    die("a");
    header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Órarend - ProRend</title>
</head>
<body>

</body>
</html>
