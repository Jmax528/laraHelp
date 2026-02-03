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

        @foreach($sections as $section)
            <div class="faq-theme">

                {{-- SECTION HEADER --}}
                <div class="theme-container flex items-center" id="theme-{{ $section->id }}">
                    <div class="toggle-icon" data-target="faq-{{ $section->id }}">
                        <i class="fa-solid fa-chevron-right fa-xl"></i>
                    </div>

                    <span class="h1 ml-2">{{ $section->name }}</span>
                    @can('create', $section)
                    <button class="ml-auto p-2 dusty-ceder-300 rounded" onclick="openModal('Toevoegen-menu')">
                        Toevoegen
                    </button>
                    @endcan
                </div>

                {{-- FAQ LIST --}}
                <div class="question-container show" id="faq-{{ $section->id }}">
                    @foreach($section->faqs as $faq)
                        <div class="faq-question bg-dusty-cedar" id="question-{{ $faq->id }}">

                            <div class="faq-header flex justify-between items-center">
                                <span class="faq-title">{{ $faq->question }}</span>

                                <div class="flex items-center">
                                    @can('update', $faq)
                                        <button class="p-2 bg rounded dusty-ceder-300 mr-4"
                                                onclick="openEditModal({{ $faq->id }}, '{{ e($faq->question) }}', '{{ e($faq->answer) }}', '{{ $faq->order }}')">
                                            Bewerken
                                        </button>
                                    @endcan

                                    <span class="expand-toggle" data-id="{{ $faq->id }}">+</span>
                                    <span class="retract-toggle hidden" data-id="{{ $faq->id }}">-</span>
                                </div>
                            </div>

                            <div class="faq-text-blocks" id="answer-{{ $faq->id }}">
                                <p class="faq-text">{{ $faq->answer }}</p>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

    </div>
</section>


@can('update', $faq)
{{-- EDIT FAQ MODAL --}}
<div id="edit-faq-modal" class="modal-overlay hidden">
    <div class="modal">
        <h2 class="text-xl font-bold mb-4">FAQ Bewerken</h2>

        <form id="edit-faq-form" method="POST" action="{{route('faq.update')}}">
            @csrf

            <label class="block mb-2">Vraag</label>
            <input id="edit-question" type="text" name="question" class="w-full p-2 border rounded mb-4">

            <label class="block mb-2">Antwoord</label>
            <textarea id="edit-answer" name="answer" class="w-full p-2 border rounded mb-4" rows="4"></textarea>

            <label hidden class="block mb-2">Order</label>
            <input hidden id="edit-order" name="order" class="w-full p-2 border rounded mb-4">

            <input type="hidden" id="edit-faq-id" name="faq_id">

            <div class="flex justify-end mt-4">
                <button type="button" onclick="closeModal('edit-faq-modal')" class="px-4 py-2 bg-gray-300 rounded mr-2">
                    Annuleren
                </button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Opslaan</button>
            </div>
        </form>

        <form action="{{ route('faq.delete') }}" method="POST" class="ml-auto">
            @csrf
            <input type="hidden" id="delete-faq-id" name="faq_id">
            <button class="p-2 bg-red-600 text-white rounded"
                    onclick="return confirm('Are you sure you want to delete this?')">Delete
            </button>
        </form>
    </div>
</div>
@endcan

@can('create', $faq)
<div id="Toevoegen-menu" class="modal-overlay hidden">
    <div class="modal">
        <div class="flex mb-1">
            <h1>Thema</h1>
            <form action="{{ route('faq.delete') }}" method="POST" class="ml-auto">
                @csrf
                <input type="hidden" name="section_id" value="{{ $section->id }}">
                <button class="p-2 bg-red-600 text-white rounded"
                        onclick="return confirm('Are you sure you want to delete this?')">Delete
                </button>
            </form>
        </div>
        <form action="{{ route('faq.create') }}" method="POST">
            @csrf

            <select name="section_id" id="section-select"
                    class="w-full p-2 border rounded mb-4"
                    onchange="toggleCustomSection()">
                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach

                <option value="custom">Anders, namelijk:</option>
            </select>

            <input type="text"
                   name="custom_section"
                   id="custom-section-input"
                   class="w-full p-2 border rounded mb-4 hidden"
                   placeholder="Voer een sectienaam in...">

            <h1 class="mb-1">Vraag</h1>
            <input name="question" class="w-full p-2 border rounded mb-4">

            <h1 class="mb-1">Antwoord</h1>
            <input name="answer" class="w-full p-2 border rounded mb-4">

            <div class="flex">
                <button type="button" class="ml-auto mr-1 p-2 bg-gray-500 text-white rounded"
                        onclick="closeModal('Toevoegen-menu')">
                    Cancel
                </button>
                <button type="submit" class="p-2 bg-green-600 text-white rounded">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</div>
@endcan

<script>
    function openModal(id, sectionId = null) {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        if (sectionId) {
            const input = document.getElementById('add-section-id');
            if (input) input.value = sectionId;
        }
    }


    function closeModal(id) {
        let modal = document.getElementById(id);
        modal.classList.add('hidden')
        modal.classList.remove('flex')

    }

    function openEditModal(id, question, answer, order) {
        document.getElementById('edit-question').value = question;
        document.getElementById('edit-answer').value = answer;
        document.getElementById('edit-order').value = order;
        document.getElementById('edit-faq-id').value = id;
        document.getElementById('delete-faq-id').value = id;

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
</script>

</body>
</html>
