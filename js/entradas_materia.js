document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formEntradaMateria");
    const tabla = document.getElementById("tablaEntradas");
    const selectMateria = document.getElementById("materia_id");

    cargarMaterias();
    cargarHistorial();

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("php/registrar_entrada.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Entrada registrada correctamente");
                form.reset();
                cargarHistorial();
            } else {
                alert("Error: " + data.error);
            }
        })
        .catch(error => console.error("Error:", error));
    });

    function cargarMaterias() {
        fetch("php/listar_materia_prima.php")
        .then(response => response.json())
        .then(data => {
            selectMateria.innerHTML = "";
            data.forEach(item => {
                const option = document.createElement("option");
                option.value = item.id;
                option.textContent = item.nombre;
                selectMateria.appendChild(option);
            });
        })
        .catch(error => console.error("Error al cargar materias:", error));
    }

    function cargarHistorial() {
        fetch("php/listar_entradas.php")
        .then(response => response.json())
        .then(data => {
            tabla.innerHTML = "";
            data.forEach(item => {
                const fila = `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.nombre}</td>
                        <td>${item.cantidad}</td>
                        <td>${item.fecha}</td>
                    </tr>
                `;
                tabla.innerHTML += fila;
            });
        })
        .catch(error => console.error("Error al cargar historial:", error));
    }
});
