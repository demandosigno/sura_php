<?php
class VendingMachine
{
  protected $maker = "翔泳電気";
  // private $maker = "翔泳電気";

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
    if (rand(1, 10) == 1) {
      return "もう一個サービス！";
    } else {
      return "ハズレ";
    }
  }

  public function showMaker()
  {
    return $this->maker;
  }
}

class CupnoodleVendor extends VendingMachine
{
  private $maker2 = "翔泳エレクトロニクス";

  public function showMaker2()
  {
    return $this->maker2;
  }
  public function showMaker3()
  {
    return $this->maker;
  }
}
