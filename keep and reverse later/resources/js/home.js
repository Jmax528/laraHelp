// Accordion functionaliteit
document.addEventListener('DOMContentLoaded', function() {
    const accordionToggles = document.querySelectorAll('.accordion-toggle');

    accordionToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetContent = document.getElementById(targetId);
            const icon = this.querySelector('svg');

            // Toggle huidige accordion
            if (targetContent.classList.contains('max-h-0')) {
                // Open deze accordion
                targetContent.classList.remove('max-h-0', 'opacity-0');
                targetContent.classList.add('max-h-[500px]', 'opacity-100');
                icon.classList.add('rotate-45');
            } else {
                // Sluit deze accordion
                targetContent.classList.remove('max-h-[500px]', 'opacity-100');
                targetContent.classList.add('max-h-0', 'opacity-0');
                icon.classList.remove('rotate-45');
            }
        });
    });
});
