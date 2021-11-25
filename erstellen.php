<?php


[$username = $_POST['name'] ?? ''];
[$titel = $_POST['titel'] ?? ''];
[$text = $_POST['text'] ?? ''];

$dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$stmt = $dbConnection->prepare('INSERT INTO posts (created_by, created_at, post_title, post_text)
                                    VALUES (:username, now(), :titel, :text)');

$stmt->execute([':username' => "$username", ':titel' => "$titel", ':text' => "$text"]);

function connectToIPDatabase() {
    try {
        return new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!', [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]);
    } catch (PDOException $e) {
        die('Keine Verbindung zu Datenbabk möglich: ' . $e->getMessage());
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="erstellen.css">
</head>
<body>
    <form action="erstellen.php" method="post">
    <h1 id="header">NG's Blog</h1><br>
    <div class="container">
        <a class="directory" href="index.php">Aktuell</a>
        <a class="directory" href="erstellen.php">Erstellen</a>
        <a class="directory" href="info.php">Info</a>
    </div><br>
    <div id="container2">
        <p>Name</p>
        <input type="text" name="name" value="<?= $username ?? '' ?>">
        <p>Titel</p>
        <input type="text" name="titel" value="<?= $titel ?? ''?>">
        <p>Text</p>
        <textarea cols="50" rows="5" name="text" value="<?= $text ?? ''?>"></textarea><br><br>
        <input type="submit" value="Posten!">
    </div>
    <div id="footer">
        <p>Footer</p>
    </div>
    </form>
</body>
</html>