<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.scss', 'resources/css/beheer.scss', 'resources/js/app.js', 'resources/js/beheer.js'])
    <script src="https://kit.fontawesome.com/f23681219e.js" crossorigin="anonymous"></script>
    <title>Studiebegeleiding - Beheren</title>
</head>

<body class="bg-warm-taupe">
<!-- Header -->
<x-header />

<main>
    <div class="side-nav">
        <div id="navQuestion" class="active">
            <p>Vragen</p>
        </div>
        <div id="navTheme">
            <p>Thema's</p>
        </div>
{{--        <div>--}}
{{--            <p>Chat</p>--}}
{{--        </div>--}}
    </div>
    <div class="beheer-container">
        <div class="beheer-header">
            <p>Vragen beheren</p>
            <div class="beheer-buttons">
                <div id="openTheme" class="beheer-btn">
                    Nieuw thema
                </div>
                <div id="openQuestion" class="beheer-btn">
                    Nieuwe vraag
                </div>
            </div>
        </div>
        <div id="tableQuestion" class="table">
            <div class="table-header">
                <p class="table-header-vraag">Vraag</p>
                <p class="table-header-vraag-thema">Thema</p>
                <p class="table-header-kernwoord">Kernwoorden</p>
            </div>
            <div class="table-row even">
                <p class="table-row-vraag">Vraag</p>
                <p class="table-row-vraag-thema">Thema</p>
                <div class="table-row-kernwoord">
                    <p class="table-row-kernwoord-box">Kernwoord 1 <i class="fa-solid fa-xmark"></i></p>
                </div>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="table-row uneven">
                <p class="table-row-vraag">Vraag</p>
                <p class="table-row-vraag-thema">Thema</p>
                <div class="table-row-kernwoord">
                    <p class="table-row-kernwoord-box">K <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">e <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">r <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">n <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">w <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">o <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">o <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">r <i class="fa-solid fa-xmark"></i></p>
                    <p class="table-row-kernwoord-box">d <i class="fa-solid fa-xmark"></i></p>
                </div>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="table-row even">
                <p class="table-row-vraag">Vraag</p>
                <p class="table-row-vraag-thema">Thema</p>
                <div class="table-row-kernwoord">
                    <p class="table-row-kernwoord-box">Kernwoord 1 <i class="fa-solid fa-xmark"></i></p>
                </div>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
        </div>
        <div id="tableTheme" class="table hidden">
            <div class="table-header">
                <p class="table-header-vraag">Thema</p>
                <p class="table-header-vraag-thema">Aantal vragen</p>
            </div>
            <div class="table-row even">
                <p class="table-row-vraag">Duo</p>
                <p class="table-row-vraag-thema">6</p>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="table-row uneven">
                <p class="table-row-vraag">Leerplicht</p>
                <p class="table-row-vraag-thema">2</p>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="table-row even">
                <p class="table-row-vraag">Gezondheid</p>
                <p class="table-row-vraag-thema">5</p>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="table-row uneven">
                <p class="table-row-vraag">Financieel</p>
                <p class="table-row-vraag-thema">4</p>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="table-row even">
                <p class="table-row-vraag">Overig</p>
                <p class="table-row-vraag-thema">7</p>
            </div>
        </div>
    </div>
</main>

<div id="popupQuestion" class="popup hidden">
    <div class="popup-content">
        <p class="title">Een nieuwe FAQ toevoegen</p>
        <form action="">
            <div>
                <label for="">Thema</label>
                <input type="text"> {{--dropdown--}}
            </div>
            <div>
                <label for="">Vraag</label>
                <input type="text">
            </div>
            <div>
                <label for="">Antwoord</label>
                <input type="text">
            </div>
            <div>
                <label for="">Kernwoorden</label>
                <input type="text">
{{--
                hier moeten woorden in komen te staan.
                gap: 8px;
                font-size: 20px;
                line-height: 24px;
                margin-y: 2px;
                margin-x: 4px;
                background-color: $sharkskin-300;
--}}
            </div>
            <div class="buttons">
                <div id="openQuestionDel" class="btn delete">Verwijderen</div>
                <div id="closeQuestion" class="btn exit">Annuleren</div>
                <button class="btn add">Voeg toe</button>
            </div>
        </form>
    </div>
</div>

<div id="popupThema" class="popup hidden">
    <div class="popup-content">
        <p class="title">Een nieuwe thema toevoegen</p>
        <form action="">
            <div>
                <label for="">Thema</label>
                <input type="text"> {{--dropdown--}}
            </div>
            <div class="buttons">
                <div id="openThemeDel" class="btn delete">Verwijderen</div>
                <div id="closeTheme" class="btn exit">Annuleren</div>
                <button class="btn add">Voeg toe</button>
            </div>
        </form>
    </div>
</div>

<div id="popupChatDel" class="popup popup-chat hidden">
    <div class="popup-content">
        <p class="title">Wil je deze chat verwijderen?</p>
        <form action="">
            <div class="buttons">
                <btn id="closeChatDel" class="btn exit">Annuleren</btn>
                <button class="btn delete">Verwijderen</button>
            </div>
        </form>
    </div>
</div>

<div id="popupQuestionDel" class="popup popup-vraag-delete hidden">
    <div class="popup-content">
        <p class="title">Wil je deze vraag verwijderen?</p>
        <form action="">
            <div class="buttons">
                <div id="closeQuestionDel" class="btn exit">Annuleren</div>
                <button class="btn delete">Verwijderen</button>
            </div>
        </form>
    </div>
</div>

<div id="popupThemaDel" class="popup popup-thema-delete hidden">
    <div class="popup-content">
        <p class="title">Hoe wil je dit thema verwijderen?</p>
        <form action="">
            <div class="buttons">
                <div id="closeThemeDel" class="btn exit">Annuleren</div>
                <button class="btn delete">Thema en vragen verwijderen</button>
                <button class="btn delete">Alleen thema verwijderen</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
