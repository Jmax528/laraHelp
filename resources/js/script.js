document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textarea');
    const chatArea = document.getElementById('chatArea');
    const sendBtn = document.getElementById('sendBtn');
    const darkModeBtn = document.getElementById('darkModeBtn');

    function addMessage(text, type) {
        const div = document.createElement('div');
        div.textContent = text;
        div.classList.add('chat-container');

        if (type === 'self') {
            div.classList.add('chat-one');
        } else {
            div.classList.add('chat-two');
        }

        chatArea.appendChild(div);
        chatArea.scrollTop = chatArea.scrollHeight;

        // bot answer for testing ppurpose
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




    // messages
    async function message() {

        const textMessage = textarea.value.trim();
        if (!textMessage) return;

        addMessage(textMessage, "self");
        textarea.value = "";

        await fetch("/chat/send", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({message: textMessage})
        })
        console.log('chat-one', textMessage);
        btmScrol();


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

    // toggles dark mode
    const darkMode = document.getElementsByClassName('dark' );
    darkModeBtn.addEventListener('click', () => {
        for (let el of darkMode) {
            el.classList.toggle('dark-mode');
        }
    });

    window.Echo.channel("chat").listen(".message.sent", (event => {
        addMessage(event.message, "other");
    }));
});
