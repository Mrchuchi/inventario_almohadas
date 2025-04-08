document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formProduccion');
    const mensaje = document.getElementById('mensajeProduccion');
    const tablaBody = document.querySelector('table tbody');

    // Función para cargar historial de producción
    function cargarHistorial() {
        fetch('../php/listar_produccion.php')
            .then(response => response.json())
            .then(data => {
                tablaBody.innerHTML = '';
                if (data.length === 0) {
                    tablaBody.innerHTML = '<tr><td colspan="5">No hay registros.</td></tr>';
                } else {
                    data.forEach(item => {
                        const fila = document.createElement('tr');
                        fila.innerHTML = `
                            <td>${item.id}</td>
                            <td>${item.receta}</td>
                            <td>${item.cantidad_producida}</td>
                            <td>${item.fecha}</td>
                            <td><button class="btn-eliminar" data-id="${item.id}">Eliminar</button></td>
                        `;
                        tablaBody.appendChild(fila);
                    });
                }
            })
            .catch(err => {
                console.error('Error al cargar historial:', err);
                tablaBody.innerHTML = '<tr><td colspan="5">Error al cargar datos.</td></tr>';
            });
    }

    // Cargar historial al inicio
    cargarHistorial();

    // Manejo de formulario
    form.addEventListener('submit', e => {
        e.preventDefault();
        const formData = new FormData(form);

        fetch('../php/registrar_produccion.php', {
            method: 'POST',
            body: formData
        })
            .then(res => res.text())
            .then(respuesta => {
                if (respuesta.trim() === 'ok') {
                    mensaje.textContent = 'Producción registrada correctamente.';
                    mensaje.className = 'ok';
                    form.reset();
                    cargarHistorial();
                } else {
                    mensaje.textContent = 'Error: ' + respuesta;
                    mensaje.className = 'error';
                }
            })
            .catch(err => {
                console.error('Error al registrar producción:', err);
                mensaje.textContent = 'Error al registrar.';
                mensaje.className = 'error';
            });
    });

    // Delegar evento para eliminar
    tablaBody.addEventListener('click', e => {
        if (e.target.classList.contains('btn-eliminar')) {
            const id = e.target.getAttribute('data-id');
            if (confirm('¿Estás seguro de eliminar esta producción?')) {
                const formData = new FormData();
                formData.append('id', id);

                fetch('../php/eliminar_produccion.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(res => res.text())
                    .then(respuesta => {
                        if (respuesta.trim() === 'ok') {
                            cargarHistorial();
                        } else {
                            alert('Error al eliminar: ' + respuesta);
                        }
                    })
                    .catch(err => {
                        console.error('Error al eliminar:', err);
                        alert('Error al eliminar.');
                    });
            }
        }
    });
});
