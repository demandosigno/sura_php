<?php
include 'includes/login.php';
$msg = null;  // アップロード状況を表すメッセージ

$new_width = 150; // サムネイルの幅

// アップロード処理
if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $old_name = $_FILES['image']['tmp_name'];
    // 元画像の縦横サイズを取得
    list($width, $height) = getimagesize($_FILES['image']['tmp_name']);

    // 画像のサイズ比率を計算
    $rate = $new_width / $width; // 比率
    $new_height = $rate * $height; // サムネイルの高さ

    // 計算したサイズでキャンバスを作成する
    $canvas = imagecreatetruecolor($new_width, $new_height);

    // 画像ファイル名の上書き対策
    $new_name = date("YmdHis"); // ベースとなるファイル名は日付
    $new_name .= mt_rand();  // ランダムな数字も追加

    // アップロードした画像の拡張子によって新ファイル名と画像の読み込み方を変える
    switch (exif_imagetype($_FILES['image']['tmp_name'])) {
            // JPEG
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($canvas, 'photo/thumbs_' . $new_name . '.jpg');
            $new_name .= '.jpg';
            break;

            // GIF
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($_FILES['image']['tmp_name']);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagegif($canvas, 'photo/thumbs_' . $new_name . '.gif');
            $new_name .= '.gif';
            break;

            // PNG
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($_FILES['image']['tmp_name']);
            imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagepng($canvas, 'photo/thumbs_' . $new_name . '.png');
            $new_name .= '.png';
            break;

            // 画像以外のファイルのとき
        default:
            header('Location: resize.php');
            exit();
    }
    imagedestroy($image);
    imagedestroy($canvas);
    if (move_uploaded_file($old_name, 'photo/' . $new_name)) {
        $msg = 'アップロードしました。';
    } else {
        $msg = 'アップロードできませんでした。';
    }
}
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>交流サイト：画像アップロード</title>
</head>

<body>
    <h1>交流サイト：画像アップロード</h1>
    <p><a href="index.php">トップページに戻る</a></p>
    <p><a href="photo.php">アルバム</a></p>
    <?php
    if ($msg) {
        echo '<p>' . $msg . '</p>';
    }
    ?>
    <form action="resize.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="アップロード">
    </form>
</body>

</html>