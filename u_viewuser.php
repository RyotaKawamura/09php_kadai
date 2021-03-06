<?php
//1.GETでid値を取得
$id = $_GET["id"];

// 以下、検証
// echo $id;
// exit;

//2.DB接続など
session_start();
include("funcs.php");
sessChk();
$pdo = db_conn_user();

//3.SELECT * FROM table WHERE id=:id;
$sql = "SELECT * FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4.データ表示
$view="";
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlerror($stmt);
}else{
    //1データのみ抽出の場合はループで取り出す必要がない
    $row = $stmt->fetch();
}
?>


<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="selectuser.php">データ更新</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="updateuser.php">
  <div class="jumbotron">
  <fieldset>
    <legend>ユーザー情報を更新</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>ID名：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     <label>パスワード：<input type="text" name="lpw"></label><br>
     <!-- <label>パスワード：<input type="text" name="lpw" value="<?=$row["lpw"]?>"></label><br> -->
     <label>権限：
        <select name="kanri_flg" value="<?=$row["kanri_flg"]?>">
          <option value="0">一般</option>
          <option value="1">管理者</option>
        </select>
      </label>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>