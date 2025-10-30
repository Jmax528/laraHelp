document.querySelectorAll('.faq-questions').forEach(faq => {
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
