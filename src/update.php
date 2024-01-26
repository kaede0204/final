<?php require './db-connect.php'; ?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>final 商品更新</title>
	</head>
	<body>
		<div class="th0">商品番号</div>
		<div class="th1">商品名</div>
		<div class="th1">商品価格</div>
<?php
    $pdo=new PDO($connect, USER, PASS);

	foreach ($pdo->query('select * from product') as $row) {
		echo '<form action="update-reselt.php" method="post">';
		echo '<input type="hidden" name="id" value="', $row['id'], '">';
		echo '<div class="td0">', $row['id'],'</div>';
		echo '<div class="td1">';
		echo '<input type="text" name="name" value="', $row['name'], '">';
		echo '</div> ';
		echo '<div class="td1">';
		echo '<input type="text" name="price" value="', $row['pason'], '">';
		echo '</div> ';
		echo '<div class="td2"><input type="submit" value="更新"></div>';
		echo '</form>';
		echo "\n";
	}
?>

    </body>
</html>
