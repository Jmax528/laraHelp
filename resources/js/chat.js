import './echo.js';

document.addEventListener('DOMContentLoaded', () => {


    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');
    const textarea = document.getElementById('textarea');
    const usersArea = document.getElementById('usersArea');
    const chatArea = document.getElementById('chatArea');
    const adminSearch = document.getElementById('adminSearch');
    const email = document.getElementsByClassName('email');

    textarea.value = '';

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

            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

                // const data = await response.json();
                // if (data.success) renderMessage(data.message);

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
