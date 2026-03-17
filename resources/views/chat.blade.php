<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.currentUserId = @json(Auth::id());
        window.chatId = @json($chat->id ?? null);
        window.users = @json($users ?? []);
        window.chatMessage = @json($messages ?? []);

        function closeChat(param) {
            const userId = param.getAttribute('data-user-id'); // now param is the button element
            const userItem = document.querySelector(`[data-chat-id="${userId}"]`);
            if (userItem) userItem.remove();
        }

        function closePopupWindow(){
            let text
            if(confirm("Weet je zeker dat je deze chat wilt verwijderen?")) {
                @if($chat)
                    window.location.href = "{{ route('chat.closed', $chat->id) }}";
                @endif

            } else {
                text = "Je chat blijft behouden."
            }
            document.getElementsByClassName("close-btn").innerHTML = text;

            alert(text);
            closeChat();
        }
    </script>
    @vite(['resources/css/app.scss','resources/css/chat.scss', 'resources/js/app.js'])
    <title>Chat Layout</title>
</head>
<body class="body dark min-h-screen flex flex-col">
<x-header/>

<section class="section-one flex-1 flex
    {{ Auth::user()->isAdmin() ? 'items-start justify-start' : 'items-center justify-center' }}">
    @if(Auth::user()->isAdmin())

        {{--    admin card--}}
        <x-card class="admin-card" id="adminCard">
            <div class="card-header flex items-center p-3 gap-3">
                <!-- aligns with admin-side -->
                <div class="w-12 flex justify-center">
                    {{--                                    possible button to hide or appear the admin panel--}}

                    <button class="admin-btn" id="adminBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                            <path  id="svgAdmin" fill-rule="evenodd"
                                  d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5"/>
                        </svg>
                    </button>
                </div>


                <!-- search area -->
                <textarea
                    id="adminSearch"
                    class="admin-search dark no-scrollbar flex-1"
                    placeholder="Zoek naar een gebruiker."
                ></textarea>
            </div>
            <div id="usersArea" class="users-area dark no-scrollbar">
                @foreach($users as $user)
                    <div class="user-list-item flex items-center justify-between" data-chat-id="{{ $user['chat']['id'] ?? '' }}">
                        <div class="notification-count"
                             data-unread-count="{{ $user['chat']['unread_count'] ?? 0 }}">
                            <h5>{{ $user['chat']['unread_count'] ?? 0 }}</h5>
                        </div>
                        <div class="user-info">
                            <div class="user-name">
                                <h5>{{ $user['anon'] == 1 ? 'Anonymous' : $user['name'] }}</h5>
                            </div>
                            @if($user['anon'] != 1)
                                <div class="email">
                                    <h6>{{ $user['email'] ?? 'Hidden' }}</h6>
                                </div>
                            @endif
                        </div>
                        <button class="close-btn" data-user-id="{{ $user->id }}" onclick="closePopupWindow()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </button>
                    </div>
                @endforeach

            </div>

        </x-card>
    @endif

    <!-- Main Card -->
    <x-card class="chat-card" id="chatCard">
        <div class="card-header">
            <h2 class="text-lg font-bold text-center w-full text-centerw-full">{{data_get ($chat, 'title', '')}}</h2>
{{--            @if(!Auth::user()->isAdmin())--}}
{{--                <div>--}}
{{--                <button class="close-btn right-3" onclick="closePopupWindow()">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">--}}
{{--                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>--}}
{{--                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
        <!-- Scrollable Chat Area -->
        @if($chat)
        <div id="chatArea" class="dark chat-area no-scrollbar" data-chat-id="{{ $chat->id }}">
            @else
                <div id="chatArea"
                     class="dark chat-area no-scrollbar">
                    @endif
            <p class="text-center mb-4" id="chatPlaceholder">Stuur een bericht om de chat the beginnen.</p>
        </div>

        <!-- Fixed Input Area -->
            @if($chat)
        <div class="chat-div card-typing">
            @if($chat)
                <form id="sentMessageForm" class="flex items-end gap-2"
                      method="post"
                      action="{{ route('chat.sendMessage', $chat->id) }}">
                    @else
                        <form id="sentMessageForm" class="flex items-end gap-2"
                              method="post"
                              action=""
                              onsubmit="return false;">
                            @endif
                @csrf
                <textarea id="textarea" class="textarea dark no-scrollbar flex-1" placeholder="Jouw bericht hier."
                          name="message">
                    {{!$chat ? 'disabled' : ''}}
                </textarea>
                <button id="sendBtn"
                        class="send-btn dark pt-3 mb-4"
                        type="submit">
                        {{!$chat ? 'disabled' : ''}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-send" viewBox="0 0 16 16">
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                    </svg>
                </button>
            </form>
            @else
                <div class="chat-div card-typing text-center p-4">
                    <p>Selecteer een chat om te beginnen.</p>
                </div>
                @endif
        </div>
        </div>
    </x-card>
</section>
<script>
    let currentUserId = @json(Auth::id());
    let chatId = @json($chat->id ?? null);
</script>
</body>
</html>
