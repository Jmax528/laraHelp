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
<x-header/>

<section class="spacer">
    <div class="faq-container">

        @can('create', App\Models\Faq::class)
            <button class="p-2 bg-green-600 text-white rounded mb-4"
                    onclick="openModal('add-faq-modal')">
                Nieuwe FAQ toevoegen
            </button>
        @endcan

        @foreach($sections as $section)
            <div class="faq-theme">

                <!-- Section header -->
                <div class="theme-container flex" id="theme-{{ $section->id }}">
                    <div id="less-{{ $section->id }}" class="hidden">
                        <i class="fa-solid fa-chevron-down fa-xl"></i>
                    </div>
                    <div id="more-{{ $section->id }}">
                        <i class="fa-solid fa-chevron-right fa-xl"></i>
                    </div>

                    <div class="flex items-center">
                        <span class="h1 ml-2">{{ $section->name }}</span>

{{--                        <form action="{{ route('faq.delete') }}" method="POST" class="ml-auto">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="section_id" value="{{ $section->id }}">--}}
{{--                            <button class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>--}}
{{--                        </form>--}}
                    </div>
                </div>

                <!-- Section FAQ list -->
                <div class="question-container show" id="faq-{{ $section->id }}">
                    @foreach($section->faqs as $faq)
                        <div class="faq-question bg-dusty-cedar" id="question-{{ $faq->id }}">
                            <div class="faq-header">
                                <span class="faq-title">{{ $faq->question }}</span>
                                <div class="flex justify-between">

                                @can('update', $faq)
                                        <button class="p-2 bg rounded"
                                                onclick="openEditModal({{ $faq->id }}, '{{ addslashes($faq->question) }}', '{{ addslashes($faq->answer) }}')">
                                            Bewerken
                                        </button>
                                @endcan


                                    <span id="expand-{{ $faq->id }}" class="flex items-center justify-center">+</span>
                                        <span id="retract-{{ $faq->id }}" class="hidden flex items-center justify-center">-</span>
                                    </div>
                            </div>

                            <div class="faq-text-blocks" id="answer-{{ $faq->id }}">
                                <div class="faq-text-block">
                                    <p class="faq-text">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach
    </div>
</section>

<!-- ADD FAQ MODAL -->
<div id="add-faq-modal" class="modal-overlay">
    <div class="modal">
        <h2 class="text-xl font-bold mb-4">Nieuwe FAQ toevoegen</h2>

        <form id="add-faq-form" method="POST" action="{{ route('faq.create') }}">
            @csrf

            <label class="block mb-2">Vraag</label>
            <input type="text" name="question" class="w-full p-2 border rounded mb-4">

            <label class="block mb-2">Answer</label>
            <textarea name="answer" class="w-full p-2 border rounded mb-4" rows="4"></textarea>

            <label for="order">Order</label>
            <input id="order" name="order" class="w-full p-2 border rounded mb-4">

            <label class="block mb-2">Sectie</label>
            <select name="section_id" id="section-select" class="w-full p-2 border rounded mb-4" onchange="toggleCustomSection()">
                @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach

                <!-- Extra option -->
                <option value="custom">Anders, namelijk:</option>
            </select>
            <label for="section-order">Number</label>
            <input name="order" class="w-full p-2 border rounded mb-4 hidden">

            <!-- Hidden custom input -->
            <input type="text"
                   name="custom_section"
                   id="custom-section-input"
                   class="w-full p-2 border rounded mb-4 hidden"
                   placeholder="Voer een sectienaam in...">


            <div class="flex justify-end mt-4">
                <button type="button" onclick="closeModal('add-faq-modal')" class="px-4 py-2 bg-gray-300 rounded mr-2">Annuleren</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Opslaan</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT FAQ MODAL -->
<div id="edit-faq-modal" class="modal-overlay">
    <div class="modal">
        <h2 class="text-xl font-bold mb-4">FAQ Bewerken</h2>

        {{-- EDIT FORM --}}
        <form id="edit-faq-form" method="POST" action="{{ route('faq.update', $faq->id) }}">
            @csrf
            @method('PUT')

            <label for="edit-question" class="block mb-2">Vraag</label>
            <input id="edit-question" type="text" name="question" class="w-full p-2 border rounded mb-4">

            <label for="edit-answer" class="block mb-2">Antwoord</label>
            <textarea id="edit-answer" name="answer" class="w-full p-2 border rounded mb-4" rows="4"></textarea>

            <label for="order">Order</label>
            <input id="order" name="order" class="w-full p-2 border rounded mb-4">

            <input hidden id="question_id" name="faq_id" value="">

            <div class="flex justify-end mt-4">
                <button type="button" onclick="closeModal('edit-faq-modal')" class="px-4 py-2 bg-gray-300 rounded mr-2">
                    Annuleren
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded" type="submit">
                    Opslaan
                </button>
            </div>
        </form>

        {{-- DELETE FORM (separate!) --}}
        <form method="POST" action="{{ route('faq.delete') }}" class="mt-2">
            @csrf
            <input type="hidden" name="faq_id" value="{{ $faq->id }}">
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">
                Delete
            </button>
        </form>

    </div>
</div>


<script>
    @can('update', $faq)
    function openModal(id) {
        document.getElementById(id).style.display = 'flex';
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }

    function openEditModal(id, question, answer) {
        document.getElementById('edit-question').value = question;
        document.getElementById('edit-answer').value = answer;

        document.getElementById('edit-faq-form').action = `/faq/${id}`;
        document.getElementById('question_id').value = id;

        openModal('edit-faq-modal');
    }

    function toggleCustomSection() {
        const select = document.getElementById('section-select');
        const customInput = document.getElementById('custom-section-input');

        if (select.value === 'custom') {
            customInput.classList.remove('hidden');
        } else {
            customInput.classList.add('hidden');
            customInput.value = '';
        }
    }
@endcan
</script>

</body>
</html>
