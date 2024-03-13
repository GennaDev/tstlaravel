<!DOCTYPE html>
<html>
<head>
    <title>SSE Example</title>
</head>
<body>
<h1>SSE Example</h1>
<div id="sse-container"></div>

<script>
    // Create a new EventSource to listen for SSE
    var eventSource = new EventSource('/sse');

    // Add an event listener to handle incoming messages
    eventSource.onmessage = function(event) {
        var data = JSON.parse(event.data);
        document.getElementById('sse-container').innerHTML += '<p>' + data.time + '</p>';
    };
</script>
</body>
</html>
