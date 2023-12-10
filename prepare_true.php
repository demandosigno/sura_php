<?php
$dsn = 'mysql:host=localhost;dbname=sura_php;charset=utf8';
$user = 'phpusr';
$password = 'phppass';
try {
    $dbh = new PDO($dsn, $user, $password);
    // $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->query('SET NAMES sjis');

    $attack = "\x95' OR 1=1; truncate prepare_test; #";

    $sql = "SELECT * FROM prepare_test WHERE name=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($attack));

    foreach ($stmt as $row) {
        print $row['name'] . "\t";
        print $row['value'] . "\t";
    }
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
}
