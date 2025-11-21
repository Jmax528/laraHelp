<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.scss', 'resources/css/faq.scss', 'resources/js/app.js', 'resources/js/faq.js'])
    <script src="https://kit.fontawesome.com/f23681219e.js" crossorigin="anonymous"></script>
    <title>FAQ</title>
</head>
<body class="bg-warm-taupe dark">
<x-header />
<section class="spacer">
    <div class="faq-container">

        <div class="faq-theme">
            <div class="theme-container" id="theme-1">
                <div id="less-1"><i class="fa-solid fa-xl fa-chevron-down"></i></div>
                <div id="more-1" class="hidden"><i class="fa-solid fa-xl fa-chevron-right"></i></div>
                <span class="h1 ml-2">Studiekeuze</span>
            </div>

            <div class="question-container show" id="faq-1">
                <div class="faq-question bg-dusty-cedar" id="question-1">
                    <div class="faq-header">
                        <span>Ik twijfel of ik wel op de juiste studie zit, kan ik nog switchen?</span>
                        <span id="expand-1">+</span>
                        <span id="retract-1" class="hidden">-</span>
                    </div>
                    <div class="faq-text-blocks" id="answer-1">
                        <div class="faq-text-block">
                            <p class="faq-text">
                                dat hangt af van een paar dingen. Sommige opleidingen hebben flexibele instroom maar de meesten beginnen in (februari en) september. Als je 18 bent is het ook mogelijk om te stoppen met school en te werken tot het nieuwe schooljaar. Maar dan betaal je wel schoolgeld voor het hele jaar. *Meer weten? Ga naar de chatfunctie voor meer info of om een afspraak te maken.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq-question bg-dusty-cedar" id="question-2">
                    <div class="faq-header">
                        <span>Wat is expeditie alfa?</span>
                        <span id="expand-2">+</span>
                        <span id="retract-2" class="hidden">-</span>
                    </div>
                    <div class="faq-text-blocks" id="answer-2">
                        <div class="faq-text-block">
                            <p class="faq-text">
                                Dat is een persoonlijk oriëntatietraject van 15 weken voor studenten die vastlopen in hun opleiding omdat deze toch niet passend is of omdat ze een oriëntatievraag hebben. Zie link voor meer info
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-theme">
            <div class="theme-container" id="theme-2">
                <div id="less-2" class="hidden"><i class="fa-solid fa-xl fa-chevron-down"></i></div>
                <div id="more-2"><i class="fa-solid fa-xl fa-chevron-right"></i></div>
                <span class="h1 ml-2">Studiefinanciering</span>
            </div>

            <div class="question-container" id="faq-2">
                <div class="faq-question bg-dusty-cedar" id="question-3">
                    <div class="faq-header">
                        <span>Wanneer is DUO weer op school?</span>
                        <span id="expand-3">+</span>
                        <span id="retract-3" class="hidden">-</span>
                    </div>
                    <div class="faq-text-blocks" id="answer-3">
                        <div class="faq-text-block">
                            <p class="faq-text">
                                elke laatste donderdag van de maand van 13-15 uur zit er een medewerker van DUO links in de kantine, die kan al je vragen beantwoorden.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="faq-question bg-dusty-cedar" id="question-4">
                    <div class="faq-header">
                        <span>Aanvullende beurs, DUO stelt vragen over mijn ouders, wat moet ik nu?</span>
                        <span id="expand-4">+</span>
                        <span id="retract-4" class="hidden">-</span>
                    </div>
                    <div class="faq-text-blocks" id="answer-4">
                        <div class="faq-text-block">
                            <p class="faq-text">
                                soms is het voor DUO onduidelijk wie je ouders zijn en wat hun inkomsten zijn. Ze vragen dan om extra info. Soms wil je een ouder “buiten beschouwing laten” voor de berekening van je aanvullende beurs. Het LBC kan je helpen met een deskundigenverklaring. *Meer weten? Ga naar de chatfunctie voor meer info of om een afspraak te maken
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-theme">
            <div class="theme-container" id="theme-3">
                <div id="less-3" class="hidden"><i class="fa-solid fa-xl fa-chevron-down"></i></div>
                <div id="more-3"><i class="fa-solid fa-xl fa-chevron-right"></i></div>
                <span class="h1 ml-2">Welzijn</span>
            </div>

            <div class="question-container" id="faq-3">
                <div class="faq-question bg-dusty-cedar" id="question-5">
                    <div class="faq-header">
                        <span>Ik voel me niet fijn, zit slecht in mijn vel. Kan ik op school hulp hiervoor krijgen?</span>
                        <span id="expand-5">+</span>
                        <span id="retract-5" class="hidden">-</span>
                    </div>
                    <div class="faq-text-blocks" id="answer-5">
                        <div class="faq-text-block">
                            <p class="faq-text">
                                zeker, er zijn meerdere mogelijkheden. We hebben een schoolpastor die met je in gesprek kan, we werken samen met School als Wijk en bij het team LBC zitten ook veel betrokken mensen.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq-question bg-dusty-cedar" id="question-6">
                    <div class="faq-header">
                        <span>Ik heb last van faalangst, kan ik daar hulp bij krijgen?</span>
                        <span id="expand-6">+</span>
                        <span id="retract-6" class="hidden">-</span>
                    </div>
                    <div class="faq-text-blocks" id="answer-6">
                        <div class="faq-text-block">
                            <p class="faq-text">
                                ja zeker, je kan op deze link klikken voor een app die gemaakt is door andere studenten waar wat tips en info op staan. Ook hebben we trainers in huis voor een paar gesprekken om je hiermee te helpen. * Meer weten? Ga naar de chatfuncite voor meer info of om een afspraak te maken
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

</html>
