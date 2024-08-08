import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('livewire:load', function () {
    Livewire.on('pdfGenerationStarted', function () {
        alert('La generación del PDF ha comenzado.');
    });
});

