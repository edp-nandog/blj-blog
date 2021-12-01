<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ng's Blog</title>
    <link rel="stylesheet" href="info.css">
</head>
<body>
    <h1 id="header">NG's Blog ツ</h1><br>
    <div class="container">
        <a class="directory" href="index.php">Aktuell</a>
        <a class="directory" href="erstellen.php">Erstellen</a>
        <a class="directory" href="info.php">Info</a>
    </div>
    <br>
    <br>
    <div id="infotext">
        <p>Dieser Blog wurde von Nando Gmünder 2021 im Basislehrjahr in Adligenswil gemacht.</p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p>Andere Blogs</p>
        <br>
        <?php

$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

    $stmt = $pdo->query('SELECT description, url from urls order by description asc');
    foreach ($stmt->fetchAll() as $x){
        $name = $x['description'];
        $url =$x['url'];
        echo "<a href='$url'>$name</a>";
        echo "&nbsp&nbsp&nbsp";
    }
    ?>
    <br>
    </div>
</body>
</html>