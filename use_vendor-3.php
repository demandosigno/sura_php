<?php
  include 'vending_machine-3.php';  // クラスの読み込み
  $vendor = new VendingMachine();
  echo $vendor->buy(180) . '<br>';  // お買い上げありがとうございます
  echo $vendor->showMaker() . '<br>'; // 製造元を見るメソッド
  echo $vendor->maker . '<br>';  // $makerはpublicなプロパティなので直接見ることができる
?>
