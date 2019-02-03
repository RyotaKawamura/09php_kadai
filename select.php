<?php
//1.  DB接続します
session_start();
include("funcs.php");
sessChk();

$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
// $view='<tr><td>'."ID".'</td><td>'."書籍名".'</td><td>'."書籍URL".'</td><td>'."書籍コメント".'</td><td>'."登録日時".'</td></tr><br>';
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sqlerror($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .= '<tr><td>'.$res["id"].'</td><td>'.$res["name"].'</td><td>'.$res["bookurl"].'</td><td>'.$res["comment"].'</td><td>'.$res["indate"].'</td></tr>'; //".="はどんどん追加していくための処理
    if($_SESSION["kanri_flg"]=="1"){
      $view .= "<p>";
      $view .= '<a href="u_view.php?id='.$res["id"].'">';
      $view .= $res["indate"].":".$res["name"];
      $view .= '</a>';
      $view .= '　';
      $view .= '<a href="delete.php?id='.$res["id"].'">';
      $view .= '[削除]';
      $view .= '</a>';
      $view .= "</p>";
    }else{
      $view .= "<p>";
      $view .= '<a href="u_view.php?id='.$res["id"].'">';
      $view .= $res["indate"].":".$res["name"];
      $view .= '</a>';
      $view .= "</p>";
    }}}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
ようこそ<?php echo $_SESSION["name"];?>さん
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ブックレビュー登録へ</a>
      <?php $menu = "";
      if($_SESSION["kanri_flg"]=="1"){
        $menu .= '<a class="navbar-brand" href="indexuser.php">ユーザー登録</a>';
        $menu .= '<a class="navbar-brand" href="selectuser.php">ユーザー表示</a>';
      }
      echo $menu
      ?>
      <!-- <a class="navbar-brand" href="indexuser.php">ユーザー登録</a>
      <a class="navbar-brand" href="selectuser.php">ユーザー表示</a> -->
      <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<?php echo $_SESSION["name"];?>さんの本棚
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <table class="container jumbotron"><?=$view?></table>
</div>
<!-- Main[End] -->

</body>
</html>
