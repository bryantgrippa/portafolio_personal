

// --------------------------------------ALERTA ELIMINACION DE PRODUCTO------------------------------------------
function fntdel(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar este producto",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "?p=sga&c=Productos&a=Eliminar&id=" + id,
                success: function (data) {
                    // Obtener el nombre del producto eliminado del JSON de respuesta
                    var nombreProducto = data.nombre; // Asegúrate de que este sea el formato correcto según la respuesta de tu servidor

                    Swal.fire("¡El producto ha sido eliminado!", {
                        icon: "success",
                    }).then((result) => {
                        // Recargar la página después de la eliminación
                        location.reload();
                    });
                },
                error: function () {
                    Swal.fire("Error", "Hubo un problema al intentar eliminar el producto", "error");
                },
            });
        }
    });
}

// --------------------------------------ALERTA ELIMINACION DE PROVEEDORES------------------------------------------

function fntdel1(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar este usuario",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "?p=sga&c=Usuarios&a=Eliminar&id=" + id, // Corrección aquí
                success: function (data) {
                    // Obtener el nombre del usuario eliminado del JSON de respuesta
                    var nombreUsuario = data.nombre; // Asegúrate de que este sea el formato correcto según la respuesta de tu servidor

                    Swal.fire("¡El usuario ha sido eliminado!", {
                        icon: "success",
                    }).then((result) => {
                        // Recargar la página después de la eliminación
                        location.reload();
                    });
                },
                error: function () {
                    Swal.fire("Error", "Hubo un problema al intentar eliminar el usuario", "error");
                },
            });
        }
    });
}


// // --------------------------------------ALERTA ELIMINACION DE PROVEEDORES------------------------------------------
function fntdel2(id) {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar este usuario",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "?p=sga&c=Proveedores&a=Eliminar&id=" + id, // Corrección aquí
                success: function (data) {
                    // Obtener el nombre del usuario eliminado del JSON de respuesta
                    var nombreUsuario = data.nombre; // Asegúrate de que este sea el formato correcto según la respuesta de tu servidor

                    Swal.fire("¡El proveedor ha sido eliminado!", {
                        icon: "success",
                    }).then((result) => {
                        // Recargar la página después de la eliminación
                        location.reload();
                    });
                },
                error: function () {
                    Swal.fire("Error", "Hubo un problema al intentar eliminar el usuario", "error");
                },
            });
        }
    });
}
