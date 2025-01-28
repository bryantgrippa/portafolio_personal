const cbxDepartamento = document.getElementById('departamento');
const cbxCiudad = document.getElementById('ciudad');
const cbxOperador = document.getElementById('operador');
const cbxDia = document.getElementById('dia');

cbxDepartamento.addEventListener('change', () => fetchData('views/claro.views/tyt/asesor/reporte/pais/getCiudad.php', 'departamento', cbxCiudad));
cbxCiudad.addEventListener('change', () => fetchData('views/claro.views/tyt/asesor/reporte/pais/getOperador.php', 'ciudad', cbxOperador));
cbxOperador.addEventListener('change', () => fetchData('views/claro.views/tyt/asesor/reporte/pais/getDia.php', 'operador', cbxDia));

function fetchData(url, dataKey, targetElement) {
    const formData = new FormData();
    formData.append(dataKey, event.target.value);
    
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