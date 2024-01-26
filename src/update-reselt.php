<?php require './db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>final 商品更新結果</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update product set name=?,pason=? where id=?');
    if (empty($_POST['name'])) {
        echo '商品名を入力してください。';
    } else
    if (empty($_POST['name'])) {
        echo '著者を入力してください。';
    } else
    
    if($sql->execute([htmlspecialchars($_POST['name']), $_POST['price'], $_POST['id']])){
        echo '更新に成功しました。';
    }else{
        echo '更新に失敗しました。';
    }
?>
        <hr>
        <table>
        <tr><th>商品番号</th><th>商品名</th><th>著者</th></tr>

<?php
foreach ($pdo->query('select * from product') as $row) {
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
    </body>
</html>

