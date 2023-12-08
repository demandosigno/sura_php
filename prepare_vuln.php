<?php
// データベースに接続
$dsn = 'mysql:host=localhost;dbname=sura_php;charset=utf8';
$user = 'phpusr';
$password = 'phppass';

try {
    $dbh = new PDO($dsn, $user, $password);
    // $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // $stmt = $dbh->prepare("INSERT INTO prepare_test (name, value) VALUES ($name, $value)");
    $name = $_GET['name'];

    $sql = "SELECT * FROM prepare_test WHERE name='$name'";
    foreach ($dbh->query($sql) as $row) {
        print $row['name'] . "\t";
        print $row['value'] . "\t";
    }
} catch (PDOException $e) {
    echo "エラー：" . $e->getMessage();
}
