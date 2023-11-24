<?php
$fp = fopen("test.txt", "w");
// var_dump($fp);
if ($fp) {
    fwrite($fp, "書き込みテスト1\n");
    fwrite($fp, "書き込みテスト2");
    fclose($fp);
    echo '書き込みました。';
} else {
    //ファイルがうまく作成できない等のエラー時、ここへ来る
}
