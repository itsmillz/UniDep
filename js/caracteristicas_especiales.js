// Modal de filtros.
const openModal = document.getElementById('filtros-btn');
const modal = document.querySelector('.contenedor-oscuro');


openModal.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.add('mostrar-modal');
});
modal.addEventListener('click', (e) => {
    if (e.target.classList.contains('contenedor-oscuro')) 
        modal.classList.remove('mostrar-modal')
});