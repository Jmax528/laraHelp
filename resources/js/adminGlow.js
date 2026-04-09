import {createMessage} from "./echo.js";

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.user-list-item').forEach(item => {
        const notif = item.querySelector('.notification-count');

        const unread = notif ? parseInt(notif.dataset.unreadCount, 10) || 0 : 0;
        const close = parseInt(item.dataset.closeRequest, 10) || 0;

        // PRIORITY: close request overrides everything
        if (close === 1) {
            item.classList.add('chat-close');
            item.classList.remove('notification');

            if (notif) {
                notif.classList.add('close-glow');
                notif.classList.remove('notif-glow');
            }

            return;
        }

        // Normal unread notification
        if (unread > 0) {
            item.classList.add('notification');

            if (notif) {
                notif.classList.add('notif-glow');
            }
        } else {
            item.classList.remove('notification');

            if (notif) {
                notif.classList.remove('notif-glow');
            }
        }

    });
});


// ==============================
// ADMIN: Message notifications
// ==============================
if (window.isAdmin) {
    window.Echo.private('admin.notification')
        .listen('.message.sent', (e) => {
            console.log("Admin notification received:", e);
            updateAdminCounter(e);
        });
}

// Update unread counter + glow
function updateAdminCounter(e) {
    const userItem = document.querySelector(
        `.user-list-item[data-chat-id="${e.chat_id}"]`
    );

    if (!userItem) return;

    const notif = userItem.querySelector('.notification-count');
    if (!notif) return;

    const count = parseInt(e.unread_count, 10) || 0;

    notif.textContent = count > 99 ? '99+' : count.toString();
    notif.dataset.unreadCount = count;

    // Only apply notification if NOT closed
    const isClosed = userItem.classList.contains('chat-close');

    if (!isClosed && count > 0) {
        userItem.classList.add('notification');
        notif.classList.add('notif-glow');
    } else {
        userItem.classList.remove('notification');
        notif.classList.remove('notif-glow');
    }


    // if (close === 1) {
    //     item.classList.add('chat-close');
    //     item.classList.remove('notification');
    //
    //     if (notif) {
    //         notif.classList.add('close-glow');
    //         notif.classList.remove('notif-glow');
    //     }
    //
    //     return;
    // }
}


// ==============================
// ADMIN: Close request listener
// ==============================
if (window.isAdmin) {
    window.Echo.private('admin.notification')
        .listen('.close.request', (e) => {
            console.log('close request received:', e);

            updateCloseRequestUI(e);

            createCloseMessage(e);
        });
}

// Apply close request UI (RED)
function updateCloseRequestUI(e) {
    const userItem = document.querySelector(

        `.user-list-item[data-chat-id="${e.chat_id}"]`

    );

    if (!userItem) return;

    const notif = userItem.querySelector('.notification-count');

    if (e.close_request) {
        userItem.classList.add('chat-close');
        userItem.classList.remove('notification');

        if (notif) {
            notif.classList.add('close-glow');
            notif.classList.remove('notif-glow');
        }
    } else {
        userItem.classList.remove('chat-close');

        if (notif) {
            notif.classList.remove('close-glow');
        }
    }
}

function createCloseMessage(e) {
    createMessage({
        system_message: true,
        message: 'De gebruiker heeft aangegeven dat ze deze chat wil sluiten.'

    })
}


// ==============================
// USER ACTION: Send close request
// ==============================
const closeBtn = document.getElementById('closeRequest');

if (closeBtn) {
    closeBtn.addEventListener('click', function () {
        const chatId = this.dataset.chatId;

        fetch(`/chat/${chatId}/close-request`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ close_request: true })
        })
            .then(res => res.json())
            .then(data => {
                console.log('close request sent', data);
            })
            .catch(err => console.error(err));
    });
}
