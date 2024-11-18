'use strict'

function mostrar(input){

  const campoPassword = document.getElementById(input)
  
  if(campoPassword.type === 'password'){

    campoPassword.type = 'text'
  }else {
    campoPassword.type = 'password'
  }
}
