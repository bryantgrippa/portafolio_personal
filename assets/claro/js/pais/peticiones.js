const cbxDepartamento = document.getElementById("departamento");
cbxDepartamento.addEventListener("change", getCiudad);

const cbxCiudad = document.getElementById("ciudad");
cbxCiudad.addEventListener("change", getOperador);

const cbxOperador = document.getElementById("operador");
cbxOperador.addEventListener("change", getDia);

const cbxDia = document.getElementById("dia");

function fetchAndSetData(url, formData, targetElemt) {
  return fetch(url, {
    method: "POST",
    body: formData,
    mode: "cors",
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      if (data.error) {
        throw new Error(data.error);
      }
      if (data.length > 0) {
        targetElemt.innerHTML = data.map(item => `<option value="${item.value}">${item.label}</option>`).join('');
      } else {
        targetElemt.innerHTML = '<option value="" selected disabled>No options available</option>';
      }
    })
    .catch((err) => console.error("Fetch error:", err));
}

function getCiudad() {
  let departamento = cbxDepartamento.value;
  let url = "assets/js/pais/getCiudad.php";
  let formData = new FormData();
  formData.append("departamento", departamento);

  fetchAndSetData(url, formData, cbxCiudad);
}

function getOperador() {
  let ciudad = cbxCiudad.value;
  let url = "assets/js/pais/getOperador.php";
  let formData = new FormData();
  formData.append("ciudad", ciudad);

  fetchAndSetData(url, formData, cbxOperador);
}

function getDia() {
  let operador = cbxOperador.value;
  let url = "assets/js/pais/getDia.php";
  let formData = new FormData();
  formData.append("operador", operador);

  fetchAndSetData(url, formData, cbxDia);
}
