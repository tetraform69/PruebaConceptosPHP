function login(event) {
    event.preventDefault()
    let name = document.getElementById('username').value
    let password = document.getElementById('password').value

    let url = '/PruebaConceptosPHP/login'
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
        if (data.status == 'error') {
            document.getElementById('message').innerText = data.message
            document.getElementById('username').focus()
        } else{
            if(data.userRol == 'user'){
                location.href="/PruebaConceptosPHP/user"
            } else {
                location.href="/PruebaConceptosPHP/admin"
            }
        }
    })
}