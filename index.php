<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: /diak/orarend.php');
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/login.css">
    <title>ProRend</title>
</head>
<body>
    <main>
        <form action="login.php" method="post" autocomplete="off">
            <h1>ProRend</h1>
            <input type="text" name="username" id="username" placeholder="Felhasználónév"><br>
            <input type="password" name="password" id="password" placeholder="Jelszó"><br>
            <input type="submit" value="Belépés">
        </form>
    </main>
</body>
</html>