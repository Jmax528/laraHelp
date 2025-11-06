<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.scss','resources/css/chat.scss', 'resources/js/app.js', 'resources/js/script.js'])
    <title>Chat Layout</title>
</head>
<body class="body">
<section class="section-one dark">
    <!-- Main Card -->
    <div class="chat-card">

        <!-- Header -->
        <div class="header">
            <h2 class="text-lg font-bold">Start of the Chat</h2>
            <div class="flex gap-3">
                <a href="/" class="home-link text-3xl">Home</a>
                <button id="darkModeBtn" class="dark-button">Dark Mode</button>
            </div>
        </div>

        <!-- Scrollable Chat Area -->
        <div id="chatArea" class="dark chat-area">
            <h1 class="text-2xl font-bold mb-2">Welcome!</h1>
            <p class="text-center mb-4">Send a message to start the chat</p>
        </div>

        <!-- Fixed Input Area -->
        <div class="chat-div">
      <textarea id="textarea"
                class="textarea dark "
                placeholder="Input text here"></textarea>
            <button id="sendBtn"
                    class="send-btn dark">Send
            </button>
        </div>
    </div>
</section>
</body>
</html>
