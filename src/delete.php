<?php require './db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品削除 final</title>
    </head>
    <body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from product where id=?');
    if ($sql->execute([$_POST['id']])) {
        echo '削除に成功しました。';
    } else {
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
    <table>
        <tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
    foreach ($pdo->query('select * from product') as $row) {
        echo '<tr>';
        echo '<td>',$row['id'], '</td>';
        echo '<td>',$row['name'], '</td>';
        echo '<td>',$row['pason'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
</table>
        <form action="main.php" method="get">
        <button type="submit">メインへ戻る</button>
        </form>
    </body>
</html>