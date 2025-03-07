export function slideDelayAnimation() {
    if (window.innerWidth >= 412) {
        gsap.fromTo('.slide-down-delay', {height: 0},
            {height: '300px', duration: 1, delay: .5, ease: 'power.out',
                scrollTrigger: {trigger: '.slide-down-delay', start: 'top center'}
        });
    }
}