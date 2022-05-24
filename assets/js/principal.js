var myModal = document.getElementById('modalProducto')
var myInput = document.getElementById('cantidad')

myModal.addEventListener('shown.bs.modal', function () {
   // Button that triggered the modal
  var button = event.relatedTarget
  var id = button.getAttribute('data-bs-id')
  var stock = button.getAttribute('data-bs-stock')
  var desc = button.getAttribute('data-bs-descripcion')
  var precio = button.getAttribute('data-bs-precio')
  var categoria = button.getAttribute('data-bs-categoria')
  var img = button.getAttribute('data-bs-img')
  var nombre = button.getAttribute('data-bs-nombre')


  myModal.querySelector('.precio-text').textContent=("$ " + precio)
  myModal.querySelector('.categoria-text').textContent=categoria
  myModal.querySelector('.desc-text').textContent=desc
  myModal.querySelector('.stock-text').textContent=stock
  myModal.querySelector('.stock-text').textContent=stock
  myModal.querySelector('.stock-text').textContent=stock
  myModal.querySelector('.modal-title').textContent=nombre
  myModal.querySelector('.img-text').src =("uploads/"+img);


  
})

