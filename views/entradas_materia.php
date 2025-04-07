<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Materia Prima</title>
    <link rel="stylesheet" href="../css/estilos.css"> <!-- Asegúrate que esta ruta sea correcta -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }

        form {
            margin-bottom: 2rem;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <h1>Registro de Materia Prima</h1>

    <form id="formMateriaPrima">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Tipo:</label>
        <input type="text" name="tipo" required>

        <label>Unidad:</label>
        <input type="text" name="unidad" required>

        <label>Cantidad:</label>
        <input type="number" name="cantidad" required>

        <label>Proveedor:</label>
        <input type="text" name="proveedor" required>

        <button type="submit">Guardar</button>
    </form>


    <h2>Inventario Actual</h2>
    <div id="tablaMateriaPrima"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formulario = document.getElementById("formMateriaPrima");

            formulario.addEventListener("submit", function(e) {
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
                            formulario.reset(); // ✅ Limpiar campos del formulario
                            listarMateriaPrima(); // ✅ Actualizar tabla
                        } else {
                            alert("Error al registrar: " + data);
                        }
                    })
                    .catch(error => {
                        console.error("Error en la solicitud:", error);
                    });
            });

            // ✅ Cargar tabla al inicio
            listarMateriaPrima();
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
    </script>

</body>

</html>