<?php


$user = 'root';
$password = '';
$database = 'blog';

$pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="GET">
    <h1 id="header">NG's Blog</h1><br>
    <div class="container">
        <a class="directory" href="index.php">Aktuell</a>
        <a class="directory" href="erstellen.php">Erstellen</a>
        <a class="directory" href="info.php">Info</a>
    </div><br>
    <?php

    $stmt = $pdo->query('SELECT * FROM `posts`');
    foreach($stmt->fetchAll() as $datas) {
        $titel = htmlspecialchars($datas['post_title']);
        $name =  htmlspecialchars($datas['created_by']);
        $text =  htmlspecialchars($datas['post_text']);
        $time =  htmlspecialchars($datas['Date']);
        $bild = htmlspecialchars($datas['bild']);
        
        if(empty($bild)){
            echo("

            <div class='posts'>
            <h2>$titel</h2>
            <h5>$name, $time</h5>
            <p>$text</p>
            </div>
            <br>
            <hr class='line'>
                
            ");
        }else{
            echo("

            <div class='posts'>
            <h2>$titel</h2>
            <h5>$name, $time</h5>
            <p>$text</p>
            <img class='image' src='$bild'>
            </div>
            <br>
            <hr class='line'>    
            ");
        }        
}
    ?>

    <div id="footer">
        <p>ツ</p>
    </div>
    </form>
</body>
</html>

