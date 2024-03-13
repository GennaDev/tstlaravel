<!DOCTYPE html>
<html>
<head>
    <title>Калькулятор</title>
</head>
<body>
<h1>Калькулятор</h1>
<form id="calcForm">
    <input type="text" name="a" placeholder="Введите число a"><br>
    <input type="text" name="b" placeholder="Введите число b"><br>
    <button type="button" onclick="calculate()">Сложить</button>
</form>
<div id="result"></div>

<script>
    function calculate() {
        var a = document.querySelector('input[name="a"]').value;
        var b = document.querySelector('input[name="b"]').value;
        fetch('/api/add?a=' + a + '&b=' + b)
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerText = 'Результат: ' + data.result;
            })
            .catch(error => console.error('Ошибка:', error));
    }
</script>
</body>
</html>
