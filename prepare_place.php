<?php
// データベースに接続
$dsn = 'mysql:host=localhost;dbname=sura_php;charset=utf8';
$user = 'phpusr';
$password = 'phppass';
$name = $_GET['name'];

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $dbh->prepare("SELECT * FROM prepare_test WHERE name=?");
    // $stmt->execute([$_GET['name']]);
    $stmt->execute(array($name));

    foreach ($stmt as $row) {
        print $row['name'] . "\t";
        print $row['value'] . "\t";
    }
} catch (PDOException $e) {
    echo "エラー：" . $e->getMessage();
}
