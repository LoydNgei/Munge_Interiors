document.addEventListener('DOMContentLoaded', () => {
    const alertMessage = document.querySelector('.alert-message');
    
    if (alertMessage) {
        setTimeout(() => {
            alertMessage.style.animation = 'slideOut 0.5s forwards';
        }, 3000); // Adjust time as needed (e.g., 3 seconds)
    }
});
