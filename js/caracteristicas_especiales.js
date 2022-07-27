// Modal de filtros.
const openModal = document.querySelector('.container-responsive-filter');
const modal = document.querySelector('.modal');

openModal.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.add('modal--show');
});
modal.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal')) 
        modal.classList.remove('modal--show')
});
