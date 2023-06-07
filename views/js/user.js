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

function update() {
    inputs = document.querySelectorAll('input')
    buttons = document.querySelectorAll('button')
    inputs.forEach(input => {
        input.disabled = true
    })
    buttons.forEach(button => {
        button.disabled = true
    })
}