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
            <form id="sentMessageForm" method="post" action="{{ route('chat.create') }}">
                @csrf
                <textarea id="textarea"
                    class="textarea dark no-scrollbar"
                    placeholder="Jouw bericht hier."
                          name="message"></textarea>
                <button id="sendBtn"
                        class="send-btn dark"
                        type="submit">Send
                </button>
            </form>
        </div>
    </div>
</section>
</body>

<script>
    document.getElementById('sentMessageForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission
        const formData = new FormData(this);
        console.log("Making a request");
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(response => response.json())
            .then(data => console.log('Success:', data))
            .catch(error => console.error('Error:', error));

    });
</script>
</html>

