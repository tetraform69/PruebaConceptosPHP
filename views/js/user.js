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

function settings() {
    inputs = document.querySelectorAll('input')
    buttons = document.querySelectorAll('button')
    inputs.forEach(input => {
        input.disabled = false
    })
    buttons.forEach(button => {
        button.disabled = false
    })
}

function update(event) {
    event.preventDefault()
    inputs = document.querySelectorAll('input')
    buttons = document.querySelectorAll('button')
    inputs.forEach(input => {
        input.disabled = true
    })
    buttons.forEach(button => {
        button.disabled = true
    })

    let id = document.getElementById('userID').value
    let name = document.getElementById('username').value
    let password = document.getElementById('password').value
    
    let url = `/PruebaConceptosPHP/user/${id}`
    
    let data = {
        "name": name,
        "pasword": password
    }

    let options = {
        method: 'PATCH',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }

    fetch(url, options)
        .then(res => res.json())
        .then(data => {
            alert(data)
        })
}

function deleted(){
    let id = document.getElementById('userID').value
    
    let url = `/PruebaConceptosPHP/user/delete?id=${id}`

    let options = {
        method: 'DELETE'
    }

    fetch(url, options)
        .then(res => res.json())
        .then(data => {
            alert("Eliminado")
            logout()
        })
}

function logout() {
    fetch('/PruebaConceptosPHP/logout')
        .then(res => res.json())
        .then(data => {
            location.href = "/PruebaConceptosPHP/login"
        })
}
