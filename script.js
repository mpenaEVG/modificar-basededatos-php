const formulario = document.getElementById('formulario').addEventListener('submit', async function (event) {
  event.preventDefault()


  const formData = new FormData(this)

  try{
    const response = await fetch('verificarConexion.php', {
      method: 'POST',
      body: formData
    })

    if(response.ok){
      const result =  await response.json()
      if(result.success){
        window.location.href= 'index.php';
        alert(result.mensaje);
      }else{
        console.log(response)
        document.getElementById('resultado').innerHTML = result.mensaje;
      }
    }else{
        document.getElementById('resultado').innerHTML = 'Error al conectarse con el servidor'
    }
  }catch(error){
    console.error(error)
    document.getElementById('resultado').innerHTML = 'Error de conexión'
  }

  
})




