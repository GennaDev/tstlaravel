<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IT Kung-fu & Laravel</title>
</head>
<body>

<h3>Test Kung-fu</h3>

<p><a href="{{ route('page1') }}">Link to AJAX test</a></p>

<p><a href="{{ route('sse') }}">Link to SSE test</a></p>

<p><a href="{{ route('webhook') }}">Link to Webhook</a></p>

@php

echo "Test PHP echo through @php"

@endphp




</body>
</html>




