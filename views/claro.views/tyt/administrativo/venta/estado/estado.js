const cbxDetalles = document.getElementById('detalles')
cbxDetalles.addEventListener('change', getSubEstados)

const cbxSubEstados = document.getElementById('subestados');

function fetchAndSetData(url, formData, targetElemt) {
    return fetch(url, {
        method: "POST",
        body: formData,
        mode: 'cors'
    })
    .then(response=> response.json())
    .then(data => {
        targetElemt.innerHTML = data
    })
    .catch(err => console.log(err))
}

function getSubEstados(){
    let detalles = cbxDetalles.value
    let url = 'views/claro.views/tyt/administrativo/venta/estado/getSubEstados.php'

    let formData = new FormData()
    formData.append('detalles', detalles)

    fetchAndSetData(url, formData, cbxSubEstados)
}