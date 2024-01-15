<?php session_start(); ?>
<?php require './db-connect.php'; ?>
<?php require './header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['customer']);
$pdo = new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from customer where login=?');
$sql->execute([$_POST['login']]);
$statement=$sql->fetchAll(PDO::FETCH_ASSOC);
if(password_verify($_POST['password'],$statement[0]['password'])){
    foreach($statement as $row){
        $_SESSION['customer']=[
            'id'=>$row['id'], 'name'=>$row['name'],
            'address'=>$row['address'], 'login'=>$row['login'],
            'password'=>$row['password']];
    }
    echo 'いらっしゃいませ',$_SESSION['customer']['name'],'さん。';
}else{
    echo 'ログイン名またはパスワードが違います。';
}
?>
<?php require './footer.php'; ?>