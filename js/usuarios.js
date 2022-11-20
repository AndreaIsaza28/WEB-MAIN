const $cuerpoTabla = document.querySelector("#cuerpoTabla");

const obtenerUsuarios = async () => {

    // Es una petición GET, no necesitamos indicar el método ni el cuerpo
    const respuestaRaw = await fetch("../Usuarios/obtener_usuarios.php");

    const USUARIOS = await respuestaRaw.json();

    // Limpiamos la tabla
    $cuerpoTabla.innerHTML = "";

    // Ahora ya tenemos a los USUARIOS. Los recorremos
    for (const USUARIO of USUARIOS) {

        // Vamos a ir adjuntando elementos a la tabla.
        const $fila = document.createElement("tr");

        // La celda del USUARIO
        const $celdaUSUARIOS = document.createElement("td");

        // Colocamos su valor y lo adjuntamos a la fila
        $celdaUSUARIOS.innerText = USUARIO.USUARIO;
        $fila.appendChild($celdaUSUARIOS);

        // Lo mismo para lo demás    
        const $celdaCLAVE = document.createElement("td");
        $celdaCLAVE.innerText = USUARIO.CLAVE;
        $fila.appendChild($celdaCLAVE);

        const $celdaID_ROL = document.createElement("td");
        $celdaID_ROL.innerText = USUARIO.ID_ROL;
        $fila.appendChild($celdaID_ROL);

        // Extraer el ID del USUARIO en el que estamos dentro del ciclo
        const IDUSUARIO = USUARIO.ID;

        // Link para Editar
        const $linkEditar = document.createElement("a");
        $linkEditar.href = "../Usuarios/editar_usuarios.php?ID=" + IDUSUARIO;
        $linkEditar.innerHTML = '<i class="fa fa-edit">Editar</i>';
        $linkEditar.classList.add("button", "is-warning");

        const $celdaLinkEditar = document.createElement("td");
        $celdaLinkEditar.appendChild($linkEditar);
        $fila.appendChild($celdaLinkEditar);

        // Para el botón de eliminar primero creamos el botón, agregamos su listener y luego lo adjuntamos a su celda
        const $botonEliminar = document.createElement("button");
        $botonEliminar.classList.add("button", "is-danger");
        $botonEliminar.innerHTML = '<i class="fa fa-trash">Eliminar</i>';
        $botonEliminar.onclick = async () => {

            const respuestaConfirmacion = await Swal.fire({
                title: "Confirmación",
                text: "¿Seguro desea eliminar el usuario?",
                icon: 'question',
                showCancelButton: true,
                cancelButtonColor: '#C094F5',
                confirmButtonColor: '#8761B4',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            });
            if (respuestaConfirmacion.value) {
                const url = `../Usuarios/eliminar_usuarios.php?ID=${IDUSUARIO}`;
                const respuestaRaw = await fetch(url, {
                    method: "DELETE",
                });
                const respuesta = await respuestaRaw.json();
                if (respuesta) {
                    Swal.fire({
                        icon: "success",
                        text: "Se elimino el Usuario",
                        timer: 700, // <- Ocultar dentro de 0.7 segundos
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "El servidor no respondió con una respuesta exitosa",
                    });
                }
                // De cualquier modo, volver a obtener los USUARIOS para refrescar la tabla
                obtenerUsuarios();
            }
        };
        const $celdaBoton = document.createElement("td");
        $celdaBoton.appendChild($botonEliminar);
        $fila.appendChild($celdaBoton);
        // Adjuntamos la fila a la tabla
        $cuerpoTabla.appendChild($fila);
    }
};

// Y cuando se incluya este script, invocamos a la función
obtenerUsuarios();