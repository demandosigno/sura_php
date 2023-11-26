<?php
// お名前
$name = $_POST['name'];
// 性別
$gender = $_POST['gender'];
var_dump($gender);
if ($gender == "man") {
    $gender = "男性";
} else if ($gender == "woman") {
    $gender = "女性";
} else {
    $gender = "不正な値です";
}
// 評価
$tmp_star = intval($_POST['star']);
var_dump($tmp_star);
$star = ''; // 出力用
if ($tmp_star < 1 || $tmp_star > 5) {
    $star = "不正な値です";
} else {
    for ($i = 0; $i < $tmp_star; $i++) {
        $star .= '★'; // 送信された数字の数だけ★を追加
    }
    for (; $i < 5; $i++) {
        $star .= '☆'; // ☆は「5-送信された数字」分だけ追加
    }
}
$other = $_POST['other'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート結果</title>
</head>

<body>
    <h1>アンケート結果</h1>
    <p>お名前：<?php echo $name; ?></p>
    <p>性別：<?php echo $gender; ?></p>
    <p>評価：<?php echo $star; ?></p>
    <p>ご意見：<?php echo nl2br($other, false); ?></p>
</body>

</html>