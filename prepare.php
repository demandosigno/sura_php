<?php
// データベースに接続
$dsn = 'mysql:host=localhost;dbname=sura_php;charset=utf8';
$user = 'phpusr';
$password = 'phppass';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $dbh->prepare("INSERT INTO prepare_test (name, value) VALUES (:name, :value)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':value', $value);

    // 行を挿入します
    $name = 'one';
    $value = 1;
    $stmt->execute();

    // パラメータを変更し、別の行を挿入します
    $name = 'two';
    $value = 2;
    $stmt->execute();
} catch (PDOException $e) {
    echo "エラー：" . $e->getMessage();
}
exit();
