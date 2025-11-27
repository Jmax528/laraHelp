import './echo.js';

document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textarea');
    const chatArea = document.getElementById('chatArea');
    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');

    // Listen for broadcast messages
    window.Echo.channel('chat')
        .listen('MessageSent', (event) => {
            receivedMessage(event.message);
        });

    sendMessage.addEventListener('submit', function (e) {
        e.preventDefault();

        const textMessage = textarea.value.trim();
        if (!textMessage) return;

        addUserMessage(textMessage);


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

        textarea.value = '';
        // botReply();
    });

    function addUserMessage(text) {
        const userMessage = document.createElement('div');
        userMessage.classList.add('chat-container', 'chat-one');
        userMessage.textContent = text;
        chatArea.appendChild(userMessage);

        console.log('chat-one', text);
        btmScrol();
    }

    function receivedMessage(text) {
            const messageBoxTwo = document.createElement('div');
            messageBoxTwo.textContent = text;
            messageBoxTwo.classList.add('chat-container', 'chat-two');
            chatArea.appendChild(messageBoxTwo);

            console.log('chat-two', messageBoxTwo.textContent);
            btmScrol();
    }

    sendBtn.addEventListener('click', () => sendMessage.requestSubmit());

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage.requestSubmit();
        }
    });

    function btmScrol() {
        chatArea.scrollTop = chatArea.scrollHeight;
    }
});
