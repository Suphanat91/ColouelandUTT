<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .chat-container { max-width: 800px; margin: auto; padding: 20px; }
        .chat-box { background-color: #f4f4f4; border-radius: 5px; padding: 10px; margin-bottom: 20px; }
        .chat-input { width: 100%; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="chat-container">
    <h2>Chat Room</h2>
    <div id="chat-box" class="chat-box">
        <!-- Chat messages will be loaded here -->
        <span>tset</span>
    </div>
    <input type="text" id="chat-input" class="chat-input" placeholder="Type your message here...">
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    // JavaScript for handling chat functionalities
</script>

</body>
</html>
