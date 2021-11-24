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
    <h1 id="header">NG's Blog</h1><br>
    <div class="container">
        <a class="directory" href="index.php">Aktuell</a>
        <a class="directory" href="erstellen.php">Erstellen</a>
        <a class="directory" href="erstellen.php">Info</a>
    </div><br>
    <div id="container2">
        <p>Name</p>
        <input type="text" name="name" value="<?= $name ?? '' ?>">
        <p>Titel</p>
        <input type="text" name="titel" value="<?= $titel ?? ''?>">
        <p>Text</p>
        <textarea cols="50" rows="5" name="text" value="<?= $text ?? ''?>"></textarea><br><br>
        <input type="submit" value="Anmelden">
    </div>

    <div id="footer">
        <p>Footer</p>
    </div>
</body>
</html>