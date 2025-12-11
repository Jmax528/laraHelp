document.querySelectorAll('.theme-container').forEach(theme => {
    theme.addEventListener('click', function(e) {
        // Don't toggle if clicking inside a form or input
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'SELECT' || e.target.tagName === 'BUTTON') {
            return;
        }

        const idNumber = this.id.split('-')[1];
        const less = document.getElementById(`less-${idNumber}`);
        const more = document.getElementById(`more-${idNumber}`);
        const faq = document.getElementById(`faq-${idNumber}`);

        less.classList.toggle('hidden');
        more.classList.toggle('hidden');
        faq.classList.toggle('show');
    });
});

document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', function(e) {
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'SELECT' || e.target.tagName === 'BUTTON') {
            return;
        }

        const idNumber = this.id.split('-')[1];
        const expand = document.getElementById(`expand-${idNumber}`);
        const retract = document.getElementById(`retract-${idNumber}`);
        const answer = document.getElementById(`answer-${idNumber}`);

        expand.classList.toggle('hidden');
        retract.classList.toggle('hidden');
        answer.classList.toggle('show');
    });
});
