<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/js/script.js'])
    <title>Chat Layout</title>
</head>
<body>
<section class="flex items-center justify-center min-h-screen bg-gray-100">
    <!-- Main Card -->
    <div class="w-96 h-[600px] bg-gray-200 rounded-xl shadow-lg border border-blue-500 flex flex-col overflow-hidden">

        <!-- Header -->
        <div class="bg-blue-500 text-white flex justify-between items-center p-6 flex-none">
            <h2 class="text-lg font-bold">Card Header</h2>
            <button class="bg-white text-blue-500 px-3 py-1 rounded hover:bg-gray-100">Action</button>
        </div>


        <!-- Scrollable Chat Area -->
        <div class="chatArea flex-1 overflow-y-auto p-4 space-y-3 flex flex-col overflow-hidden">
            <h1 class="text-2xl font-bold mb-2">Hello Laravel</h1>
            <p class="text-gray-700 text-center mb-4">This is a Tailwind 4 card</p>

            <!-- Chat messages -->
            <div id="chatOne" class="chat-container bg-green-300 rounded-lg w-fit p-2 left-54">
                <div id="chatBoxOne" class="chatbox flex-1 p-4 text-wrap break-words">
                    <div id="chaterOne">Hello testing</div>
                </div>
            </div>

            <div id="chatTwo" class="chat-container bg-orange-200 rounded-lg w-fit p-2 right-2">
                <div id="chatBoxTwo" class="chatbox flex-1 p-4 text-wrap break-words">
                    <div id="chaterTwo">Hello testing 2</div>
                </div>

            </div>
        </div>
        <!-- Fixed Input Area -->
        <div class="flex items-center gap-2 p-3 border-t bg-gray-100 flex-none mt-auto pb-2">
      <textarea id="textarea"
                class="border-2 border-blue-500 rounded w-full p-2 resize-none h-16"
                placeholder="Input text here"></textarea>
            <button id="sendBtn"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Send</button>
        </div>
    </div>
</section>
</body>
</html>
