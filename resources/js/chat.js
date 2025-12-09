import './echo.js';

document.addEventListener("DOMContentLoaded", () => {

    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');

    // --- Submit message ---
    sendMessage.addEventListener('submit', function (e) {
        e.preventDefault();




        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(r => r.json())
            .then(data => console.log('Success:', data))
            .catch(err => console.error(err));

    });

    // --- Click and Enter key ---
    sendBtn.addEventListener('click', () => sendMessage.requestSubmit());

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage.requestSubmit();
        }
    });




    // // --- Auto scroll ---
    // function scrollToBottom() {
    //     chatArea.scrollTop = chatArea.scrollHeight;
    // }
});
