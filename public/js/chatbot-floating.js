const chatbotBtn = document.getElementById('chatbot-button');
const chatbotBox = document.getElementById('chatbot-box');
const closeChat = document.getElementById('close-chat');
const sendChat = document.getElementById('send-chat');
const chatInput = document.getElementById('chat-input');
const chatContent = document.getElementById('chat-content');

let isProcessing = false; // Prevent multiple requests

// Tampilkan atau sembunyikan chatbox
chatbotBtn.addEventListener('click', () => {
    chatbotBox.classList.toggle('d-none');
    if (!chatbotBox.classList.contains('d-none')) {
        chatInput.focus();
    }
});

closeChat.addEventListener('click', () => {
    chatbotBox.classList.add('d-none');
});

// Fungsi untuk menampilkan pesan
function addMessage(sender, message) {
    const messageElement = document.createElement('div');
    messageElement.className = `chat-message ${sender}`;

    const label = document.createElement('strong');
    label.textContent = sender === 'user' ? 'Anda: ' : 'Bot: ';

    const text = document.createElement('span');
    text.textContent = message;

    messageElement.appendChild(label);
    messageElement.appendChild(text);

    chatContent.appendChild(messageElement);
    chatContent.scrollTop = chatContent.scrollHeight;
}

// Fungsi untuk menampilkan loading
function showLoading() {
    const loadingElement = document.createElement('div');
    loadingElement.className = 'chat-message bot loading';
    loadingElement.innerHTML = '<strong>Bot: </strong><span>Mengetik...</span>';
    loadingElement.id = 'loading-indicator';
    chatContent.appendChild(loadingElement);
    chatContent.scrollTop = chatContent.scrollHeight;
}

// Fungsi untuk menghapus loading
function removeLoading() {
    const loadingElement = document.getElementById('loading-indicator');
    if (loadingElement) {
        loadingElement.remove();
    }
}

// Kirim pesan ke server Laravel
async function sendMessage() {
    const message = chatInput.value.trim();

    if (!message || isProcessing) return;

    // Set processing flag
    isProcessing = true;
    sendChat.disabled = true;
    chatInput.disabled = true;

    // Tampilkan pesan user
    addMessage('user', message);
    chatInput.value = '';

    // Tampilkan loading
    showLoading();

    try {
        const response = await fetch('/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({ message })
        });

        // Remove loading
        removeLoading();

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        // Ambil reply dari response - support berbagai format
        let reply = data.reply ||
                   data.response ||
                   data.choices?.[0]?.message?.content ||
                   data.message ||
                   "Maaf, saya tidak bisa memproses pesan ini.";

        // Tampilkan reply dari bot
        addMessage('bot', reply);

    } catch (error) {
        console.error('Error:', error);
        removeLoading();
        addMessage('bot', 'Maaf, terjadi kesalahan koneksi. Silakan coba lagi atau hubungi kami di (0343) 741027.');
    } finally {
        // Reset processing flag
        isProcessing = false;
        sendChat.disabled = false;
        chatInput.disabled = false;
        chatInput.focus();
    }
}

// Event listeners
sendChat.addEventListener('click', sendMessage);

chatInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
});

// Pesan sambutan saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    // Cek apakah elemen sudah ada
    if (chatContent && chatbotBtn && chatbotBox) {
        addMessage('bot', 'Halo! Saya asisten virtual SMKN 1 Bangil. Ada yang bisa saya bantu?');
    }
});
