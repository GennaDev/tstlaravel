<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Пример RPC</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<h1>Пример RPC</h1>
<button onclick="callRPC()">Вызвать удаленную процедуру</button>
<div id="result"></div>

<script>
    function callRPC() {
        var csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
        console.log('CSRF token element:', csrfTokenElement);

        if (csrfTokenElement) {
            var csrfToken = csrfTokenElement.getAttribute('content');
            console.log('CSRF token:', csrfToken);

            fetch('/rpc', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ method: 'exampleRpcMethod', params: { /* параметры метода */ } })
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerText = 'Результат RPC: ' + JSON.stringify(data);
                })
                .catch(error => console.error('Ошибка:', error));
        } else {
            console.error('CSRF token element not found');
        }
    }
</script>
</body>
</html>
