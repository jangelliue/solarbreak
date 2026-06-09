// =========================================================
// Solar Break - Script global
// Archivo: js/script.js
// =========================================================

document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const nav = document.querySelector('[data-site-nav]');

    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function () {
            nav.classList.toggle('is-open');
        });
    }

    const alerts = document.querySelectorAll('[data-auto-hide]');
    alerts.forEach(function (alert) {
        const delay = parseInt(alert.dataset.autoHide || '5000', 10);
        setTimeout(function () {
            alert.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-6px)';
            setTimeout(function () {
                alert.remove();
            }, 300);
        }, delay);
    });

    const smoothLinks = document.querySelectorAll('a[href^="#"]');
    smoothLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (!targetId || targetId === '#') return;
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                if (nav && nav.classList.contains('is-open')) {
                    nav.classList.remove('is-open');
                }
            }
        });
    });
});
