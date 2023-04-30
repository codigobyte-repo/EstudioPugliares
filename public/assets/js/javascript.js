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
    slidesToShow: 1,
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

 
/* var image = document.getElementsByClassName('bg-fixed');
new simpleParallax(image, {
    orientation: 'right'
}); */

/* var image = document.getElementsByClassName('bg-fixed');
new simpleParallax(image, {
	scale: 1.5
}); */

window.addEventListener('scroll', function() {
    var nav = document.querySelector('nav');
    nav.classList.toggle('scroll-nav', window.scrollY > 0);
  });
  