<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studiebegeleiding - Home</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/js/script.js','resources/js/home.js'])

</head>
<body class="bg-[#AE9382]">
<!-- Header -->
<header class="bg-[#4C6A92] shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-white main-title">Het LBC</h1>
        <nav>
            <ul class="flex gap-4">
                <!-- Home link - actief (blauw) -->
                <li><a href="/" class="text-blue-300 font-medium border-b-2 border-blue-300 pb-1">Home</a></li>
                <!-- Andere links - inactief (wit) -->
                <li><a href="/chat" class="text-white hover:text-blue-300 font-medium">Chatbox</a></li>
                <li><a href="/faq" class="text-white hover:text-blue-300 font-medium">FAQ</a></li>
            </ul>
        </nav>
    </div>
</header>

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
                        <p>Soms heb je meer begeleiding en hulp of aanpassingen nodig.
                            Misschien twijfel je over je studiekeuze. Of heb je problemen met je studie of thuis.
                            Je kunt dan naar het loopbaancentrum.</p>
                        <p>Je kunt advies krijgen over je studie en het werk dat je later wilt doen.</p>
                        <p>Of je kunt praten over je problemen. Niemand komt dat te weten.
                            Je kunt ook een doorverwijzing krijgen naar bijvoorbeeld maatschappelijk werk.</p>
                    </div>
                </div>

                <!-- Highlight Box -->
                <div class="bg-white/20 backdrop-blur-sm border-l-4 border-white p-6 rounded-r-lg">
                    <h4 class="font-medium text-white mb-2 section-title">Kom gewoon langs.</h4>
                    <p class="text-white mb-2 normal-text">Of overleg eerst met je slber en ouders en maak een afspraak.</p>
                    <p class="text-white normal-text">Kijk ook eens op <a href="#" class="text-blue-200 hover:underline font-medium">Mbotoegankelijk.nl</a> om te bekijken wat voor ondersteuning mogelijk is in het mbo.</p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-8">
                <!-- Introduction Section -->
                <div>
                    <h3 class="text-white section-title mb-6">Kennismaking</h3>
                    <div class="space-y-4 text-white normal-text">
                        <p>Heb je je aangemeld? We leren je graag beter kennen. In een kennismakingsgesprek stellen we vragen.</p>
                        <p>Bijvoorbeeld: Waarom kies je deze opleiding? Wat verwacht je ervan? Ook kun jij jouw vragen aan ons stellen.</p>
                        <p>Samen kijken we of de opleiding goed bij je past. En wat je nodig hebt om de opleiding goed te doen.</p>
                    </div>
                </div>

                <!-- Support Section -->
                <div>
                    <h3 class="text-white section-title mb-6">Extra ondersteuning</h3>
                    <div class="space-y-4 text-white normal-text">
                        <p>Heb je dyslexie, psychische problemen of een beperking? Of moet je bijvoorbeeld thuis veel voor je familie zorgen?</p>
                        <p>Het is belangrijk dat je ons dit zo vroeg mogelijk laat weten. Het liefst bij de aanmelding.</p>
                        <p>Vertel het ons. We helpen je. Samen maken we een plan. Als je wilt, kunnen je ouders hierin meedenken.</p>
                        <p>Of andere mensen die belangrijk voor jou zijn.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vertical Divider Line - Gecorrigeerd -->
        <div class="hidden lg:block absolute left-1/2 top-[-32px] bottom-[-50px] w-0.5 bg-white/30 transform -translate-x-1/2"></div>
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
            <div class="border border-white/30 rounded-lg overflow-hidden">
                <button class="accordion-toggle w-full flex justify-between items-center p-4 bg-white/10 hover:bg-white/20 transition-colors duration-200" data-target="accordion-2">
                    <span class="text-left font-medium text-white normal-text">Veelgestelde vragen</span>
                    <svg class="w-5 h-5 text-white transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
                <div id="accordion-2" class="accordion-content bg-white/10 border-t border-white/30 max-h-0 opacity-0 transition-all duration-300 overflow-hidden">
                    <div class="p-4 text-white">
                        <div class="space-y-4">
                            <div>
                                <p class="mt-1 normal-text">Voorbeeld</p>
                            </div>
                            <div>
                                <p class="mt-1 normal-text">Voorbeeld</p>
                            </div>
                            <div>
                                <p class="mt-1 normal-text">Voorbeeld</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
