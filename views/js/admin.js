modalContainer = document.getElementById(`modal-container`)
modalContainer.addEventListener('click', () => {
    modalContainer.style.visibility = "hidden"
    let modals = document.querySelectorAll('div.modal')
    modals.forEach(modal => {
        modal.style.display = "none"
    });
})

function openModal(id) {
    let modal = document.getElementById(`modal-${id}`)
    modalContainer.style.visibility = "visible"
    modal.style.display = "flex"
}

function closeModal(id) {
    let modal = document.getElementById(`modal-${id}`)
    modalContainer.style.visibility = "hidden"
    modal.style.display = "none"
}