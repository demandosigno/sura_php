<?php
class VendingMachine
{

  public function buy($money)
  {
    $message = '';
    if ($money >= 150) {
      $message .= "お買い上げありがとうございます<br>";
      $message .= $this->lucky();
    } else {
      $message .= "購入金額が不足しています";
    }
    return $message;
  }

  private function lucky()
  {
    if (rand(1, 5) == 1) {
      return "もう一本サービス！";
    } else {
      return "ハズレ";
    }
  }
}
