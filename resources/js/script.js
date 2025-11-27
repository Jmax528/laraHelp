import './echo.js';
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


    function addUserMessage(e) {
        window.Echo.channel('chat')
            .listen('.MessageSent', (e) => {
                addUserMessage(e);
            });

        const userMessage = document.createElement('div');
        userMessage.classList.add('chat-container', 'chat-one');
        userMessage.textContent = (e);
        userMessage.innerHTML = `${e.message}`;
        chatArea.appendChild(userMessage);
        textarea.value = '';

        console.log('chat-one', e.message);
        btmScrol();
    }
    // function createNewMessage(e) {
    //     console.log(e);
    //     const newElement = document.createElement('div');
    //     newElement.classList.add('chat-container', 'chat-two');
    //     newElement.innerHTML = `${e.message}`;
    //     document.getElementById('chatArea').appendChild(newElement);
    // }

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
