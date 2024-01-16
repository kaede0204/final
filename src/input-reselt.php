<?php require './db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>final 商品追加結果</title>
</head>
<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into product(id, name, pason) values (?, ?, ?)');
    if(!preg_match('/^\d+$/',$_POST['id'])){
        echo '商品番号を整数で入力してください。';
    }else if(empty($_POST['name'])){
        echo '商品名を入力してください。';
    }else if(empty($_POST['pason'])){
        echo '作者を入力してください。';
    }else if($sql->execute([ $_POST['id'], $_POST['name'], $_POST['pason']])){
        echo '<font color="red">追加に成功しました。</font>';
    }else{
        echo '<font color="red">追加に失敗しました。</font>';
    }        
?>
    <br><hr><br>
    <table>
        <tr><th>商品番号</th><th>商品名</th><th>作者</th></tr>
<?php
    foreach($pdo->query('select * from product') as $row){
        echo '<tr>';
        echo '<td>',$row['id'], '</td>';
        echo '<td>',$row['name'], '</td>';
        echo '<td>',$row['pason'], '</td>';
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