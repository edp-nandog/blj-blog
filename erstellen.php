<?php
$errors = [];
[$username = $_POST['name']?? ''];
[$titel = $_POST['titel']?? ''];
[$text = $_POST['text']?? ''];
[$bild = $_POST['bild']?? ''];

$dbConnection = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$stmt = $dbConnection->prepare('INSERT INTO posts (created_by, Date, post_title, post_text, bild)
                                    VALUES (:username, Now(), :titel, :text, :bild)');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($username);
    $titel = trim($titel);
    $text = trim($text);
                                
    if ($username === '') {
        $errors[] = 'Bitte geben Sie einen Namen ein.';
    }
    if ($titel === '') {
    $errors[] = 'Bitte geben Sie einen Titel ein.';
    }
    if ($text === '') {
    $errors[] = 'Bitte geben Sie einen Text ein.';
    }

$stmt->execute([':username' => "$username", ':titel' => "$titel", ':text' => "$text", ':bild' => "$bild"]);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NG's Blog</title>
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
    <?php if (count($errors) > 0) { ?>
            <div class="error-box">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    <div id="container2">
        <p>Name</p>
        <input type="text" name="name" value="<?= $username ?? '' ?>">
        <p>Titel</p>
        <input type="text" name="titel" value="<?= $titel ?? ''?>">
        <p>Text</p>
        <textarea cols="50" rows="5" name="text" value="<?= $text ?? ''?>"></textarea>
        <p>Bild (URL)</p>
        <input type="url" name="bild" value="<?= $bild ?? ''?>">
        <br>
        <br>
        <input type="submit" name="button" value="Posten">
        <br>
        <br>
        <br>
    </div>
    </form>
    <div id="footer">
        <p>ツ</p>
    </div>
    
</body>
</html>


