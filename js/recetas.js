document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formReceta");

    function cargarRecetas() {
        fetch("../php/listar_recetas.php")
            .then(response => response.json())
            .then(data => {
                const tabla = document.getElementById("tablaRecetas");
                tabla.innerHTML = "";

                data.forEach(receta => {
                    const fila = document.createElement("tr");

                    fila.innerHTML = `
                        <td>${receta.nombre_receta}</td>
                        <td>${receta.nombre_materia_prima}</td>
                        <td>${receta.cantidad_por_unidad}</td>
                        <td>
                            <button class="btn-eliminar" data-id="${receta.id}">Eliminar</button>
                        </td>
                    `;

                    tabla.appendChild(fila);
                });

                document.querySelectorAll(".btn-eliminar").forEach(btn => {
                    btn.addEventListener("click", () => {
                        const id = btn.getAttribute("data-id");
                        if (confirm("¿Estás seguro de eliminar esta receta?")) {
                            fetch(`../php/eliminar_receta.php?id=${id}`)
                                .then(res => res.text())
                                .then(res => {
                                    if (res.trim() === "ok") {
                                        cargarRecetas();
                                    }
                                });
                        }
                    });
                });
            })
            .catch(err => console.error("Error al cargar recetas:", err));
    }

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const datos = new FormData(form);

        fetch("../php/crear_receta.php", {
            method: "POST",
            body: datos
        })
        .then(res => res.text())
        .then(res => {
            if (res.trim() === "ok") {
                form.reset();
                cargarRecetas();
            } else {
                alert("Error al crear receta: " + res);
            }
        });
    });

    cargarRecetas();
});
