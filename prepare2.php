<?php
// データベースに接続
$dsn = 'mysql:host=localhost;dbname=sura_php;charset=utf8';
$user = 'phpusr';
$password = 'phppass';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $dbh->prepare("INSERT INTO prepare_test (name, value) VALUES (?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $value);

    // 行を挿入します
    $name = 'three';
    $value = 3;
    $stmt->execute();

    // パラメータを変更し、別の行を挿入します
    $name = 'four';
    $value = 4;
    $stmt->execute();
} catch (PDOException $e) {
    echo "エラー：" . $e->getMessage();
}
exit();
