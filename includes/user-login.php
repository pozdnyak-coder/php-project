<?php
include_once 'db.php';
$login = $_POST['login'];
$password = $_POST['pass'];
$db = db();

$query = $db->prepare("SELECT * FROM users INNER JOIN images using(user_id) WHERE user_login=?");
$query->execute([$login]);
$user = $query->fetch(PDO::FETCH_ASSOC);
if($user !== false and password_verify($password, $user['user_pass'])){
    session_start();
    $_SESSION['id'] = $user['user_id'];
    header('Location:/?route=main');
}else{
    header('Location:/?route=login');
}