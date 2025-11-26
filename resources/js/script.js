document.addEventListener("DOMContentLoaded", () => {
    const chatArea = document.getElementById('chatArea');

    btmScroll();

    document.getElementById('sentMessageForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission
        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(response => response.json())
            .then(data => console.log('Success:', data))
            .catch(error => console.error('Error:', error));
    });

    // auto scroll to the bottom
    function btmScroll() {
        chatArea.scrollTop = chatArea.scrollHeight;
    }
});



