<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studiebegeleiding - Home</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/js/script.js','resources/js/home.js'])

</head>
<body class="bg-[#AE9382] dark">
<!-- Header -->
<x-header />

<!-- Hero Section -->
<section class="bg-[#4C6A92] text-white py-16">
    <div class="container mx-auto px-4">
        <h2 class="main-title mb-4">Uitleg LBC</h2>
        <p class="hero-subtitle max-w-3xl">We helpen je met elke situatie.</p>
    </div>
</section>

<!-- Main Content -->
<main class="container mx-auto px-4 py-8">
    <!-- Split Layout Section -->
    <section class="mb-12 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-8">
                <!-- Welcome Section -->
                <div>
                    <h3 class="text-white section-title mb-6">Welkom bij het Loopbaancentrum</h3>
                    <div class="space-y-4 text-white normal-text">
                        <p>Soms heb je meer begeleiding en hulp of aanpassingen nodig. Misschien twijfel je over je studiekeuze. Of heb je problemen met je studie of thuis. Je kunt dan naar het loopbaancentrum. Je kunt advies krijgen over je studie en het werk dat je later wilt doen. Of je kunt praten over je problemen. We werken samen met mensen van het WIJ-team en eurocoaches en kunnen op deze manier makkelijk doorverwijzen naar mensen die je kunnen helpen buiten school.</p>
                    </div>
                </div>

                <!-- Highlight Box -->
                <div class="bg-white/20 backdrop-blur-sm border-l-4 border-white p-6 rounded-r-lg">
                    <h4 class="font-medium text-white mb-2 section-title">Kom gewoon langs in lokaal 4.51</h4>
                    <p class="text-white mb-2 normal-text">Of overleg eerst met je slber en ouders en maak een afspraak.</p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-8">
                <!-- Support Section -->
                <div>
                    <h3 class="text-white section-title mb-6">Extra ondersteuning</h3>
                    <div class="space-y-4 text-white normal-text">
                        <p>Heb je extra ondersteuning nodig van school? Bijvoorbeeld vanwege dyslexie, psychische problemen of een beperking? Of moet je bijvoorbeeld thuis veel voor je familie zorgen? Het is belangrijk dat je ons dit zo vroeg mogelijk laat weten. Het liefst bij de aanmelding. Vertel het ons zodat we je kunnen helpen. Samen maken we een plan. Als je wilt, kunnen je ouders hierin meedenken.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vertical Divider Line - Gecorrigeerd -->
        <div class="hidden lg:block absolute left-1/2 top-8 bottom-[-50px] w-0.5 bg-white/30 transform -translate-x-1/2"></div>
    </section>

    <!-- Accordion Section -->
    <section class="bg-white/20 backdrop-blur-sm rounded-lg shadow-md p-8">
        <h3 class="text-white section-title mb-6">Snelle toegang</h3>

        <div class="space-y-4">
            <!-- Accordion Item 1 -->
            <div class="border border-white/30 rounded-lg overflow-hidden">
                <button class="accordion-toggle w-full flex justify-between items-center p-4 bg-white/10 hover:bg-white/20 transition-colors duration-200" data-target="accordion-1">
                    <span class="text-left font-medium text-white normal-text">Een lijst met simpele regels/voorwaarden</span>
                    <svg class="w-5 h-5 text-white transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
                <div id="accordion-1" class="accordion-content bg-white/10 border-t border-white/30 max-h-0 opacity-0 transition-all duration-300 overflow-hidden">
                    <div class="p-4 text-white">
                        <ul class="list-disc list-inside space-y-2 normal-text">
                            <li>Voorbeeld</li>
                            <li>Voorbeeld</li>
                            <li>Voorbeeld</li>
                            <li>Voorbeeld</li>
                            <li>Voorbeeld</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Accordion Item 2 -->
{{--            <div class="border border-white/30 rounded-lg overflow-hidden">--}}
{{--                <button class="accordion-toggle w-full flex justify-between items-center p-4 bg-white/10 hover:bg-white/20 transition-colors duration-200" data-target="accordion-2">--}}
{{--                    <span class="text-left font-medium text-white normal-text">Veelgestelde vragen</span>--}}
{{--                    <svg class="w-5 h-5 text-white transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                <div id="accordion-2" class="accordion-content bg-white/10 border-t border-white/30 max-h-0 opacity-0 transition-all duration-300 overflow-hidden">--}}
{{--                    <div class="p-4 text-white">--}}
{{--                        <div class="space-y-4">--}}
{{--                            <div>--}}
{{--                                <p class="mt-1 normal-text">Voorbeeld</p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <p class="mt-1 normal-text">Voorbeeld</p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <p class="mt-1 normal-text">Voorbeeld</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
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
