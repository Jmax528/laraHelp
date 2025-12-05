<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.scss','resources/css/chat.scss', 'resources/js/app.js'])
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
        <div id="chatArea" class="dark chat-area no-scrollbar" data-chat-id="{{ $chat->id }}">
            <p class="text-center mb-4">Stuur een bericht om de chat the beginnen.</p>
        </div>

        <!-- Fixed Input Area -->
        <div class="chat-div">
            <form id="sentMessageForm" class="chat-div-form" method="post" action="{{ route('chat.create', $chat->id) }}">
                @csrf
                <textarea id="textarea"
                          class="textarea dark no-scrollbar"
                          placeholder="Jouw bericht hier."
                          name="message">
                </textarea>
                <button id="sendBtn"
                        class="send-btn dark pt-3"
                        type="submit">Send
                </button>
            </form>
        </div>
    </div>
</section>
<script>
    let currentUserId = @json(Auth::id());
    let chatId = @json($chat->id ?? null);
</script>
</body>
</html>
