<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/js/script.js'])
    <title>Document</title>
</head>
<body>
<section class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="size-96 min-h-[600px] bg-grey-200 rounded-xl shadow-lg border-blue-500 overflow-hidden">
        <!-- Top colored section -->
        <div class="bg-blue-500 text-white flex justify-between items-center p-10">
            <h2 class="text-lg font-bold">Card Header</h2>
            <button class="bg-white text-blue-500 px-3 py-1 rounded hover:bg-gray-100">Action</button>
        </div>
        <div class="chatArea p-6 flex flex-col h-full justify-start space-y-3">
            <h1 class="text-2xl font-bold mb-2">Hello Laravel</h1>
            <p class="text-gray-700 text-center mb-4">
                This is a Tailwind 4 card
            </p>
{{--            it gets pushed up--}}

{{--            chat 1 and 2, the messages that are send and displayed--}}
            <div id="chatOne" class="chat-container bg-green-300 p-10px flex-col relative left-35 text-black rounded-[8px]">
                <div id="chatBoxOne" class="chatbox flex-1 p-4" >
                    <div id="chaterOne">Hello testing</div>
                </div>
            </div>
            <div id="chatTwo" class="botMessage received chat-container bg-orange-200 flex-col relative right-35 top-15 text-black rounded-[8px]">
                <div id="chatBoxTwo" class="chatbox flex-1 p-4" >
                    <div id="chaterTwo" class="text-center">Hello testing 2</div>
                </div>
            </div>

            <div class="flex flex-col h-[600px]">
                <div class="flex-1 overflow-y-auto">
                </div>
            <div class="flex items-center gap-2 p-3 py-16 self-center border-t pt-3">
            <textarea class="border-2 border-blue-500 py-1 rounded flex flex-col resize-none"
                      id="textarea" placeholder="Input text here"></textarea>
            <button id="sendBtn"
                    class="send bg-green-500 text-white px-6 py-1.5 rounded hover:bg-blue-600 ml-12">send</button>
            </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>



