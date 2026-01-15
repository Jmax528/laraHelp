<div id="{{ $id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>

        {{ $slot }}

        <div class="flex justify-end mt-4">
            <button onclick="closeModal('{{ $id }}')" class="px-4 py-2 bg-gray-300 rounded mr-2">Annuleren</button>
            <button form="{{ $formId }}" class="px-4 py-2 bg-blue-600 text-white rounded">Opslaan</button>
        </div>
    </div>
</div>
