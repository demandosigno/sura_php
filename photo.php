<?php
$images = array(); // 画像ファイルのリストを格納する配列

// 画像ファイルから画像ファイル名を読み込む
if ($handle = opendir('./photo')) {
    var_dump($handle);
    while ($entry = readdir($handle)) {
        var_dump($entry);
        // 「.」および「..」でないとき、ファイル名を配列に追加
        if ($entry != "." && $entry != "..") {
            $images[] = $entry;
        }
    }
    closedir($handle);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>写真</title>
</head>

<body>
    <h1>写真</h1>
    <p>
        <a href="index.php">トップページに戻る</a>
        <a href="upload.php">写真をアップロードする</a>
    </p>
    <?php
    var_dump($images);
    print_r($images);
    if (count($images) > 0) {
        foreach ($images as $img) {
            echo '<img src="./photo/' . $img . '">';
        }
    } else {
        echo '<p>画像はまだありません。</p>';
    }
    ?>
</body>

</html>