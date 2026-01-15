@php
    $model = $section ?? $faq;
    $type  = $section ? 'section_id' : 'faq_id';
@endphp

@can('delete', $model)
    <form method="POST" action="{{ route('faq.delete') }}">
        @csrf
        <input type="hidden" name="{{ $type }}" value="{{ $model->id }}">
        <button type="submit" class="px-4 py-2 bg-red-500 rounded mr-2 text-amber-50">
            Delete
        </button>
    </form>
@endcan
