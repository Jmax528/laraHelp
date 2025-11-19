document.querySelectorAll('.theme-container').forEach(faq => {
    faq.addEventListener('click', function() {
        const idNumber = this.id.split('-')[1];

        const less = document.getElementById(`less-${idNumber}`);
        const more = document.getElementById(`more-${idNumber}`);
        const faq = document.getElementById(`faq-${idNumber}`);

        less.classList.toggle('hidden');
        more.classList.toggle('hidden');
        faq.classList.toggle('show');
    });
});

document.querySelectorAll('.faq-question').forEach(faq => {
    faq.addEventListener('click', function() {
        const idNumber = this.id.split('-')[1];

        const expand = document.getElementById(`expand-${idNumber}`);
        const retract = document.getElementById(`retract-${idNumber}`);
        const answer = document.getElementById(`answer-${idNumber}`);

        expand.classList.toggle('hidden');
        retract.classList.toggle('hidden');
        answer.classList.toggle('show');
    });
});
