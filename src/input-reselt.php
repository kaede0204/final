<?php require './db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>final 商品追加結果</title>
</head>
<body>
<?php
try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $pdo->prepare('INSERT INTO product(name, pason) VALUES (?, ?)');

    if (empty($_POST['name'])) {
        echo '商品名を入力してください。';
    } elseif (empty($_POST['pason'])) {
        echo '著者を入力してください。';
    } else {
        if ($sql->execute([$_POST['name'], $_POST['pason']])) {
            echo '<font color="red">追加に成功しました。</font>';
        } else {
            echo '<font color="red">追加に失敗しました。</font>';
        }
    }
} catch(PDOException $e) {
    // エラーメッセージを表示
    echo "エラー：" . $e->getMessage();
}
?>
    <br><hr><br>
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
    <form action="input.php" method="post">
        <button type="submit">追加画面へ戻る</button>
    </form>
</body>
</html>