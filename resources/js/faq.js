document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', function (e) {

        const idNumber = this.id.split('-')[1];

        const expand = this.querySelector('.expand-toggle');
        const retract = this.querySelector('.retract-toggle');
        const answer = document.getElementById(`answer-${idNumber}`);

        expand.classList.toggle('hidden');
        retract.classList.toggle('hidden');
        answer.classList.toggle('show');
    });
});


document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', function (e) {

        const idNumber = this.id.split('-')[1];
        const expand = document.getElementById(`expand-${idNumber}`);
        const retract = document.getElementById(`retract-${idNumber}`);
        const answer = document.getElementById(`answer-${idNumber}`);

        expand.classList.toggle('hidden');
        retract.classList.toggle('hidden');
        answer.classList.toggle('show');
    });
});
