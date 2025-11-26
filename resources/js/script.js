document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textarea');
    const chatArea = document.getElementById('chatArea');
    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');

    sendMessage.addEventListener('submit', function (e) {
        e.preventDefault();

        // messages
        const textMessage = textarea.value.trim();
        if (!textMessage) return;

        addUserMessage(textMessage);



        const formData = new FormData(this);
        console.log("Making a request");
        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }

        })
            .then(response => response.json())
            .then(data => console.log('Success: ', data))
            .catch(err => console.log(err));
        textarea.value = '';
        botReply();
    });

    function addUserMessage(text) {

        const userMessage = document.createElement('div');
        userMessage.textContent = text;
        userMessage.classList.add('chat-container', 'chat-one');
        chatArea.appendChild(userMessage);
        textarea.value = '';

        console.log('chat-one', text);
        btmScrol();
    }

    // bot answer for testing purpose
    function botReply() {
        setTimeout(() => {


        const messageBoxTwo = document.createElement('div');
        messageBoxTwo.textContent = 'Are we testing again?';
        messageBoxTwo.classList.add('chat-container', 'chat-two');
        chatArea.appendChild(messageBoxTwo);

        console.log('chat-two', messageBoxTwo.textContent);
        btmScrol();
        }, 1000);
    }


    // send message button
        sendBtn.addEventListener('click', () => sendMessage.requestSubmit())
    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage.requestSubmit();
        }
    });


    // auto scroll to the bottom
    function btmScrol() {
        chatArea.scrollTop = chatArea.scrollHeight;
    }

});
