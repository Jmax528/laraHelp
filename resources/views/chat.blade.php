<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.scss','resources/css/chat.scss', 'resources/js/app.js'])
    <title>Chat Layout</title>
</head>
<body class="body dark min-h-screen flex flex-col">
<x-header />
<section class="section-one flex-1 flex items-center justify-center">
{{--    admin card--}}
    <x-card class="admin-card">
        <div class="card-header flex items-center p-3 gap-3">
            <!-- aligns with admin-side -->
            <div class="w-12 flex justify-center">
{{--                <button class="admin-btn">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">--}}
{{--                        <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
                <img src="" alt="admin" class="w-9 h-9 bg-red-600 rounded-full">
            </div>

            <!-- search area -->
            <textarea
                id="admin-search"
                class="admin-search dark no-scrollbar flex-1"
                placeholder="Zoek naar een gebruiker."
            ></textarea>
        </div>

        <div id="usersArea" class="users-area dark no-scrollbar">
{{--            <div class="admin-side"></div>--}}
                <div id="userList" class="user-list-items">
                    <img src="" alt="user" class="userImg">
                    <div id="userInfo" class="userInfo">
                        <h5 id="onderwerp" class="onderwerp">Onderwerp</h5>
                        <h6 id="userName" class="user-name">Gebruikersnaam / anoniem</h6>
                    </div>
                </div>

        </div>

    </x-card>

    <!-- Main Card -->
    <x-card class="chat-card">
        <div class="card-header">
            <h2 class="text-lg font-bold text-center">Welkom bij de Chat</h2>
        </div>

        <!-- Scrollable Chat Area -->
        <div id="chatArea" class="dark chat-area no-scrollbar" data-chat-id="{{ $chat->id }}">
            <p class="text-center mb-4" id="chatPlaceholder">Stuur een bericht om de chat the beginnen.</p>
        </div>

        <!-- Fixed Input Area -->
        <div class="chat-div card-typing">
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
    </x-card>
</section>
<script>
    let currentUserId = @json(Auth::id());
    let chatId = @json($chat->id ?? null);
</script>
</body>
</html>
