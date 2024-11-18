'use strict';

function verificar() {
  const confirmar = confirm("¿Desea crear un usuario?")

  if (!confirmar) {
    return false
  }

  const campoPassword = document.getElementById('contrasena').value
  const segundaPassword = document.getElementById('repiteContrasena').value

  if (campoPassword !== segundaPassword) {
    alert("Las contraseñas no coinciden. Por favor, revisa los campos.")
    return false
  }

  return true
}


function presionado(input){
  const campo = document.getElementById(input)
  campo.type = 'text'
}

function detener(input){
  const campo = document.getElementById(input)
  campo.type='password'
}
