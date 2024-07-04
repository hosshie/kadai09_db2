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
<form method="post" action="insert.php">
<div class="jumbotron">
    <fieldset>
        <legend>カルテ</legend>
        <label>お客様氏名:<input type="text" name="name">様</label><br>
        <label>年代:<select name="old" id="old">
            <option>----選択してください---</option>
            <option>〜10代</option>
            <option>20代</option>
            <option>30代</option>
            <option>40代</option>
            <option>50代</option>
            <option>60代</option>
            <option>70代</option>
            <option>80代</option>
            <option>90代〜</option>
        </select></label><br>
        <label>レッスン日時:<input name="date" id="date" type="datetime-local"></label><br>
        <label id="kinki">持病・怪我・禁忌:<br>
            <input name="kinki" type="radio" value="該当なし">該当なし<br>
            <input name="kinki" type="radio" value="高血圧・糖尿病">高血圧・糖尿病<br>
            <input name="kinki" type="radio" value="喘息・呼吸器疾患">喘息・呼吸器疾患<br>
            <input name="kinki" type="radio" value="うつ・精神疾患">うつ・精神疾患<br>
            <input name="kinki" type="radio" value="怪我・故障歴">怪我・故障歴<br>
            <input name="kinki" type="radio" value="頸椎注意">頸椎注意<br>
            <input name="kinki" type="radio" value="妊婦">妊婦<br>
            <input name="kinki" type="radio" value="その他注意事項あり">その他注意事項あり(カルテ内容を確認)</label><br>
        <label>内容・引き継ぎ:<textarea name="chart" id="chart"></textarea></label><br>
        <input id="submit" type="submit" value="登録">
    </fieldset>
</div>
</form>
<!-- Main[End] -->
</body>
</html>
