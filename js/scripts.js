document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('form-materia');
  const tabla = document.getElementById('tabla-materia');

  // Función para cargar la tabla desde PHP
  function cargarMateriaPrima() {
      fetch('../php/listar_materia_prima.php')
          .then(response => response.json())
          .then(data => {
              tabla.innerHTML = '';

              data.forEach(item => {
                  const fila = document.createElement('tr');
                  fila.innerHTML = `
                      <td>${item.id}</td>
                      <td>${item.nombre}</td>
                      <td>${item.cantidad}</td>
                      <td>${item.unidad}</td>
                      <td>
                          <button class="btn btn-editar" onclick="editar(${item.id})">Editar</button>
                          <button class="btn btn-rojo" onclick="eliminar(${item.id})">Eliminar</button>
                      </td>
                  `;
                  tabla.appendChild(fila);
              });
          })
          .catch(error => {
              console.error('Error al cargar la tabla:', error);
          });
  }

  // Registrar nueva materia prima
  form.addEventListener('submit', e => {
      e.preventDefault();
      const formData = new FormData(form);

      fetch('../php/registrar_materia.php', {
          method: 'POST',
          body: formData
      })
      .then(res => res.text())
      .then(res => {
          alert(res);
          form.reset();
          cargarMateriaPrima();
      })
      .catch(error => {
          console.error('Error al registrar materia:', error);
      });
  });

  // Cargar la tabla al iniciar
  cargarMateriaPrima();
});
