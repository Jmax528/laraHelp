<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studiebegeleiding - Over Ons</title>
    @vite(['resources/css/app.scss', 'resources/css/about.scss', 'resources/js/app.js'])

</head>
<body class="bg-warm-taupe">
<!-- Header -->
<x-header />

<main>
    <div class="about-container">
        <div class="header-container">
            <a href="#jaap" class="header-part">
                <img src="image/JaapVanGerrevink.jpg" alt="Jaap van Gerrevink">
                <p>Jaap van Gerrevink</p>
            </a>
            <a href="#maaike" class="header-part">
                <img src="image/MaaikeVeening.jpg" alt="Maaike Veening">
                <p>Maaike Veening</p>
            </a>
            <a href="#henrike" class="header-part">
                <img src="image/HenrikeVanEssen.jpg" alt="Henrike van Essen">
                <p>Henrike van Essen</p>
            </a>
            <a href="#rosalie" class="header-part">
                <img src="image/RosalieKoops.jpg" alt="Rosalie Koops">
                <p>Rosalie Koops</p>
            </a>
            <a href="#elke" class="header-part">
                <img src="image/ElkeAltenburg.jpg" alt="Elke Altenburg">
                <p>Elke Altenburg</p>
            </a>
        </div>
        <div class="team-container" id="jaap">
            <div class="name">
                <img src="image/JaapVanGerrevink.jpg" alt="Jaap van Gerrevink">
                <p>Jaap van Gerrevink</p>
            </div>
            <div class="info">
                <div>
                    <p>Wie ben ik?</p>
                    <span>Ik ben adviseur studentenbegeleiding en denk met je mee over je opleiding, doelen en hoe je alles op de rit houdt.</span>
                </div>
                <div>
                    <p>Wat vind ik leuk om te doen?</p>
                    <span>ik kijk graag voetbal, luister veel muziek en start elke dag met een lekkere kop koffie.</span>
                </div>
                <div>
                    <p>Welke opleiding ben ik aangekoppeld?</p>
                    <ul>
                        <li>MBO Bedrijfsadministratie</li>
                        <li>E-commerce specialist</li>
                        <li>MBO Managementassistent</li>
                        <li>MBO Marketing en Communicatie</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="team-container" id="maaike">
            <div class="name">
                <img src="image/MaaikeVeening.jpg" alt="Maaike Veening">
                <p>Maaike Veening</p>
            </div>
            <div class="info">
                <div>
                    <p>Wie ben ik?</p>
                    <span>Ik ben adviseur studentenbegeleiding en denk met je mee over je opleiding, doelen en hoe je alles op de rit houdt.</span>
                </div>
                <div>
                    <p>Wat vind ik leuk om te doen?</p>
                    <span>Met mijn hond het bos in gaan, theater maken en goede documentaires kijken over gedrag.</span>
                </div>
                <div>
                    <p>Welke opleiding ben ik aangekoppeld?</p>
                    <ul>
                        <li>ICT Support technician</li>
                        <li>Medewerker ICT</li>
                        <li>MBO Rechten (1e jaars)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="team-container" id="henrike">
            <div class="name">
                <img src="image/HenrikeVanEssen.jpg" alt="Henrike van Essen">
                <p>Henrike van Essen</p>
            </div>
            <div class="info">
                <div>
                    <p>Wie ben ik?</p>
                    <span>Ik ben adviseur studentenbegeleiding en denk met je mee over je opleiding, doelen en hoe je alles op de rit houdt.</span>
                </div>
                <div>
                    <p>Wat vind ik leuk om te doen?</p>
                    <span>voetbal, fotografie en wandelen in de bergen.</span>
                </div>
                <div>
                    <p>Welke opleiding ben ik aangekoppeld?</p>
                    <ul>
                        <li>Mediavormgever</li>
                        <li>MBO Rechten (oudere jaars)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="team-container" id="rosalie">
            <div class="name">
                <img src="image/RosalieKoops.jpg" alt="Rosalie Koops">
                <p>Rosalie Koops</p>
            </div>
            <div class="info">
                <div>
                    <p>Wie ben ik?</p>
                    <span>Ik ben adviseur studentenbegeleiding en denk met je mee over je opleiding, doelen en hoe je alles op de rit houdt.</span>
                </div>
                <div>
                    <p>Wat vind ik leuk om te doen?</p>
                    <span>hardlopen, paardrijden, pianospelen en met mijn hond wandelen.</span>
                </div>
                <div>
                    <p>Welke opleiding ben ik aangekoppeld?</p>
                    <ul>
                        <li>Medewerken Administratie en Receptie</li>
                        <li>Retailmedewerker</li>
                        <li>Logistiek Medewerker</li>
                        <li>Reatailspecialist</li>
                        <li>MBO Bedrijfsadministratie</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="team-container" id="elke">
            <div class="name">
                <img src="image/ElkeAltenburg.jpg" alt="Elke Altenburg">
                <p>Elke Altenburg</p>
            </div>
            <div class="info">
                <div>
                    <p>Wie ben ik?</p>
                    <span>Ik ben adviseur studentenbegeleiding en denk met je mee over je opleiding, doelen en hoe je alles op de rit houdt.</span>
                </div>
                <div>
                    <p>Wat vind ik leuk om te doen?</p>
                    <span>reizen, volleybal en ik hou van bordspellen.</span>
                </div>
                <div>
                    <p>Welke opleiding ben ik aangekoppeld?</p>
                    <ul>
                        <li>Software Developer</li>
                        <li>System engineer (1e jaars)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
