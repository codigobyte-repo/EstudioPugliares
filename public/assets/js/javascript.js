/* Efecto que escribe y borra texto */
const cambioTexto = document.getElementById('cambio-texto');

const textos = ['Logro ', 'Triunfo', 'Éxito '];
let indice = 0;
let estado = 'escribiendo';
let textoActual = '';

function escribirTexto() {
    textoActual = textos[indice].substring(0, textoActual.length + 1);
    cambioTexto.textContent = textoActual;

    if (textoActual === textos[indice]) {
        estado = 'borrando';
        setTimeout(borrarTexto, 1000);
    } else {
        setTimeout(escribirTexto, 100);
    }
}

function borrarTexto() {
    textoActual = textos[indice].substring(0, textoActual.length - 1);
    cambioTexto.textContent = textoActual;

    if (textoActual === '') {
        estado = 'escribiendo';
        indice++;

        if (indice === textos.length) {
            indice = 0;
        }

        setTimeout(escribirTexto, 500);
    } else {
        setTimeout(borrarTexto, 100);
    }
}

escribirTexto();


/* Glider */
new Glider(document.querySelector('.glider'), {
    slidesToShow: 1.5,
    slidesToScroll: 1,
    draggable: true,
    dots: '.dots',
    arrows: {
      prev: '.glider-prev',
      next: '.glider-next'
    },
    responsive: [
        {
            breakpoint: 640,
            settings: {
                slidesToShow: 1.5,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1.5,
                slidesToScroll: 2,
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2.5,
                slidesToScroll: 2,
            }
        },
        {
            breakpoint: 1280,
            settings: {
                slidesToShow: 3.5,
                slidesToScroll: 3,
            }
        },
    ]
});


/* Particulas Js */
particlesJS('particles-js', {
    "particles": {
        "number": {
            "value": 6,
            "density": {
                "enable": true,
                "value_area": 800
            }
        },
        "color": {
            "value": "#1b1e34"
        },
        "shape": {
            "type": "polygon",
            "stroke": {
                "width": 0,
                "color": "#000"
            },
            "polygon": {
                "nb_sides": 6
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": 0.2,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 1,
                "opacity_min": 0.1,
                "sync": false
            }
        },
        "size": {
            "value": 160,
            "random": false,
            "anim": {
                "enable": true,
                "speed": 10,
                "size_min": 40,
                "sync": false
            }
        },
        "line_linked": {
            "enable": false,
            "distance": 200,
            "color": "#ffffff",
            "opacity": 1,
            "width": 2
        },
        "move": {
            "enable": true,
            "speed": 8,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": false,
                "mode": "grab"
            },
            "onclick": {
                "enable": false,
                "mode": "push"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 400,
                "line_linked": {
                    "opacity": 1
                }
            },
            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3
            },
            "repulse": {
                "distance": 200,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": true
});


function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
       const sectionTop = section.getBoundingClientRect().top + window.pageYOffset;
       window.scrollTo({
          top: sectionTop,
          behavior: 'smooth'
       });
    }
 }