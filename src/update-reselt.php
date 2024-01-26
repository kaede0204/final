<?php require './db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>final 商品更新結果</title>
    </head>
    <body>
<?php
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('UPDATE product SET name=?, pason=? WHERE id=?');

        if (empty($_POST['name'])) {
            echo '商品名を入力してください。';
        } elseif (empty($_POST['price'])) {
            echo '商品価格を入力してください。';
        } else {
            if ($sql->execute([htmlspecialchars($_POST['name']), $_POST['price'], $_POST['id']])) {
                echo '更新に成功しました。';
            } else {
                echo '更新に失敗しました。';
            }
        }
?>
        <hr>
        <table>
            <tr><th>商品番号</th><th>商品名</th><th>著者</th></tr>
<?php
        foreach ($pdo->query('SELECT * FROM product') as $row) {
            echo '<tr>';
            echo '<td>', $row['id'], '</td>';
            echo '<td>', $row['name'], '</td>';
            echo '<td>', $row['pason'], '</td>';
            echo '</tr>';
            echo "\n";
        }
?>
        </table>
        <button onclick="location.href='update.php'">更新画面へ戻る</button>
<?php
    } catch(PDOException $e) {
        // エラーメッセージを表示
        echo "エラー：" . $e->getMessage();
    }
?>
    </body>
</html>