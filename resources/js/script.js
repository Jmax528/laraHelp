document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textarea');
    const chatArea = document.getElementById('chatArea');
    const sendBtn = document.getElementById('sendBtn');

    // messages
    function message() {

        const textMessage = textarea.value.trim();
        if (!textMessage) return;

        const userMessage = document.createElement('div');
        userMessage.textContent = textMessage;
        userMessage.classList.add('chat-container', 'chat-one');
        chatArea.appendChild(userMessage);
        textarea.value = '';

        console.log('chat-one', textMessage);
        btmScrol();


        // bot answer for testing purpose
        setTimeout(() => {

            // const botAnswer  = document.getElementById('chatBoxTwo');
            const messageBoxTwo = document.createElement('div');
            messageBoxTwo.textContent = 'Are we testing again?';
            messageBoxTwo.classList.add('chat-container', 'chat-two');
            chatArea.appendChild(messageBoxTwo);
            console.log('chat-two', messageBoxTwo.textContent);

            btmScrol();
        }, 1000);
    }

    // send message button
    sendBtn.addEventListener('click', message);

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            message();
        }
    });

    // auto scroll to the bottom
    function btmScrol() {
        chatArea.scrollTop = chatArea.scrollHeight;
    }

});


