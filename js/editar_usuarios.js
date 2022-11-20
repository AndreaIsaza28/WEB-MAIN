const $USUARIO = document.querySelector("#USUARIO"),
    $CLAVE = document.querySelector("#CLAVE"),
    $ID_ROL = document.querySelector("#ID_ROL"),
    $btnGuardar = document.querySelector("#btnGuardar");

// Una global para establecerla al rellenar el formulario y leerla al enviarlo
let IdUsuario;

const rellenarFormulario = async () => {
 
    const urlSearchParams = new URLSearchParams(window.location.search);
    IdUsuario = urlSearchParams.get("ID"); // <-- Actualizar el ID global

    // Obtener el usuario desde PHP
    const respuestaRaw = await fetch(`../Usuarios/obtener_usuarios_por_id.php?ID=${IdUsuario}`);
    const usuario = await respuestaRaw.json();

    // Rellenar formulario
    $USUARIO.value = usuario.USUARIO;
    $CLAVE.value = usuario.CLAVE;
    $ID_ROL.value = usuario.ID_ROL;
}; 

// Al incluir este script, llamar a la función inmediatamente
rellenarFormulario();

$btnGuardar.onclick = async () => {

    // Se comporta igual que cuando guardamos uno nuevo
    const USUARIO = $USUARIO.value,
        CLAVE = $CLAVE.value,
        ID_ROL = $ID_ROL.value;

    // Pequeña valIDación, aunque debería hacerse del lado del servIDor igualmente, aquí es pura estética
    if (!USUARIO) {
        return Swal.fire({
            icon: "error",
            text: "Usuario Vacio",
            timer: 700, // <- Ocultar dentro de 0.7 segundos
        });
    }
    if (!CLAVE) {
        return Swal.fire({
            icon: "error",
            text: "Clave vacia",
            timer: 700, // <- Ocultar dentro de 0.7 segundos
        });
    }

    if (!ID_ROL) {
        return Swal.fire({
            icon: "error",
            text: "Rol Vacio",
            timer: 700, // <- Ocultar dentro de 0.7 segundos
        });
    }
    // Lo que vamos a enviar a PHP. También incluimos el ID
    const cargaUtil = {
        ID: IdUsuario,
        USUARIO: USUARIO,
        CLAVE: CLAVE,
        ID_ROL: ID_ROL,
    };
    // Codificamos...

    const cargaUtilCodificada = JSON.stringify(cargaUtil);

    // Enviamos
    try {
        const respuestaRaw = await fetch("../Usuarios/actualizar_usuarios.php", {
            method: "PUT",
            body: cargaUtilCodificada,
        });
        // El servIDor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {

            // Y si llegamos hasta aquí, todo ha ID bien
            // Esperamos a que la alerta se muestre
            await Swal.fire({
                icon: "success",
                text: "Usuario Modificado",
                timer: 700, // <- Ocultar dentro de 0.7 segundos
            });

            // Redireccionamos a todos los usuarios
            window.location.href = "../Usuarios/IndexAdmin.php";
        } else {
            Swal.fire({
                icon: "error",
                text: "El servidor no envió una respuesta exitosa",
            });
        }
    } catch (e) {

        // En caso de que haya un error
        Swal.fire({
            icon: "error",
            title: "Error de servidor",
            text: "Inténtalo de nuevo. El error es: " + e,
        });
    }
};