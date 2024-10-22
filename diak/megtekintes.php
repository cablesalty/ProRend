<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /');
    die();
}

$db = new PDO('sqlite:../database/users.db');

// Prepare the SQL statement
$stmt = $db->prepare("SELECT * FROM timetable WHERE id = :id");
$stmt->bindValue(':id', $_GET["id"], PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if any results were found
if (!$result) {
    echo "No records found.";
}

?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/css/megtekintes.css">
    <title>Óra megtekintése - ProRend</title>
</head>
<body>
    <header>
        <h1>
            <span style="color: #383060">Pro</span><span style="color: #6052a5">Rend</span>
        </h1>
        <nav>
            <a href="/">Vissza</a>
            <a href="/logout.php">Kijelentkezés</a>
        </nav>
    </header>

    <main>
        <?php foreach ($result as $data): ?>
            <h1 class="subject"><?php echo $data["subject"]; ?></h1>
            <h2>Terem: <span class="underline"><?php echo $data["room"]; ?></span></h2>
            <h2>Tanár: <span class="underline"><?php echo $data["teacher"] ?></span></h2>
        <?php endforeach; ?>
    </main>

    <footer>

    </footer>
</body>
</html>
