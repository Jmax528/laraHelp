<header class="bg-[#4C6A92] shadow-md sticky top-0 z-50">
    <div class="px-[75px] flex justify-between items-center">
        <div class="flex items-center gap-12">
            <img width="72px" height="72px" src="image/alfa-logo.png" alt="Alfa-college">
            <h1 class="text-white main-title">Het LBC</h1>
        </div>
        <div class="flex gap-3">
            <button id="darkModeBtn" class="dark-button">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path id="svgPath" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636m12.728 12.728L16.95 16.95M5 12H3m18 0h-2M7.05 16.95l-1.414 1.414M18.364 5.636 16.95 7.05M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
                </svg>

            </button>
        </div>
        <nav>
            <ul class="flex gap-4">
                <li><x-nav-link href="/">Home</x-nav-link></li>
                <li><x-nav-link href="/chat">Chat</x-nav-link></li>
                <li><x-nav-link href="/ons-team">Ons Team</x-nav-link></li>
                <li><x-nav-link href="/faq">FAQ</x-nav-link></li>
            </ul>
        </nav>
    </div>
</header>
