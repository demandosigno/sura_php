<?php
include 'vending_machine-4.php';  // クラスの読み込み
$vendor = new CupnoodleVendor();
echo $vendor->buy(180) . '<br>';  // お買い上げありがとうございます
echo '製造元：' . $vendor->showMaker2() . '<br>'; // 製造元を見るメソッド
echo '製造元：' . $vendor->showMaker() . '<br>'; // 製造元を見るメソッド
echo '製造元：' . $vendor->showMaker3() . '<br>'; // 製造元を見るメソッド