<?php
  class VendingMachine
  {

    public function buy($money){
      $message = '';
      if ($money >= 150){
        $message .= "お買い上げありがとうございます";
      } else {
        $message .= "購入金額が不足しています";
      }
      return $message;
    }

  }
?>
