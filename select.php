<?php

require_once('funcs.php');	

//1. DB接続します

try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=gs_db_class;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai08_db1");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

    
    $view .= "<tr>";
    $view .= "<td>" . h($result['id']) . "</td>";
    $view .= "<td>" . h($result['name']) . "</td>";
    $view .= "<td>" . h($result['old']) . "</td>";
    $view .= "<td>" . h($result['date']) . "</td>";
    $view .= "<td>" . h($result['kinki']) . "</td>";
    $view .= "<td>" . h($result['chart']) . "</td>";

    $view .= "<td>";
    $view .= '<a href="detail.php?id=' . h($result['id']) . '">[編集]</a> ';
    $view .= '<a href="delete.php?id=' . h($result['id']) . '" onclick="return confirm(\'本当に削除しますか？\');">[削除]</a>';
    $view .= "</td>";

    $view .= "</tr>";


  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>データ一覧</title>
<link rel="stylesheet" href="style.css">
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">カルテ入力</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container">
  <div class="jumbotron">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>お客様氏名</th>
          <th>年代</th>
          <th>レッスン日時</th>
          <th>持病・怪我・禁忌</th>
          <th>内容・引き継ぎ</th>
          <th>更新</th>
        </tr>
      </thead>
      <tbody>
        <?= $view ?>
      </tbody>
    </table>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>
