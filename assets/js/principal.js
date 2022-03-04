const inicio=document.querySelector('#inicio');
const contacto=document.querySelector('#contacto');
const nosotros=document.querySelector('#nosotros');
const productos=document.querySelector('#productos');
const items=document.querySelectorAll('.nav-link');

function navbar(item){
    item.addEventListener('click', function(){
        for(var item of items){
            item.classList.remove('active');
        }

        item.classList.add('active');
    })
}

navbar(inicio);
navbar(contacto);
navbar(nosotros);
navbar(productos);
