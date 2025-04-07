document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formMateriaPrima");

    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        const datos = new FormData(formulario);

        fetch("../php/registrar_materia_prima.php", {
            method: "POST",
            body: datos,
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "ok") {
                alert("Registro exitoso");

                formulario.reset(); // ✅ Limpiar formulario

                listarMateriaPrima(); // ✅ Recargar tabla
            } else {
                alert("Error al registrar: " + data);
            }
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
        });
    });

    listarMateriaPrima(); // ✅ Carga inicial de la tabla
});

function listarMateriaPrima() {
    fetch("../php/listar_materia_prima.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("tablaMateriaPrima").innerHTML = data;
        })
        .catch(error => {
            console.error("Error al listar:", error);
        });
}
