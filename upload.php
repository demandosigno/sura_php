<?php
$msg = null; // アップロード状況を表すメッセージ

var_dump($_FILES);
// アップロード処理
if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
    $old_name = $_FILES['image']['tmp_name'];
    // $new_name = $_FILES['image']['name'];
    $new_name = date("YmdHis"); // ベースとなるファイル名は日付
    $new_name .= mt_rand(); // ランダムな文字列も追加
    switch (exif_imagetype($_FILES['image']['tmp_name'])) {
        case IMAGETYPE_JPEG:
            $new_name .= '.jpg';
            break;
        case IMAGETYPE_GIF:
            $new_name .= '.gif';
            break;
        case IMAGETYPE_PNG:
            $new_name .= '.png';
            break;
        default:
            header('Location: upload.php');
            exit();
    }
    // sleep(5);
    if (move_uploaded_file($old_name, 'photo/' . $new_name)) {
        $msg = 'アップロードしました。';
    } else {
        $msg = 'アップロードできませんでした。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像アプロード</title>
</head>

<body>
    <h1>画像アップロード</h1>
    <p><a href="index.php">トップページに戻る</a></p>
    <?php
    if ($msg) {
        echo '<p>' . $msg . '</p>';
    }
    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="アップロード">
    </form>
</body>

</html>