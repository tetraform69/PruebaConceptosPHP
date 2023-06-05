function editar() {
    inputs = document.querySelectorAll('input')
    buttons = document.querySelectorAll('button')
    inputs.forEach(input => {
        input.disabled = false
    })
    buttons.forEach(button => {
        button.disabled = false
    })
}

function actualizar() {
    inputs = document.querySelectorAll('input')
    buttons = document.querySelectorAll('button')
    inputs.forEach(input => {
        input.disabled = true
    })
    buttons.forEach(button => {
        button.disabled = true
    })
}