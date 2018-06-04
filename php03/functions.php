<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）


//SQL処理エラー


/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


?>
