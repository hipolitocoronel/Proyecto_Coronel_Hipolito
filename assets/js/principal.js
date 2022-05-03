var myModal = document.getElementById('modalProducto')
var myInput = document.getElementById('cantidad')
var myForm = document.getElementById('form-vender');


myModal.addEventListener('shown.bs.modal', function () {
   // Button that triggered the modal
  var button = event.relatedTarget
  var stock = button.getAttribute('data-bs-stock')
  var desc = button.getAttribute('data-bs-descripcion')
  var precio = button.getAttribute('data-bs-precio')
  var categoria = button.getAttribute('data-bs-categoria')
  var img = button.getAttribute('data-bs-img')
  var nombre = button.getAttribute('data-bs-nombre')
  var id = button.getAttribute('data-bs-id')

  var cantidadInput= document.getElementById('cantidad');
console.log(cantidadInput.classList.remove('is-invalid'));

  console.log(id);

  console.log(document.querySelectorAll('[name="id"]')[0].value=id)
  console.log(document.querySelectorAll('[name="precio"]')[0].value=precio)
  console.log(document.querySelectorAll('[name="stock"]')[0].value=stock)
  console.log(document.querySelectorAll('[name="nombre"]')[0].value=nombre)

  


  

  myModal.querySelector('.precio-text').textContent=("$ " + precio)
  myModal.querySelector('.categoria-text').textContent=categoria
  myModal.querySelector('.desc-text').textContent=desc
  myModal.querySelector('.stock-text').textContent=stock
  myModal.querySelector('.modal-title').textContent=nombre
  myModal.querySelector('.img-text').src =("uploads/"+img);


  
})




