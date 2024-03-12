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
        xhr.open("GET", "{{ route('fetch-data') }}", true);
        xhr.send();
    }

    // Вызываем функцию при загрузке страницы
    window.onload = fetchData;
</script>
</body>
</html>





