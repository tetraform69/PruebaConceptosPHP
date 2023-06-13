modalContainer = document.getElementById(`modal-container`)
modalContainer.addEventListener('click', (event) => {
    if (event.target == modalContainer) {
        modalContainer.style.visibility = "hidden"
        let modals = document.querySelectorAll('.modal')
        modals.forEach(modal => {
            modal.style.display = "none"
        });
    }
})

chek = document.getElementById('check')
chek.addEventListener('change', () => {
    labelCheck = document.getElementById('check-label')
    chek.checked ? labelCheck.innerText = 'active' : labelCheck.innerText = 'inactive'
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

function logout() {
    fetch('/PruebaConceptosPHP/logout')
        .then(res => res.json())
        .then(data => {
            location.href = "/PruebaConceptosPHP/login"
        })
}

function created(event) {
    event.preventDefault()
    let name = document.getElementById('createUsername').value
    let password = document.getElementById('createPassword').value
    let url = '/PruebaConceptosPHP/user/create'

    let data = {
        "name": name,
        "pasword": password
    }

    let options = {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }

    fetch(url, options)
        .then(res => res.json())
        .then(data => {
            read()
            closeModal('create')
        })
}

function read() {
    let url = '/PruebaConceptosPHP/users'

    fetch(url)
        .then(res => res.json())
        .then(data => {
            html = ""
            data.forEach(user => {
                html += `
            <div class="row">
            <p>${user.id}</p>
            <p>${user.name}</p>
            <p>${user.estado == 1 ? "active" : "inactive"}</p>
            <div class="buttons">
                <button onclick="preUpdate('${user.id}')">Edit</button>
                <button onclick="openModal('delete')">Delete</button>
            </div>
            </div>`
            });
            document.getElementById('body-table').innerHTML = html
        })
}

function preUpdate(id) {
    openModal('update')
    localStorage.id = id

    let url = `/PruebaConceptosPHP/user?id=${id}`

    fetch(url)
        .then(res => res.json())
        .then(data => {
            document.getElementById('updateUsername').value = data[0].name
            document.getElementById('updatePassword').value = data[0].pasword
            labelCheck = document.getElementById('check-label')
            if (data[0].estado == 1) {
                chek.checked = true
                labelCheck.innerText = 'Active'
            } else {
                chek.checked = false
                labelCheck.innerText = 'Inactive'
            }
        })
}

function updated(event) {
    event.preventDefault()

    id = localStorage.id
    let name = updateUsername.value
    let password = updatePassword.value
    let estado = chek.checked ? "1" : "0"

    let url = `/PruebaConceptosPHP/user/${id}`

    let data = {
        "name": name,
        "pasword": password,
        "estado": estado
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
            read()
            closeModal('update')
            alert(data)
        })
}

function deleted() {

}

read()