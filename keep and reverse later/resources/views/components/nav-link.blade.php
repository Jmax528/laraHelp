@props(['href'])

@php
//  returns the url and trims the link before the /
    $currentLink = trim(request()->path(), '/');
    $targetLink = trim($href, '/');

//  checks if the current page matches the link or if they're blank in case of the home page
    $isActive = ($currentLink === $targetLink) || ($currentLink === '' && $targetLink === '');
@endphp


<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => implode(' ', [
            'nav-item',
            'text-white',
            'hover:text-blue-300',
            'font-medium',
            'pb-1',
            $isActive ? 'text-blue-500 font-bold border-b-2 border-blue-500' : ''
        ])
    ]) }}>
    {{ $slot }}
</a>
