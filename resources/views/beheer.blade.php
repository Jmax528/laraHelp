<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studiebegeleiding - Beheren</title>
    @vite(['resources/css/app.scss', 'resources/css/beheer.scss', 'resources/js/app.js'])

</head>
<body class="bg-warm-taupe">
<!-- Header -->
<x-header />

<main>

</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white mt-12 py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="footer-title mb-4">Contact/Locatie</h3>
                <p class="normal-text">Email: info@studiebegeleiding.nl</p>
                <p class="normal-text">Locatie: Boumaboulevard 573, 9723 ZS Groningen</p>
            </div>
            <div>
                <h3 class="footer-title mb-4">Snelle links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-blue-300 normal-text">Home</a></li>
                    <li><a href="#" class="hover:text-blue-300 normal-text">Chatbox</a></li>
                    <li><a href="#" class="hover:text-blue-300 normal-text">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer-title mb-4">Openingstijden</h3>
                <p class="normal-text">Maandag - Vrijdag: 9:00 - 17:00</p>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
            <p class="normal-text">&copy; 2025 StudieBegeleiding. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>
</body>
</html>
