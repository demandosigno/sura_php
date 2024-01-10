<?php
include 'includes/login.php';
$images = array(); // 画像ファイルのリストを格納する配列
$num = 5; // 1ページに表示する画像の枚数

// 画像ファイルから画像ファイル名を読み込む
if ($handle = opendir('./photo')) {
    var_dump($handle);
    while ($entry = readdir($handle)) {
        var_dump($entry);
        // 「.」および「..」でないとき、ファイル名を配列に追加
        if ($entry != "." && $entry != ".." && strpos($entry, 'thumbs_') !== false) {
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
    // var_dump($images);
    // print_r($images);
    if (count($images) > 0) {
        // 指定枚数ごとに画像ファイル名を分割
        $images = array_chunk($images, $num);
        print_r($images);
        // ページ数指定、基本は0ページ目を指す
        $page = 0;
        // GETでページ数が指定されていた場合
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = intval($_GET['page']) - 1;
            if (!isset($images[$page])) {
                $page = 0;
            }
        }

        // 画像の表示
        foreach ($images[$page] as $img) {
            echo '<a href="./photo/' . str_replace('thumbs_', '', $img) . '"><img src="./photo/' . $img . '" /></a>';
        }

        // ページ数リンク
        print_r(count($images));
        print_r(count($images, COUNT_RECURSIVE));
        echo '<p>';
        for ($i = 1; $i <= count($images); $i++) {
            echo '<a href="photo.php?page=' . $i . '">' . $i . '</a>&nbsp;';
        }
        echo '</p>';
    } else {
        echo '<p>画像はまだありません。</p>';
    }
    ?>
</body>

</html>