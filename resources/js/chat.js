import './echo.js';
import {createMessage} from "./echo.js";
// message bubbles are done in echo.js, trying to do that here (again)
// makes them appear double

document.addEventListener('DOMContentLoaded', () => {


    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');
    const textarea = document.getElementById('textarea');
    const usersArea = document.getElementById('usersArea');
    const chatArea = document.getElementById('chatArea');
    const adminSearch = document.getElementById('adminSearch');
    const adminMove = document.getElementById('adminBtn');

    if(textarea) {
        textarea.value = '';
    }

    if (adminMove) {
        adminMove.addEventListener('click', () => {
            const adminCard = document.getElementById('adminCard');
            const path = document.getElementById('svgAdmin');
            //default close icon
            const svgArrowClose = "M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 " +
                "0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 " +
                "0v13a.5.5 0 0 1-.5.5";
            //open icon
            const svgArrowOpen = "M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 " +
                "8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 " +
                "7.5H9.5a.5.5 0 0 1 .5.5"


            // adminCard.classList.toggle('admin-card-hide');
            const centerCard = document.getElementById('chatCard');
            centerCard.classList.toggle('center-card');

            const isHidden = adminCard.classList.toggle('admin-card-hide');
            path.setAttribute('d', isHidden ? svgArrowOpen : svgArrowClose);

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

            let notif = e.target.closest('.notification');
            if (notif && notif.dataset.unread_count) {
                notif.textContent = '0';
                notif.dataset.unread_count = '0';
            }



            const userItem = e.target.closest('.user-list-item');
            if (userItem && userItem.dataset.chatId) {
                window.location.href = `/chat/${userItem.dataset.chatId}`;
            }
        });
    }

    const notifications = document.querySelectorAll('.notification');

    notifications.forEach(notif => {
        const count = parseInt(notif.dataset.unreadCount, 10) || 0;

        if (count > 0) {
            notif.classList.add('notif-glow');
        } else {
            notif.classList.remove('notif-glow');
        }
    });


    if (sendMessage && textarea && sendBtn) {

        // Submit via AJAX
        sendMessage.addEventListener('submit', async function (e) {
            e.preventDefault();

            const message = textarea.value.trim();
            if (!message) return;


            try {
                const response = await fetch(sendMessage.action, {
                    method: 'POST',
                    body: new FormData(sendMessage),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                });

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
