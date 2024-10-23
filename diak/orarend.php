<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: /');
    die();
}

function dayToInt($day)
{
    if ($day == "hétfő") {
        return 1;
    } elseif ($day == "kedd") {
        return 2;
    } elseif ($day == "szerda") {
        return 3;
    } elseif ($day == "csütörtök") {
        return 4;
    } elseif ($day == "péntek") {
        return 5;
    } else {
        return 0;
    }
}

$db = new PDO('sqlite:../database/users.db');

$stmt = $db->prepare("SELECT * FROM timetable ORDER BY class_time");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_OBJ);

// Na jó ez a rész azért chatgpt volt...
$groupedByClassTime = [];

foreach ($rows as $row) {
    $groupedByClassTime[$row->class_time][dayToInt($row->day)][] = $row;
}
// ----
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/css/orarend.css">
    <title>Órarend - ProRend</title>
</head>
<body>
    <header>
        <h1>
            <span style="color: #383060">Pro</span><span style="color: #6052a5">Rend</span>
        </h1>
        <nav>
            <a href="/logout.php">Kijelentkezés</a>
        </nav>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Óra</th>
                    <th>Hétfő</th>
                    <th>Kedd</th>
                    <th>Szerda</th>
                    <th>Csütörtök</th>
                    <th>Péntek</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Max 7 óránk van
                for ($class_time = 0; $class_time <= 7; $class_time++) {
                    echo "<tr>";
                    echo "<th>{$class_time}.</th>";

                    // és 5 nap hétfőtő péntekig
                    for ($day = 1; $day <= 5; $day++) {

                        if (isset($groupedByClassTime[$class_time][$day])) {
                            foreach ($groupedByClassTime[$class_time][$day] as $item) {

                                if ($item->status == "cancelled") {
                                    echo "<td id='$item->id' class='cancelled'>";
                                    echo "<a href='megtekintes.php?id=" . $item->id . "'>" . "<strong>ELMARAD</strong> " . $item->subject . "</a><br>";
                                    echo "</td>";
                                } else {
                                    echo "<td id='$item->id'>";
                                    echo "<a href='megtekintes.php?id=" . $item->id . "'>" . $item->subject . "</a><br>";
                                    echo "</td>";
                                }



                            }
                        } else {
                            echo "<td>[nincs óra]</td>";
                        }
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>

        </table>
        <br>
        <br>
        <div class="btn-container">
        </div>
    </main>
    <footer>
        <h1>ProRend</h1>
        <p>a cablesalty production.</p>
        <br>
        <a href="https://github.com/cablesalty/ProRend/blob/main/LICENSE" target="_blank">License</a> |
        <a href="https://github.com/cablesalty/ProRend" target="_blank">Project Repository</a>
    </footer>
</body>
</html>
