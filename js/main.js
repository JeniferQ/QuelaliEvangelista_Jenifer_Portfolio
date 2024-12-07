(() => {
    const burger = document.querySelector('#burger img'),
    menu = document.querySelector('#menu'),
    body = document.querySelector('body');

    const player = new Plyr('video');
    
    function removeMenu() {
        body.style.overflow = 'auto';
        menu.classList.remove('open');
        burger.classList.remove('rotate');
    }
        
    function toggleMenu() {
        if (window.innerWidth <= 768) {
            menu.classList.toggle('open');
            burger.classList.toggle('rotate');
        
            if (menu.classList.contains('open')) {
                body.style.overflow = 'hidden';
            }

            else {
                console.log('close mobile menu');
                removeMenu(); }
        }
    }
    
    function resizeMenu() {
        if (window.innerWidth >= 768) {
            removeMenu();
        }
    }

    burger.addEventListener('click', toggleMenu);
    window.addEventListener('resize', resizeMenu);
})();

console.log('JS is working');