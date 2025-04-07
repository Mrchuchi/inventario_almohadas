document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const navLinks = document.querySelector(".nav-links");

  menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");
    menuToggle.classList.toggle("open");
  });

  // 🚨 Aquí empieza el cargado de inventario
  fetch('php/listar_materia_prima.php')
    .then(response => response.json())
    .then(data => {
      const tabla = document.getElementById('inventarioTabla');
      tabla.innerHTML = "";

      data.forEach(item => {
        const fila = `
          <tr>
            <td>${item.nombre}</td>
            <td>${item.unidad_medida}</td>
            <td>${item.cantidad_actual}</td>
            <td>${item.fecha_registro}</td>
          </tr>
        `;
        tabla.innerHTML += fila;
      });
    })
    .catch(error => {
      console.error('Error al cargar el inventario:', error);
    });
});
