<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
require_once 'base.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));
 
if (!$link) {
die("Connection failed: " . mysqli_connect_error());
}
 
$name = strip_tags(trim($_POST['name']));
$mail = strip_tags(trim($_POST['mail']));
$sql = "INSERT INTO tablo (name, mail) VALUES ('$name', '$mail')";
if (mysqli_query($link, $sql)) {
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
mysqli_close($link);
        
?>
</body>
</html>