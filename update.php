<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["book_name"]) || $_POST["book_name"]=="" ||
  !isset($_POST["book_url"]) || $_POST["book_url"]=="" ||
  !isset($_POST["comment"]) || $_POST["comment"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$id     = $_POST["id"];
$book_name   = $_POST["book_name"];
$book_url  = $_POST["book_url"];
$comment = $_POST["comment"];

//2. DB接続します(エラー処理追加)
include("functions.php");
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET book_name=:a1, book_url=:a2, comment=:a3 WHERE id=:id");
$stmt->bindValue(':a1', $book_name);
$stmt->bindValue(':a2', $book_url);
$stmt->bindValue(':a3', $comment);
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: select.php");
  exit;
}
?>
