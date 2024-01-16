<?php require './db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>final商品一覧</title>
    </head>
    <body>
        <h1>商品一覧</h1>
        <hr>
        <button onclick="location.href='input.php'">商品を登録する</button>
        <table>
    <tr><th>商品番号</th><th>商品名</th><th>作者</th><th>更新</th><th>削除</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from product') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['pason'], '</td>';
        echo '<td>';
        echo '<form action="update.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['id'],'">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    </body>
</html>