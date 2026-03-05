import './echo.js';

document.addEventListener('DOMContentLoaded', () => {


    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');
    const textarea = document.getElementById('textarea');
    const usersArea = document.getElementById('usersArea');
    const chatArea = document.getElementById('chatArea');
    const adminSearch = document.getElementById('adminSearch');
    const email = document.getElementsByClassName('email');
    const adminMove = document.getElementById('adminBtn');

    if (!textarea) return;
    textarea.value = '';


    if (adminMove) {
        adminMove.addEventListener('click', () => {
            const adminCard = document.getElementById('adminCard');
            const svgArrowClose = path.getAttribute('d');
            const sbgArrowOpen = "M20 4V20M4 12H16M4 12L8 8M4 12L8 16"

            if (path.getAttribute('d') === svgArrowClose) {
                path.setAttribute('d', sbgArrowOpen);
            } else {
                path.setAttribute('d', svgArrowClose);
            }

            adminCard.classList.toggle('admin-card-hide');
            const centerCard = document.getElementById('chatCard');
            centerCard.classList.toggle('center-card');

        })
    }



    //search through users
    if (adminSearch) {
        adminSearch.value = '';
        adminSearch.addEventListener('input', () => {

            const filter = adminSearch.value.toLowerCase();
            const userItems = document.querySelectorAll('#usersArea .user-list-item');

            userItems.forEach(user => {
                const name = user.textContent.toLowerCase();
                const match = name.includes(filter);

                user.classList.toggle('hidden', !match);
            });
        });
        usersArea.addEventListener('click', (e) => {

            if (e.target.closest('.email')) {
                e.stopPropagation();

                const email = e.target.closest('.email');
                email.classList.toggle('emailShow');

                return;
            }

            const userItem = e.target.closest('.user-list-item');
            if (userItem && userItem.dataset.chatId) {
                window.location.href = `/chat/${userItem.dataset.chatId}`;
            }
        });
    }

    if (sendMessage && textarea && sendBtn) {

        // Submit via AJAX
        sendMessage.addEventListener('submit', async function (e) {
            e.preventDefault();

            const message = textarea.value.trim();
            if (!message) return;

            //render the message bubbles
            function renderMessage(e) {
                const bubble = document.createElement('div');
                bubble.classList.add('chat-container');

                if (parseInt(e.user_id) === window.currentUserId) {
                    bubble.classList.add('chat-one');
                } else {
                    bubble.classList.add('chat-two');
                }

                bubble.textContent = e.message;
                chatArea.appendChild(bubble);
                chatArea.scrollTop = chatArea.scrollHeight;
            }

            try {
                const response = await fetch(sendMessage.action, {
                    method: 'POST',
                    body: new FormData(sendMessage),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                const data = await response.json();
                if (data.success) {
                    renderMessage(data.message);
                }

            } catch (err) {
                console.error('Error sending message:', err);
            }

            textarea.value = '';
        });




        // Send with button
        sendBtn.addEventListener('click', e => {
            e.preventDefault();
            sendMessage.requestSubmit();
        });

        // Send with Enter key in textarea
        textarea.addEventListener('keydown', e => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage.requestSubmit();
            }
        });
    }
});
