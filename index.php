<?php

//Написать скрипт для загрузки пользовательских файлов. При загрузке, в зависимости от типа файла – он на сервере
// должен помещаться в папку /doc, или /img..etc
//Должно быть ограничение на прием файлов – не более 2 мб.
//Ссылку на форму загрузки разместить на главной странице сайта.
//После добавления файлов, при заходе на главную, пользователь должен видеть галерею ранее загруженных картинок,
// и список загруженных документов (все, что не картинки).
//Код максимально писать функциями.


$uploadDir = './Downloads/'; //имя основной папки
$img = './Downloads/img'; //подпапка
$doc = './Downloads/doc'; //подпапка
$pdf = './Downloads/pdf'; //подпапка


function createFolder ($path){
    if (file_exists($path)) {
        echo 'Директория существует.<br>';
    }
    else
    {
        (mkdir($path, 0777)==false);
        echo 'Директория создана<br>';
    }
}

createFolder($uploadDir);
createFolder($img);
createFolder($doc);
createFolder($pdf);

function result($a)
{
    switch ($a){
        case './Downloads/img':
            if ($open = scandir($a)) {
                foreach ($open as $k => $v) {
                    if ($v != "." && $v != "..") {
                        echo '<img src="' . $a . '/' . $v . '" width="250px">';
                    }
                }
            }
            break;
        default:
if ($open = scandir($a)) {
    foreach ($open as $k => $v) {
        if ($v != "." && $v != "..") {
            echo '<ul><li> '.$v.' </li></ul>';
        }
    }
}
        break;
    }
}
result ($img);
result ($doc);
result($pdf);


?>
<form action="upload.php" method=post enctype=multipart/form-data>
    <h2>Выберите файл</h2>
  <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
    <input type="file" name="uploadfile">
    <input type="submit" name="send-request" value="Загрузить"></form>

