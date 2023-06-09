modalContainer = document.getElementById(`modal-container`)
modalContainer.addEventListener('click', (event) => {
    if (event.target == modalContainer) {
        modalContainer.style.visibility = "hidden"
        let modals = document.querySelectorAll('div.modal')
        modals.forEach(modal => {
            modal.style.display = "none"
        });
    }
})

chek = document.getElementById('check')
chek.addEventListener('change', ()=>{
    console.log(chek.checked);
    labelCheck = document.getElementById('check-label')
    chek.checked? labelCheck.innerText = 'active': labelCheck.innerText = 'inactive'
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