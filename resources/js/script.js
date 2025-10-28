document.addEventListener("DOMContentLoaded", () => {


function message() {
    const textarea = document.getElementById('textarea');
    const textMessage = textarea.value.trim();
    if (!textMessage) return;

    const newChat = document.getElementById('chatOne');
    const userMessage = document.createElement('div');
    userMessage.textContent = textMessage;
    userMessage.classList.add('message-box');
    newChat.appendChild(userMessage);
    textarea.value = '';
    newChat.scrollTop = newChat.scrollHeight;

    console.log('chatOne', newChat, textMessage);


    setTimeout(() => {

    const botAnswer  = document.getElementById('chatBoxTwo');
    const messageBoxTwo = document.createElement('div');
    messageBoxTwo.textContent ='Are we testing again?';
    messageBoxTwo.classList.add('botMessage', 'received');
    botAnswer.appendChild(messageBoxTwo);


    console.log('chatTwo', newChat, messageBoxTwo.textContent);

    btmScrol();
}, 1000);
}
    const sendBtn = document.getElementById('sendBtn');
    sendBtn.addEventListener('click', message);

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            message();
        }
    });
function btmScrol() {
    chatArea.scrollTop = chatArea.scrollHeight;

}
});
