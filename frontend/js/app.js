const loginForm = document.getElementById('loginForm')

loginForm.addEventListener('submit', () => {
    const usuario = document.getElementById('usuario').value
    const password = document.getElementById('password').value

    fetch('../backend/index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'aplication/x-www-form-ur-lencoded'
        },
        body: `usuario = ${usuario}&password=${password}`
    }).then((Response) => Response.json())
    .then((result) => {
        console.log('RESULT--> ', result)
    })
    .catch((error) => {
        console.log('ERROR!= ', error)
    })
})