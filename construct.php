<?php
  class Sample
  {
    public function __construct($name = "Sample"){
      echo "コンストラクタ：" . $name . "<br>";
    }

    public function __destruct(){
      echo "デストラクタ";
    }
  }

  $sample = new Sample();
  unset($sample);
?>
