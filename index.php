<?php
include 'includes/login.php';
//$info = file_get_contents("./progress/progress.md");
$fp = fopen("./progress/progress.md", "r"); //ファイルを開く
var_dump(session_id());
var_dump($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPの学習</title>
</head>

<body>
    <h1>PHPの学習</h1>
    <p><a href="photo.php">アルバム</a></p>
    <p><a href="resize.php">アルバムリサイズ</a></p>
    <p><a href="bbs.php">掲示板</a></p>
    <p><a href="members.php">メンバー一覧</a></p>
    <p><a href="logout.php">ログアウト</a></p>
    <h2>進捗状況</h2>
    <?php
    //var_dump($fp);
    //ファイルが正しく開けたとき
    if ($fp) {
        $title = fgets($fp); //ファイルから1行読み込む
        if ($title) {
            echo '<a href="progress.php">' . $title . '</a>';
        } else {
            //ファイルの中身が空だったとき
            echo '進捗ゼロです。';
        }
        fclose($fp); //ファイルを閉じる
    } else {
        //ファイルが開けなかったとき
        echo 'ファイルが開けませんでした。';
    }
    ?>
</body>

</html>