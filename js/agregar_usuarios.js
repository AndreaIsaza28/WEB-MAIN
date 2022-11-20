const $USUARIO = document.querySelector("#USUARIO"),
    $CLAVE = document.querySelector("#CLAVE"),
    $ID_ROL = document.querySelector("#ID_ROL"),
    $btnGuardar = document.querySelector("#btnGuardar");

$btnGuardar.onclick = async () => {
    const USUARIO = $USUARIO.value,
        CLAVE = $CLAVE.value,
        ID_ROL = $ID_ROL.value;

    // Pequeña validación, aunque debería hacerse del lado del servidor igualmente, aquí es pura estética
    if (!USUARIO) {
        return Swal.fire({
            icon: "warning",
            text: "Usuario Vacio",
            timer: 700, // <- Ocultar dentro de 0.7 segundos
        });
    }
    if (!CLAVE) {
        return Swal.fire({
            icon: "warning",
            text: "Clave Vacio",
            timer: 700, // <- Ocultar dentro de 0.7 segundos
        });
    }

    if (!ID_ROL) {
        return Swal.fire({
            icon: "warning",
            text: "Rol vacio",
            timer: 700, // <- Ocultar dentro de 0.7 segundos
        });
    }

    // Lo que vamos a enviar a PHP
    const cargaUtil = {
        USUARIO: USUARIO,
        CLAVE: CLAVE,
        ID_ROL: ID_ROL,
        // Nota: podríamos hacerlo más simple, y escribir:
        // USUARIO,
        // En lugar de:
        // USUARIO: USUARIO
        // Pero eso podría confundir al principiante
    };

    // Codificamos...
    const cargaUtilCodificada = JSON.stringify(cargaUtil);
    
    // Enviamos
    try {
        const respuestaRaw = await fetch("../Usuarios/guardar_usuarios.php", {
            method: "POST",
            body: cargaUtilCodificada,
        });

        // El servidor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {

            // Y si llegamos hasta aquí, todo ha ido bien
            Swal.fire({
                icon: "success",
                text: "El Usuario se registro exitosamente",
                timer: 700, // <- Ocultar dentro de 0.7 segundos
            });

            // Limpiamos el formulario
            $USUARIO.value = $CLAVE.value = $ID_ROL.value = "";
        } else {
            Swal.fire({
                icon: "warning",
                text: "El servidor no envió una respuesta exitosa",
            });
        }
    } catch (e) {

        // En caso de que haya un error
        Swal.fire({
            icon: "warning",
            title: "Error de servidor",
            text: "Inténtalo de nuevo. El error es: " + e,
        });
    }
};