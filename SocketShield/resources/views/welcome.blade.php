<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SocketShield</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>SocketShield WebSocket Test</h1>
    <p id="status">Connecting...</p>
    <p id="message">Waiting for WebSocket event...</p>
</body>
</html>