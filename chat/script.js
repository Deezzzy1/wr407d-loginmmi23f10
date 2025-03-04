const messagesContainer = document.getElementById('messages');
const messageInput = document.getElementById('message-input');
const sendBtn = document.getElementById('send-btn');
const toggleThemeBtn = document.getElementById('toggle-theme-btn');
const galleryBtn = document.getElementById('gallery-btn');
const fileInput = document.getElementById('file-input');
const userPhoto = document.createElement('img');
userPhoto.src = 'images/avatar.png';  // Utilisation d'une image locale
userPhoto.alt = 'Photo de profil';


let isLightMode = false; // Par défaut : mode sombre

// Gestion de l'envoi des messages
sendBtn.addEventListener('click', sendMessage);

function sendMessage() {
    const messageText = messageInput.value.trim();

    if (messageText !== '') {
        addMessage(messageText, 'sent');
        messageInput.value = '';
        messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll automatique
    }
}
function sendMessage() {
    const messageText = messageInput.value.trim().toLowerCase();

    if (messageText !== '') {
        addMessage(messageText, 'sent');
        messageInput.value = '';
        messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll automatique

        console.log("Message envoyé:", messageText); // Vérifie le message dans la console

        if (messageText.includes('bon anniversaire') || messageText.includes('bon anniv')) {
            console.log("🎉 Animation d'anniversaire déclenchée !");
            triggerBirthdayAnimation();
        }
    }
}


function triggerBirthdayAnimation() {
    const confettiContainer = document.createElement('div');
    confettiContainer.classList.add('confetti-container');

    // Génération des confettis
    for (let i = 0; i < 50; i++) {
        let confetti = document.createElement('div');
        confetti.classList.add('confetti');
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 50%)`; // Couleurs aléatoires
        confetti.style.animationDuration = `${Math.random() * 3 + 2}s`; // Durée aléatoire
        confettiContainer.appendChild(confetti);
    }

    // Génération des ballons
    for (let i = 0; i < 5; i++) {
        let balloon = document.createElement('div');
        balloon.classList.add('balloon');
        balloon.style.left = Math.random() * 80 + 'vw';
        balloon.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 50%)`; // Couleurs aléatoires
        balloon.style.animationDuration = `${Math.random() * 5 + 3}s`; // Durée aléatoire
        confettiContainer.appendChild(balloon);
    }

    document.body.appendChild(confettiContainer);

    // Supprime l'animation après 5 secondes
    setTimeout(() => {
        confettiContainer.remove();
    }, 5000);
}



function addMessage(text, type, avatar) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', type);

    const userPhoto = document.createElement('img');
    userPhoto.src = avatar ? avatar : 'images/default.png';  // Vérifie que l'avatar existe ou utilise l'avatar par défaut
    userPhoto.alt = 'Photo de profil';

    const textElement = document.createElement('div');
    textElement.classList.add('text');
    textElement.textContent = text;

    messageElement.appendChild(userPhoto);
    messageElement.appendChild(textElement);
    messagesContainer.appendChild(messageElement);
}


messageInput.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        sendMessage();
    }
});

// Gestion du changement de thème
toggleThemeBtn.addEventListener('click', toggleTheme);

function toggleTheme() {
    document.body.classList.toggle('light-mode');
    isLightMode = !isLightMode;
    toggleThemeBtn.textContent = isLightMode ? '🌙' : '🌞';
}

// Gestion du bouton galerie
galleryBtn.addEventListener('click', () => {
    fileInput.click(); // Ouvre la boîte de sélection de fichier
});

fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            addImageMessage(e.target.result, 'sent'); // Ajoute l'image comme message
        };

        reader.readAsDataURL(file); // Lit le fichier comme une URL de données
    }
});

function addImageMessage(imageSrc, type) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', type);

    const userPhoto = document.createElement('img');
    userPhoto.src = type === 'sent' 
        ? 'https://via.placeholder.com/40/006eff' // Image utilisateur A
        : 'https://via.placeholder.com/40/ff0000'; // Image utilisateur B
    userPhoto.alt = 'Photo de profil';

    const imageElement = document.createElement('img');
    imageElement.src = imageSrc;
    imageElement.alt = 'Image envoyée';
    imageElement.style.maxWidth = '200px';
    imageElement.style.borderRadius = '10px';

    messageElement.appendChild(userPhoto);
    messageElement.appendChild(imageElement);
    messagesContainer.appendChild(messageElement);

    messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll automatique
}
