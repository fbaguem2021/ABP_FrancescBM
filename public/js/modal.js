const exampleModal = document.getElementById('modalBorrar')
exampleModal.addEventListener('show.bs.modal', event => {

  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const siglas = button.getAttribute('data-bs-siglas')
  const action = button.getAttribute('data-bs-action')
  //button.setAttribute('data-bs-asdfg', 'hola mundo');
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalText = exampleModal.querySelector('.modal-body p')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')
  const modalForm = exampleModal.querySelector('.modal-footer form')


  modalTitle.textContent = 'Esborrar curs'
  modalText.textContent = `Seguro que quieres borrar el curso ${siglas}`
  modalForm.setAttribute('action', action);
  //modalBodyInput.value = siglas
})
