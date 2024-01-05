<?php
include 'includes/login.php';
// データの受け取り
$id = intval($_POST['id']);
$pass = $_POST['pass'];
print_r($id);
print_r($pass);

// 必須項目チェック
if ($id == '' || $pass == '') {
    header('Location: bbs.php');
    exit();
}

// データベースに接続
$dsn = 'mysql:host=localhost;dbname=sura_php;charset=utf8';
$user = 'phpusr';
$password = 'phppass';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // プリペアドステートメントを作成
    $stmt = $db->prepare(
        "DELETE FROM bbs WHERE id=:id AND pass=:pass"
    );
    // パラメータを割り当て
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_INT);
    // クエリの実行
    $stmt->execute();
} catch (PDOException $e) {
    echo "エラー：" . $e->getMessage();
}
header("Location: bbs.php");
exit();
