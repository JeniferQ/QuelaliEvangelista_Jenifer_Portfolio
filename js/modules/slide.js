
export function slideAnimation() {
    const slideUp = document.querySelectorAll('.slide-up'),
    slideDown = document.querySelectorAll('.slide-down');

    gsap.registerPlugin(ScrollTrigger);

    if (window.innerWidth >= 412) {
        slideUp.forEach(container => {
            gsap.fromTo(container, {opacity: 0, y: 50},
                {opacity: 1, y: 0, duration: 1, ease: 'power.out',
                    scrollTrigger: {trigger: container, start: 'top center'}
                });
        });
    
        slideDown.forEach(container => {
            gsap.fromTo(container, {opacity: 0, y: -50},
                {opacity: 1, y: 0, duration: 1, ease: 'power.out',
                    scrollTrigger: {trigger: container, start: 'top center'}
                });
        });
    }
}