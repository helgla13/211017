<?php

$uploaddir = './Downloads/';
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
$img = './Downloads/img/';
$pdf = './Downloads/pdf/';
$doc = './Downloads/doc/';
$name = basename($_FILES['uploadfile']['name']);

if ($_FILES['uploadfile']['size']>2097152){
    echo "Не удалось загрузить файл. Размер файла должен не превышать 2мб.";
}

// Выводим информацию о загруженном файле:
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name']."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type']."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size']."</b></p>";
echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name']."</b></p>";

switch ($_FILES['uploadfile']['type']){
    case 'image/jpeg':
    case 'image/png':
    case 'image/gif':
        move_uploaded_file ($_FILES['uploadfile']['tmp_name'],$img.$name);
        echo "Файл успешно загружен";
        break;
    case "application/pdf":
        move_uploaded_file ($_FILES['uploadfile']['tmp_name'],$pdf.$name);
        echo "Файл успешно загружен";
        break;
    default:
    move_uploaded_file ($_FILES['uploadfile']['tmp_name'],$doc.$name);
    echo "Файл успешно загружен";
    break;
}

