<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.scss','resources/css/chat.scss', 'resources/js/echo.js', 'resources/js/app.js'])
    <title>Chat Layout</title>
</head>
<body class="body">
<x-header />
<section class="section-one dark">
    <!-- Main Card -->
    <div class="chat-card">

        <!-- Header -->
        <div class="header">
            <h2 class="text-lg font-bold text-center ml-12">Welkom bij de Chat</h2>

        </div>

        <!-- Scrollable Chat Area -->
        <div id="chatArea" class="dark chat-area no-scrollbar">
            <p class="text-center mb-4">Stuur een bericht om de chat the beginnen.</p>
        </div>

        <!-- Fixed Input Area -->
        <div class="chat-div">
      <textarea id="textarea"
                class="textarea dark no-scrollbar"
                placeholder="Jouw bericht hier."></textarea>
            <button id="sendBtn"
                    class="send-btn dark">Send
            </button>
        </div>
    </div>
</section>
</body>
</html>

