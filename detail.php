<?php

 $id = $_GET['id'];

 require_once('funcs.php');	

 //1. DB接続します
 try {
   //ID:'root', Password: xamppは 空白 ''
   $pdo = new PDO('mysql:dbname=gs_db_class;charset=utf8;host=localhost','root','');
 } catch (PDOException $e) {
   exit('DBConnectError:'.$e->getMessage());
 }
 
 //２．データ詳細表示SQL作成
 $stmt = $pdo->prepare("SELECT * FROM kadai08_db1 WHERE id = :id; ");
 $stmt->bindValue(':id', $id, PDO::PARAM_INT);
 $status = $stmt->execute();
 
 //３．データ表示
 $view = "";
 if ($status == false) {
   //execute（SQL実行時にエラーがある場合）
   $error = $stmt->errorInfo();
   exit("ErrorQuery:" . $error[2]);
 } else {

   $result = $stmt->fetch();

 }
 ?>

 <!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カルテ入力</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Head[Start] -->
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    <!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
<div class="jumbotron">
    <fieldset>
        <legend>カルテ</legend>
        <label>お客様氏名:<input type="text" name="name" value="<?= $result['name']?>">様</label><br>
        <label>年代:
                    <select name="old">
                        <option value="">----選択してください---</option>
                        <option value="〜10代" <?= $result['old'] == '〜10代' ? 'selected' : '' ?>>〜10代</option>
                        <option value="20代" <?= $result['old'] == '20代' ? 'selected' : '' ?>>20代</option>
                        <option value="30代" <?= $result['old'] == '30代' ? 'selected' : '' ?>>30代</option>
                        <option value="40代" <?= $result['old'] == '40代' ? 'selected' : '' ?>>40代</option>
                        <option value="50代" <?= $result['old'] == '50代' ? 'selected' : '' ?>>50代</option>
                        <option value="60代" <?= $result['old'] == '60代' ? 'selected' : '' ?>>60代</option>
                        <option value="70代" <?= $result['old'] == '70代' ? 'selected' : '' ?>>70代</option>
                        <option value="80代" <?= $result['old'] == '80代' ? 'selected' : '' ?>>80代</option>
                        <option value="90代〜" <?= $result['old'] == '90代〜' ? 'selected' : '' ?>>90代〜</option>
                    </select>
                </label><br>
                <label>レッスン日時:<input name="date" type="datetime-local" value="<?= $result['date']?>"></label><br>
                <label>持病・怪我・禁忌:<br>
                    <input name="kinki" type="radio" value="該当なし" <?= $result['kinki'] == '該当なし' ? 'checked' : '' ?>>該当なし<br>
                    <input name="kinki" type="radio" value="高血圧・糖尿病" <?= $result['kinki'] == '高血圧・糖尿病' ? 'checked' : '' ?>>高血圧・糖尿病<br>
                    <input name="kinki" type="radio" value="喘息・呼吸器疾患" <?= $result['kinki'] == '喘息・呼吸器疾患' ? 'checked' : '' ?>>喘息・呼吸器疾患<br>
                    <input name="kinki" type="radio" value="うつ・精神疾患" <?= $result['kinki'] == 'うつ・精神疾患' ? 'checked' : '' ?>>うつ・精神疾患<br>
                    <input name="kinki" type="radio" value="怪我・故障歴" <?= $result['kinki'] == '怪我・故障歴' ? 'checked' : '' ?>>怪我・故障歴<br>
                    <input name="kinki" type="radio" value="頸椎注意" <?= $result['kinki'] == '頸椎注意' ? 'checked' : '' ?>>頸椎注意<br>
                    <input name="kinki" type="radio" value="妊婦" <?= $result['kinki'] == '妊婦' ? 'checked' : '' ?>>妊婦<br>
                    <input name="kinki" type="radio" value="その他注意事項あり" <?= $result['kinki'] == 'その他注意事項あり' ? 'checked' : '' ?>>その他注意事項あり(カルテ内容を確認)
                </label><br>
                <label>内容・引き継ぎ:<textarea name="chart"><?= $result['chart'] ?></textarea></label><br>

                <input type="hidden" name="id" value="<?= $result['id']?>">

        <input id="submit" type="submit" value="更新">
    </fieldset>
</div>
</form>
<!-- Main[End] -->
</body>
</html>
