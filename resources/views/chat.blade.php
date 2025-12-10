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
            <p class="text-center mb-4" id="chatPlaceholder">Stuur een bericht om de chat the beginnen.</p>
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
                        type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                    </svg>
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
