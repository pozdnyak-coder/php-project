<?php
    include_once 'db.php';
    $login = $_POST['login'];
    $name = $_POST['name'];
    $password = password_hash($_POST['pass'], PASSWORD_ARGON2ID);
    $image = $_FILES['image'];
    $image_hash = md5(time());
    $image_size = rand(1, 100000000);
    
    $image_extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $image_name = $image['name'] !== '' ? "$login-$image_size-$image_hash.$image_extension" : 'default.jpg';
    $image_path = "img/users/$image_name";
    
$db = db();
$query = $db->prepare("INSERT INTO users (user_login, user_name, user_pass) VALUE (?,?,?)");
$result = $query->execute([$login, $name, $password]);

if($result){
    $user_id = $db->lastInsertId();
    $img_query = $db->prepare("INSERT INTO images(user_id, img_path, img_main) VALUE (?,?,?)");
    $img_result = $img_query->execute([$user_id, $image_path, 1]);
    if($image['name'] !== ''){
        move_uploaded_file($image['tmp_name'], "../$image_path");
    };
};

header('Location: /?route=login');