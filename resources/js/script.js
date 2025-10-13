document.addEventListener("DOMContentLoaded", () => {


function message() {
    const textarea = document.getElementById('textarea');
    const textMessage = textarea.value.trim();

    if (!textMessage) return;

    const newChat = document.getElementById('chatBoxOne');
    const messageBox = document.createElement('div');
    messageBox.textContent = textMessage;
    messageBox.classList.add('message-box', 'send');


    console.log('chatOne', newChat, textMessage);

    newChat.appendChild(messageBox);
    textarea.value = '';

    newChat.scrollTop = newChat.scrollHeight;


}

const sendBtn = document.getElementById('sendBtn');
sendBtn.addEventListener('click', message);

document.addEventListener('keydown', e => {
    if (e.key === 'Enter') {
        message();
    }
})

})
