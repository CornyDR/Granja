document.addEventListener("DOMContentLoaded", function () {
    cargarInventario();
});

function cargarInventario() {
    fetch("get_inventario.php")
        .then(response => response.json())
        .then(data => {
            let tabla = document.getElementById("tablaInventario");
            tabla.innerHTML = "";
            data.forEach(item => {
                let fila = `<tr>
                    <td>${item.ID_INVENTARIO}</td>
                    <td>${item.CATEGORIA}</td>
                    <td>${item.PRODUCTO}</td>
                    <td>${item.CANTIDAD}</td>
                    <td>${item.UNIDAD}</td>
                    <td>${item.FECHA_REGISTRO}</td>
                    <td>
                        <button onclick="editarInventario(${item.ID_INVENTARIO}, '${item.CATEGORIA}', '${item.PRODUCTO}', ${item.CANTIDAD}, '${item.UNIDAD}', '${item.FECHA_REGISTRO}')">Editar</button>
                        <button onclick="eliminarInventario(${item.ID_INVENTARIO})">Eliminar</button>
                    </td>
                </tr>`;
                tabla.innerHTML += fila;
            });
        })
        .catch(error => console.error("Error al obtener datos: ", error));
}

function insertarInventario() {
    let datos = new FormData();
    datos.append("accion", "insertar");
    datos.append("categoria", document.getElementById("categoria").value);
    datos.append("producto", document.getElementById("producto").value);
    datos.append("cantidad", document.getElementById("cantidad").value);
    datos.append("unidad", document.getElementById("unidad").value);
    datos.append("fecha", document.getElementById("fecha").value);

    fetch("get_inventario.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        cargarInventario();
    })
    .catch(error => console.error("Error al insertar: ", error));
}

function editarInventario(id, categoria, producto, cantidad, unidad, fecha) {
    document.getElementById("id_inventario").value = id;
    document.getElementById("categoria").value = categoria;
    document.getElementById("producto").value = producto;
    document.getElementById("cantidad").value = cantidad;
    document.getElementById("unidad").value = unidad;
    document.getElementById("fecha").value = fecha;
}

function actualizarInventario() {
    let datos = new FormData();
    datos.append("accion", "editar");
    datos.append("id_inventario", document.getElementById("id_inventario").value);
    datos.append("categoria", document.getElementById("categoria").value);
    datos.append("producto", document.getElementById("producto").value);
    datos.append("cantidad", document.getElementById("cantidad").value);
    datos.append("unidad", document.getElementById("unidad").value);
    datos.append("fecha", document.getElementById("fecha").value);

    fetch("get_inventario.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        cargarInventario();
    })
    .catch(error => console.error("Error al actualizar: ", error));
}

function eliminarInventario(id) {
    if (confirm("¿Seguro que deseas eliminar este registro?")) {
        let datos = new FormData();
        datos.append("accion", "eliminar");
        datos.append("id_inventario", id);

        fetch("get_inventario.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            cargarInventario();
        })
        .catch(error => console.error("Error al eliminar: ", error));
    }
}
