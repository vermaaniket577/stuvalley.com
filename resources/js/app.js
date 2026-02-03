import './bootstrap';
import './tech-animation.js';
import './gsap-animations.js';

// Header Interactivity (Mouse Tracking Glow)
const mainHeader = document.querySelector('header');
if (mainHeader) {
    mainHeader.addEventListener('mousemove', (e) => {
        const rect = mainHeader.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        mainHeader.style.setProperty('--mouse-x', `${x}px`);
        mainHeader.style.setProperty('--mouse-y', `${y}px`);
    });
}

// Initial interactive logic or other app-wide initializations can go here.
