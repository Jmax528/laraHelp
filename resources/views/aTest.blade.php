<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<section class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="size-96 bg-grey-200 rounded-xl shadow-lg border-blue-500 overflow-hidden">
        <!-- Top colored section -->
        <div class="bg-blue-500 text-white rounded-t-xl p-6 flex justify-between items-center">
            <h2 class="text-lg font-bold">Card Header</h2>
            <button class="bg-white text-blue-500 px-3 py-1 rounded hover:bg-gray-100">Action</button>
        </div>
        <div class="p-6 flex flex-col items-center">
            <h1 class="text-2xl font-bold mb-2">Hello Laravel</h1>
            <p class="text-gray-700 text-center mb-4">
                This is a Tailwind 4 card
            </p>
            <div class="chat-container bg-green-200 flex relative left-35 text-black rounded-[8px]">
                <div class="chatbox" >
                    <div id="chaterOne">Hello testing</div>
                </div>
            </div>
            <div class="chat-container bg-orange-200 flex relative right-35 top-15 text-black rounded-[8px]">
                <div class="chatbox" >
                    <div id="chaterOne">Hello testing</div>
                </div>
            </div>
            <textarea id="autoTextarea" placeholder="Input text here" class="border-2 border-blue-500 py-1 rounded flex relative inset-x-0 top-20 resize-none transform-origin"></textarea>
            <button class="bg-green-500 text-white px-2 py-1.5 rounded hover:bg-blue-600 relative start-40 top-11">
                send
            </button>
        </div>
    </div>
</section>

</body>
</html>


