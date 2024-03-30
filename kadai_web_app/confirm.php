<?php
// POSTリクエストから入力データを取得
$name = $_POST['employee_name'];
$age = $_POST['employee_age'];
$department = $_POST['department'];

// エラーメッセージ配列
$errors=[];

// 名前のバリデーション
if(empty($name)){
    $errors[]='名前を入力してください';
}
// 年齢のバリデーション
if(empty($age)){
    $errors[]='年齢を入力してください';
}elseif(!preg_match_all('/\A[0-9]+\z/',$age)){
    $errors[]='年齢を半角数字で入力してください';
}

// 入力に問題なければセッション・クッキー保存
if(empty($errors)){
    // クッキー登録
    setcookie('name', $name, time()+3600);
    setcookie('age', $age, time()+3600);
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員情報入力フォーム/入力確認画面</title>
</head>
<body>
    <h2>入力内容をご確認ください。</h2>
    <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>
    <table class="table_confirm">
        <tr>
            <td class="td_title">項目</td>
            <td class="td_title">入力内容</td>
        </tr>
        <tr>
            <td>社員名</td>
            <td><?php echo $name?></td>
        </tr>
        <tr>
            <td>年齢</td>
            <td><?php echo $age?></td>
        </tr>
        <tr>
            <td>所属部署</td>
            <td><?php echo $department?></td>
        </tr>
    </table>
    <p>
        <button id="comfirm-btn" onclick="location.href='complete.php';">確定</button>
        <button id="cancel-btn" onclick="history.back();">キャンセル</button>
    </p>
    <?php
        if(empty(!$errors)){
            foreach($errors as $error){
                echo '<font color="red">' . $error . '</font><br>';
            }

            echo '<script>document.getElementById("comfirm-btn").disabled = true;</script>';

        }
    ?>
</body>
</html>