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
    <div class="size-48 bg-white rounded-xl shadow-lg border-4 border-blue-500 p-6 flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold mb-2">Hello Laravel</h1>
        <p class="text-gray-700 text-center">
            This is a Tailwind 4 card using <span class="font-mono">size-48</span>!
        </p>
        <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Click Me
        </button>
    </div>
</section>


</body>
</html>
