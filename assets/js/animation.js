function etoile() {
    document.getElementsByClassName("animation")[0].style.opacity = "1";
    setTimeout(() => {
        document.getElementsByClassName("animation")[0].style.opacity = "0";
    }, 800);
    document.getElementsByClassName("animationClick")[0].animate([
        // keyframes
        { transform: 'translateY(0px)' },
        { transform: 'translateY(-300px)' }
    ], {
        // timing options
        duration: 1000,
        iterations: 1
    });
}