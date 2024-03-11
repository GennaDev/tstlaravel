<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Example</title>
</head>
<body>
<h1>Пример использования AJAX</h1>
<div id="result"></div>

@php
// Создаем массив данных
$data = array("message" => "Привет, это данные с сервера!");

// Преобразуем массив в JSON формат
$json_data = json_encode($data);

// Устанавливаем заголовок для указания типа контента
header('Content-Type: application/json');

// Выводим данные в формате JSON
echo $json_data;

@endphp

<script>
    // Функция для выполнения AJAX запроса
    function fetchData() {
        var xhr = new XMLHttpRequest();

        // Устанавливаем обработчик события изменения состояния запроса
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    // Если запрос успешен, выводим полученные данные
                    document.getElementById("result").innerHTML = xhr.responseText;
                } else {
                    // Выводим сообщение об ошибке, если запрос не удался
                    document.getElementById("result").innerHTML = "Произошла ошибка: " + xhr.status;
                }
            }
        };

        // Открываем соединение и отправляем GET запрос к серверу
        xhr.open("GET", "fetch_data.php", true);
        xhr.send();
    }

    // Вызываем функцию при загрузке страницы
    window.onload = fetchData;
</script>
</body>
</html>





