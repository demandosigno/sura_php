<?php
$fp = fopen("./progress/progress.md", "r"); //ファイルを開く
//$line = array(); //ファイル内容を1行1要素に格納する配列
$line2 = file("./progress/progress.md");
//var_dump($line2);
//ファイルが正しく開けたとき
// if ($fp) {
//     while (!feof($fp)) {
//         $line[] = fgets($fp);
//     }
//     fclose($fp);
// }
//var_dump($line);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>進捗状況</title>
</head>

<body>
    <h1>PHPの学習</h1>
    <h2>進捗状況</h2>
    <?php
    //var_dump(count($line));
    if (count($line2) > 0) {
        /* for ($i = 0; $i < count($line); $i++) {
            if ($i == 0) { //はじめの行はタイトル
                echo '<h3>' . $line[0] . '</h3>';
            } else {
                echo $line[$i] . '<br>';
            }
        }*/
        foreach ($line2 as $i => $text) {
            if ($i == 0) {
                echo '<h3>' . $text . '</h3>';
            } else {
                echo $text . '<br>';
            }
        }
    } else {
        //ファイルの中身が空だったとき
        echo '進捗ゼロです。';
    }
    ?>
</body>

</html>