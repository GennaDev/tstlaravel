<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server-Sent Events Example</title>
</head>
<body>
<h1>Пример использования Server-Sent Events (SSE)</h1>
<div id="result"></div>

<script>
    // Создаем объект EventSource для установки соединения
    var eventSource = new EventSource('{{ route("sse") }}');

    // Обработчик события message
    eventSource.onmessage = function(event) {
        document.getElementById('result').innerHTML += event.data + '<br>';
    };

    // Обработчик события error
    eventSource.onerror = function(event) {
        console.log('Произошла ошибка');
        eventSource.close();
    };
</script>
</body>
</html>
