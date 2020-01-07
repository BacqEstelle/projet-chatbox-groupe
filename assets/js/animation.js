            function animation() {
                document.getElementsByClassName("animation")[0].style.opacity = "1";
                document.getElementById("linkAudio").play();
                setTimeout(() => {
                    document.getElementsByClassName("animation")[0].style.opacity = "0";
                }, 1200);
                document.getElementsByClassName("animationClick")[0].animate([
                    // keyframes
                    { transform: 'translateY(150px)' },
                    { transform: 'translateY(-100px)' }
                ], {
                    // timing options
                    duration: 1000,
                    iterations: 1
                });

            }