<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IT Kung-fu & Laravel</title>
</head>
<body>

<h3>Test Kung-fu</h3>

<p><a href="{{ route('page1') }}">Link to AJAX test</a></p>

<p><a href="{{ route('sse-page') }}">Link to SSE test</a></p>

<p><a href="{{ route('webhook') }}">Link to Webhook</a></p>

<a href="/calculate">Перейти к калькулятору API</a>
<br><br>
<a href="/rpc-example">Перейти к RPC</a>
<br>
<br>

@php

echo "Test PHP echo through @php"

@endphp




</body>
</html>




