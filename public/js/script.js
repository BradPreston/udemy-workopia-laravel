document.querySelector('#hamburger').addEventListener('click', () => {
    const menu = document.querySelector('#mobile-menu');
    menu.classList.toggle('hidden');
});

window.addEventListener('resize', function () {
    if (window.innerWidth >= 767) {
        document.querySelector('#mobile-menu').classList.add('hidden');
    }
});