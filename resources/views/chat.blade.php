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
<header class="bg-[#4C6A92] shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-white main-title">Het LBC</h1>
        <nav>
            <ul class="flex gap-4">
                <!-- Home link - actief (blauw) -->
                <li><a href="/" class="text-blue-300 font-medium border-b-2 border-blue-300 pb-1">Home</a></li>
                <!-- Andere links - inactief (wit) -->
                <li><a href="/chat" class="text-white hover:text-blue-300 font-medium">Chatbox</a></li>
                <li><a href="/faq" class="text-white hover:text-blue-300 font-medium">FAQ</a></li>
            </ul>
        </nav>
    </div>
</header>
<section class="section-one dark">
    <!-- Main Card -->
    <div class="chat-card">

        <!-- Header -->
        <div class="header">
            <h2 class="text-lg font-bold">Start van de Chat</h2>
            <div class="flex gap-3">
                <button id="darkModeBtn" class="dark-button">Dark mode</button>
            </div>
        </div>

        <!-- Scrollable Chat Area -->
        <div id="chatArea" class="dark chat-area">
            <h1 class="text-2xl font-bold mb-2">Welkom!</h1>
            <p class="text-center mb-4">Stuur een bericht om de chat the beginnen.</p>
        </div>

        <!-- Fixed Input Area -->
        <div class="chat-div">
      <textarea id="textarea"
                class="textarea dark "
                placeholder="Jouw bericht hier."></textarea>
            <button id="sendBtn"
                    class="send-btn dark">Send
            </button>
        </div>
    </div>
</section>
</body>
</html>

