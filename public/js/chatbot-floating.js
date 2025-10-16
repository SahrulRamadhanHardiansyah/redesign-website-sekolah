// Chatbot Floating Window
document.addEventListener('DOMContentLoaded', function() {
    const chatbotBtn = document.getElementById('chatbot-button');
    const chatbotBox = document.getElementById('chatbot-box');
    const closeChat = document.getElementById('close-chat');
    const chatInput = document.getElementById('chat-input');
    const sendChat = document.getElementById('send-chat');
    const chatContent = document.getElementById('chat-content');

    // Toggle chatbot
    chatbotBtn.addEventListener('click', () => {
        chatbotBox.classList.remove('d-none');
        chatbotBtn.style.display = 'none';
        chatInput.focus();

        // Show welcome message if first time
        if (chatContent.children.length === 0) {
            addMessage('Halo! Saya asisten virtual SMKN 1 Bangil. Ada yang bisa saya bantu?', 'bot');
        }
    });

    // Close chatbot
    closeChat.addEventListener('click', () => {
        chatbotBox.classList.add('d-none');
        chatbotBtn.style.display = 'flex';
    });

    // Send message on button click
    sendChat.addEventListener('click', sendMessage);

    // Send message on Enter key
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    function sendMessage() {
        const message = chatInput.value.trim();

        if (!message) {
            return;
        }

        // Add user message to chat
        addMessage(`Anda: ${message}`, 'user');

        // Clear input
        chatInput.value = '';

        // Show typing indicator
        const typingIndicator = addMessage('Bot sedang mengetik...', 'bot typing');

        // Disable input while processing
        chatInput.disabled = true;
        sendChat.disabled = true;

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        // Send to server
          fetch('/chatbot', {
            method: 'POST',
            credentials: 'same-origin', // <-- tambahkan ini
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ message: message }),
        })
        .then(async response => {
            console.log('Response status:', response.status);
            const contentType = response.headers.get('Content-Type') || '';
            const text = await response.text();
            let data;
            try {
                data = contentType.includes('application/json') ? JSON.parse(text) : { raw: text };
            } catch (err) {
                console.error('Failed to parse JSON:', err, 'raw:', text);
                data = { raw: text };
            }
            if (!response.ok) {
                console.error('Error response:', data);
                throw new Error(data.message || data.error || data.raw || 'Network response was not ok');
            }
            return data;
        })
        .then(data => {
            // Remove typing indicator
            typingIndicator.remove();

            // Add bot response
            const reply = data.reply || data.choices?.[0]?.message?.content || data.raw || 'Maaf, saya tidak bisa memproses pesan Anda.';
            addMessage(`Bot: ${reply}`, 'bot');
        })
        .catch(error => {
            console.error('Error:', error);
            typingIndicator.remove();
            addMessage('Maaf, terjadi kesalahan. Silakan coba lagi. (' + (error.message || '') + ')', 'bot error');
        })
        .finally(() => {
            // Re-enable input
            chatInput.disabled = false;
            sendChat.disabled = false;
            chatInput.focus();
        });
    }

    function addMessage(text, className) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `chat-message ${className}`;
        messageDiv.textContent = text;
        chatContent.appendChild(messageDiv);

        // Scroll to bottom
        chatContent.scrollTop = chatContent.scrollHeight;

        return messageDiv;
    }
});
