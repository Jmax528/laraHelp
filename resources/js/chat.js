document.addEventListener("DOMContentLoaded", () => {
    const chatArea = document.getElementById('chatArea');
    const chatId = chatArea.dataset.chatId;

    window.Echo.private(`chat.${chatId}`)
        .listen('MessageSent', (e) => {
            createNewMessage(e);
        });

    btmScroll();

    document.getElementById('sentMessageForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission
        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(response => response.json())
            .then(data => console.log('Success:', data))
            .catch(error => console.error('Error:', error));
    });

    // auto scroll to the bottom
    function btmScroll() {
        chatArea.scrollTop = chatArea.scrollHeight;
    }
});

function createNewMessage(e) {
    console.log(e);
    const newElement = document.createElement('div');
    newElement.classList.add('chat-container', 'chat-two');
    newElement.innerHTML = `${e.message}`;
    document.getElementById('chatArea').appendChild(newElement);
}



