import './echo.js';

document.addEventListener("DOMContentLoaded", () => {

    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');
    const textarea = document.getElementById('textarea');
    textarea.value = '';

    // --- Submit message ---
    sendMessage.addEventListener('submit', function (e) {
        e.preventDefault();


        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(r => r.json())
            .then(data => console.log('Success:', data))
            .catch(err => console.error(err));

    });

    // --- Click and Enter key ---
    sendBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (textarea.value.trim()) {
            sendMessage.requestSubmit();
        }
        textarea.value = '';
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            if (textarea.value.trim()) {
                sendMessage.requestSubmit();
            }
            textarea.value = '';
        }
    });
    function amdinSearch(){
        const adminBtn = document.getElementById('adminBtn');

    }

    console.log(window.users);

    window.users.forEach(user => {
        console.log(user.name, user.email);
    });


    const usersArea = document.getElementById('usersArea');
    window.users.forEach(user => {
        usersArea.appendChild(
            createProfiles(
                user.name,
                user.email,
                ''
            )
        );
    })
    function createProfiles(onderwerpText = 'Onderwerp', userNameText = 'Gebruiker', imgSrc = '', ) {
        // main container
        const userList = document.createElement('div');
        userList.className = 'user-list-items';

        // profile image
        const userImg = document.createElement('img');
        userImg.className = 'userImg';
        userImg.src = imgSrc;
        userImg.alt = 'user';

        // text container
        const userInfo = document.createElement('div');
        userInfo.className = 'userInfo';

        // onderwerp
        const onderwerp = document.createElement('h5');
        onderwerp.className = 'onderwerp'; // SCSS handles text color and size
        onderwerp.textContent = onderwerpText;

        // username
        const userName = document.createElement('h6');
        userName.className = 'user-name';
        userName.textContent = userNameText;

        // build tree
        userInfo.appendChild(onderwerp);
        userInfo.appendChild(userName);

        userList.appendChild(userImg);
        userList.appendChild(userInfo);

        return userList;
    }

});
