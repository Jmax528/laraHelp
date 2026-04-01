<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.scss', 'resources/css/beheer.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/f23681219e.js" crossorigin="anonymous"></script>
    <title>Studiebegeleiding - Beheren</title>
</head>

<body class="bg-warm-taupe">
<!-- Header -->
<x-header />

<main>
    <div class="side-nav">
        <div>
            <p>Vragen</p>
        </div>
        <div>
            <p>Thema's</p>
        </div>
        <div>
            <p>Chat</p>
        </div>
    </div>
    <div class="beheer-container">
        <div class="beheer-header">
            <p>Vragen beheren</p>
            <div class="beheer-buttons">
                <div class="beheer-btn">
                    Nieuw thema
                </div>
                <div class="beheer-btn">
                    Nieuwe vraag
                </div>
            </div>
        </div>

        <div class="table">
            <div class="table-header">
                <p class="table-header-vraag">Vraag</p>
                <p class="table-header-vraag-thema">Thema</p>
                <p class="table-header-kernwoord">Kernwoorden</p>
            </div>
            <div class="table-row uneven">
                <p class="table-row-vraag">Vraag</p>
                <p class="table-row-vraag-thema">Thema</p>
                <div class="table-row-kernwoord">
                    <p class="table-row-kernwoord-box">Kernwoord 1 <i class="fa-solid fa-xmark"></i></p>
                </div>
                <div class="table-row-edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
            <div class="table-row even">
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
            <div class="table-row uneven">
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
    </div>
</main>

{{--<button id="openPopup">Open Pop-up</button>--}}

<div id="popup popup-vraag" class="popup hidden">
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
                <button class="delete">Verwijderen</button>
                <button class="exit">Annuleren</button>
                <button class="add">Voeg toe</button>
            </div>
        </form>
    </div>
</div>

<div id="popup popup-thema" class="popup hidden">
    <div class="popup-content">
        <p class="title">Een nieuwe thema toevoegen</p>
        <form action="">
            <div>
                <label for="">Thema</label>
                <input type="text"> {{--dropdown--}}
            </div>
            <div class="buttons">
                <button class="delete">Verwijderen</button>
                <button class="exit">Annuleren</button>
                <button class="add">Voeg toe</button>
            </div>
        </form>
    </div>
</div>

<div id="popup popup-chat" class="popup hidden">
    <div class="popup-content">
        <p class="title">Wil je deze chat verwijderen?</p>
        <form action="">
            <div class="buttons">
                <button class="exit">Annuleren</button>
                <button class="delete">Verwijderen</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
