let departamentoSeleccionado = '';

const cbxDepartamento = document.getElementById('departamento');
const cbxCiudad = document.getElementById('ciudad');
const cbxOperador = document.getElementById('operador');
const cbxDia = document.getElementById('dia');

cbxDepartamento.addEventListener('change', (event) => {
    departamentoSeleccionado = event.target.value;
    fetchData('views/claro.views/portabilidad/asesor/reporte/pais/getCiudad.php', { departamento: departamentoSeleccionado }, cbxCiudad);
});

cbxCiudad.addEventListener('change', (event) => {
    fetchData('views/claro.views/portabilidad/asesor/reporte/pais/getOperador.php', { departamento: departamentoSeleccionado, ciudad: event.target.value }, cbxOperador);
});

cbxOperador.addEventListener('change', (event) => {
    fetchData('views/claro.views/portabilidad/asesor/reporte/pais/getDia.php', { departamento: departamentoSeleccionado, operador: event.target.value }, cbxDia);
});

function fetchData(url, data, targetElement) {
    const formData = new FormData();
    for (const key in data) {
        formData.append(key, data[key]);
    }

    fetch(url, {
        method: "POST",
        body: formData,
        mode: 'cors'
    })
    .then(response => response.json())
    .then(data => {
        targetElement.innerHTML = data;
    })
    .catch(err => console.log(err));
}
