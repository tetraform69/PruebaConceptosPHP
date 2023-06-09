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

function canUpdate() {
    inputs = document.querySelectorAll('input')
    buttons = document.querySelectorAll('button')
    inputs.forEach(input => {
        input.disabled = true
    })
    buttons.forEach(button => {
        button.disabled = true
    })
}

function logout(){
    fetch('/PruebaConceptosPHP/logout')
    .then(res => res.json())
    .then(data => {
        location.href = "/PruebaConceptosPHP/login"
    })
}