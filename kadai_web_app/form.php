<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>社員情報入力フォーム</title>
</head>
<body>
    <h1>社員情報入力フォーム</h1>
    <form action="confirm.php" method="post"> 
        <table class="table_form">
            <tr>
                <td>社員名</td>
                <td><input type="text" name="employee_name" value="<?php echo isset($_COOKIE['name']) ? $_COOKIE['name'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>年齢</td>
                <td><input type="text" name="employee_age" value="<?php echo isset($_COOKIE['age']) ? $_COOKIE['age'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>社員名</td>
                <td>
                    <select name="department">
                        <option value="開発部">開発部</option>
                        <option value="営業部">営業部</option>
                        <option value="人事部">人事部</option>
                    </select>
                </td>
            </tr>
        </table>
        <p>
            <input type="submit" value="送信">
        </p>
    </form>

</body>
</html>