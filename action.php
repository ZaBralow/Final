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
$dbc = mysqli_connect('localhost', 'root', '', 'base') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
    $mail = mysqli_real_escape_string($dbc, trim($_POST['mail']));
    if(!empty($name) && !empty($mail)) {
        $query = "SELECT * FROM `action` WHERE name = '$name', mail = '$mail'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 0) {
            $query ="INSERT INTO `tablo` (name, mail) VALUES ('$name', '$mail')";
            mysqli_query($dbc,$query);
            echo 'Данные отправлены';
            mysqli_close($dbc);
            exit();
        }
    }
}
?>   
</body>
</html>