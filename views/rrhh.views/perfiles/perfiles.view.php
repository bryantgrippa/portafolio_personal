<title>Perfil</title>

<?php
require_once "assets/gestionhumana/libreria/librerias.php";
require_once "views/rrhh.views/menu/menu.php";
?>
<div class="loader-page"></div>

<center>
    <h1 class="creacion-usuario-titulo"><small class="text-white"><?PHP if (isset($alm[0]->id_usuario)) { ?>Modificaci&oacute;n de usuario <?php echo $alm[0]->nombres; ?><?PHP } else { ?>Creaci&oacute;n de un nuevo usuario<?PHP } ?> </small></h1>
</center>
<div class="container">
    <center>
        <div class="container">
            <form class="well form-horizontal"  id="frm-usuario" action="?p=rrhh&c=Perfiles&a=Guardar" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_usuario" id="id_usuario" class="id_usuario" value="<?php echo $alm[0]->id_usuario; ?>" />
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Nombres Completos</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="nombres" placeholder="Nombres Completos" class="form-control"  type="text" value="<?php
                            if (isset($alm[0]->nombres)) {
                                echo $alm[0]->nombres;
                            } else {
                                echo "";
                            }
                            ?>">
                        </div>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Usuario</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="usuario" placeholder="Username" class="form-control"  type="text" value="<?php
                            if (isset($alm[0]->usuario)) {
                                echo $alm[0]->usuario;
                            } else {
                                echo "";
                            }
                            ?>" <?php if (isset($alm[0]->usuario)) { ?>readonly=""<?php } ?>>
                        </div>
                    </div>
                </div>
                <!-- Text input-->       
                <div class="form-group">
                    <label class="col-md-4 control-label">No. de documento</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                            <input name="n_documento" placeholder="N° C.C" class="form-control" type="text"   value="<?php
                            if (isset($alm[0]->n_documento)) {
                                echo $alm[0]->n_documento;
                            } else {
                                echo "";
                            }
                            ?>" <?php if (isset($alm[0]->n_documento)) { ?>readonly=""<?php } ?>>
                        </div>
                    </div>
                </div>
                <!-- Text date-->       
                <div class="form-group">
                    <label class="col-md-4 control-label">Fecha de nacimiento</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input name="fecha_nacimiento" placeholder="dd/mm/aaaa" class="form-control" type="date" value="<?php
                            if (isset($alm[0]->fecha_nacimiento)) {
                                echo $alm[0]->fecha_nacimiento;
                            } else {
                                echo "";
                            }
                            ?>">
                        </div>
                    </div>
                </div>
                <!-- Select-->       
                <div class="form-group">
                    <label class="col-md-4 control-label">Cargo a desempe&ntilde;ar</label>  
                    <div class="col-md-5 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <?php foreach ($this->model->CargoUsuario() as $cu): ?>
                            <?php if (isset($alm[0]->cargo) && ($alm[0]->cargo == $cu->id_cargo)) { $detalle_cargo = $cu->detalle_cargo; } ?>
                             <?php endforeach; ?>
                                    <input class="form-control" name="cargo" id="cargo" readonly="" type="text" value="<?php echo $detalle_cargo; ?>"> 
                        </div>
                    </div>
                </div>
                <!-- Email date-->       

                <!--Photo input-->  
                <div class="form-group">
                    <label class="col-md-4 control-label">Foto</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="file" name="foto-archivo" class="form-control" id="foto" accept="image/jpeg,image/png">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h4>2 Selecciona un recorte de la imágen subida</h4>
                    <!-- Editor donde se recortará la imagen con la ayuda de croppr.js -->
                    <div id="editor"></div>

                    <h4>3 Previsualiza el resultado</h4>
                    <!-- Previa del recorte -->
                    <canvas id="preview"></canvas>

                    <!--<h1>4 Resultado en Base64</h1>-->
                    <!-- Muestra de la imagen recortada en Base64 -->
                    <input type="hidden" id="base64" value="<?php
                    if (isset($alm[0]->id_usuario)) {
                        echo $alm[0]->foto;
                    }
                    ?>" name="foto">
                    <!--<code id="base64"></code>-->
                </div>
                <?php if (isset($alm[0]->id_usuario)) { ?>
                    <img style='display:block; width:100px;height:100px;' id='base64image'                 
                         src='<?php echo $alm[0]->foto; ?>' />
                     <?php } ?>
                <!-- Select-->       

                <!-- Select-->       
                <div class="form-group">
                    <label class="col-md-4 control-label">&Aacute;rea</label>  
                    <div class="col-md-5 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <?php foreach ($this->model->Area() as $a): ?>
                                <?php if (isset($alm[0]->area) && ($alm[0]->area == $a->id_area)) { $area=$a->detalle_area; } ?>
                            <?php endforeach; ?>
                            <input class="form-control form-control-lg" name="area" id="area" value="<?php echo $area; ?>" readonly="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <button type="submit" class="btn btn-success" id="guardar" name="guardar">Guardar</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-6">
                        <div>
                            <a href="?p=rrhh&c=Novedades&a=main" type="button" class="btn btn-danger" >Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </center>
</div>
<script>
            $(window).on('load', function () {
            setTimeout(function () {
                $(".loader-page").css({ visibility: "hidden", opacity: "0" });
            }, 500);
        });
// Esperamos a que todo el HTML esté cargado antes de ejecutar Javascrip
    document.addEventListener('DOMContentLoaded', () => {

        // Input File
        const inputImage = document.querySelector('#foto');
        // Nodo donde estará el editor
        const editor = document.querySelector('#editor');
        // El canvas donde se mostrará la previa
        const miCanvas = document.querySelector('#preview');
        // Contexto del canvas
        const contexto = miCanvas.getContext('2d');
        // Ruta de la imagen seleccionada
        let urlImage = undefined;
        // Evento disparado cuando se adjunte una imagen
        inputImage.addEventListener('change', abrirEditor, false);

        /**
         * Método que abre el editor con la imagen seleccionada
         */
        function abrirEditor(e) {
            // Obtiene la imagen
            urlImage = URL.createObjectURL(e.target.files[0]);

            // Borra editor en caso que existiera una imagen previa
            editor.innerHTML = '';
            let cropprImg = document.createElement('img');
            cropprImg.setAttribute('id', 'croppr');
            editor.appendChild(cropprImg);

            // Limpia la previa en caso que existiera algún elemento previo
            contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);

            // Envia la imagen al editor para su recorte
            document.querySelector('#croppr').setAttribute('src', urlImage);

            // Crea el editor
            new Croppr('#croppr', {
                aspectRatio: 1,
                startSize: [70, 70],
                maxSize: [200, 200],
                onCropEnd: recortarImagen
            })
        }

        /**
         * Método que recorta la imagen con las coordenadas proporcionadas con croppr.js
         */
        function recortarImagen(data) {
            // Variables
            const inicioX = data.x;
            const inicioY = data.y;
            const nuevoAncho = data.width;
            const nuevaAltura = data.height;
            const zoom = 1;
            let imagenEn64 = '';
//            alert(nuevoAncho);
//            alert(nuevaAltura);
            // La imprimo
            miCanvas.width = nuevoAncho;
            miCanvas.height = nuevaAltura;
            // La declaro
            let miNuevaImagenTemp = new Image();
            // Cuando la imagen se carge se procederá al recorte
            miNuevaImagenTemp.onload = function () {
                // Se recorta
                contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura * zoom, 0, 0, nuevoAncho, nuevaAltura);
                // Se transforma a base64
                imagenEn64 = miCanvas.toDataURL("image/jpeg");
                // Mostramos el código generado
                document.querySelector('#base64').value = imagenEn64;
//                document.querySelector('#base64HTML').textContent = '<img src="' + imagenEn64.slice(0, 40) + '...">';

            }
            // Proporciona la imagen cruda, sin editarla por ahora
            miNuevaImagenTemp.src = urlImage;
        }
    });
    $(document).ready(function () {

        $(document).on('change', 'input[type="file"]', function () {
            // this.files[0].size recupera el tamaño del archivo
            // alert(this.files[0].size);

            var fileName = this.files[0].name;
            var fileSize = this.files[0].size;

            if (fileSize > 3000000) {
                alert('El archivo no debe superar 1 MB');
                this.value = '';
                this.files[0].name = '';
            } else {
                // recuperamos la extensión del archivo
                var ext = fileName.split('.').pop();

                // Convertimos en minúscula porque 
                // la extensión del archivo puede estar en mayúscula
                ext = ext.toLowerCase();

                // console.log(ext);
                switch (ext) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                        break;
                    default:
                        alert('El archivo no tiene la extensión adecuada');
                        this.value = ''; // reset del valor
                        this.files[0].name = '';
                }
            }
        });
        if ($("#id_usuario").val() === "") {
            $('#frm-usuario').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nombres: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un nombre válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa nombres completos'
                            }
                        }
                    },
                    usuario: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un usuario válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa usuaro'
                            },
                            remote: {
                                type: 'POST',
                                url: 'modelo/ajax.php', //path to backend
                                message: 'Usuario existe, pruebe con otro usuario',
                                delay: 1000
                            }
                        }
                    },
                    password: {
                        validators: {
                            stringLength: {
                                min: 8,
                                message: 'Por favor ingresa contraseña de por lo menos 8 carácteres'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa contraseña'
                            }
                        }
                    },
                    confirm_password: {
                        validators: {
                            identical: {
                                field: 'password',
                                message: 'No coincide con la contraseña'
                            },
                            notEmpty: {
                                message: 'Por favor confirma contraseña'
                            }
                        }
                    },
                    n_documento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa documento'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa número valido'
                            },
                            remote: {
                                type: 'POST',
                                url: 'modelo/ajax.php', //path to backend
                                message: 'Número de documento ya existe',
                                delay: 1000
                            }
                        }
                    },
                    fecha_nacimiento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa fecha de nacimiento'
                            }
                        },
                        date: {
                            format: 'DD/mm/YYYY',
                            message: 'El formato es DD/MM/YYYY'
                        }
                    },
                    fecha_ingreso: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa fecha de ingreso'
                            }
                        },
                        date: {
                            format: 'DD/MM/YYYY',
                            message: 'El formato es DD/MM/YYYY'
                        }
                    },
                    cargo: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione cargo'
                            }
                        }
                    },
                    correo_corporativo: {
                        validators: {
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Ingrese un correo valido'
                            }
                        }
                    },
                    correo_personal: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese correo personal'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Ingrese un correo valido'
                            },
                            remote: {
                                type: 'POST',
                                url: 'modelo/ajax.php', //path to backend
                                message: 'Correo electronico existe, pruebe con otro email',
                                delay: 1000
                            }
                        }
                    },
                    telefono: {
                        validators: {
                            stringLength: {
                                min: 7,
                                max: 7,
                                message: 'Ingrese número de teléfono válido'
                            }
                        }
                    },
                    celular: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese número de celular personal'
                            },
                            stringLength: {
                                min: 10,
                                max: 10,
                                message: 'Ingrese únicamente los 10 números de celular'
                            }
                        }
                    },
                    direccion_residencia: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese dirección de residencia'
                            }
                        }
                    },
                    barrio: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese barrio de residencia'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Ingrese nombre barrio completo'
                            }
                        }
                    },
                    localidad: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese localidad de residencia'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Ingrese nombre localidad completo'
                            }
                        }
                    },
                    grado_escolaridad: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese grado de escolaridad'
                            }
                        }
                    },
                    rama: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese rama de escolaridad'
                            }
                        }
                    },
                    foto: {
                        validators: {

                            file: {
                                extension: 'jpeg,jpg,png,jfif',
                                type: 'image/jpeg,image/png',
                                maxSize: 1 * 1024 * 1024, // 5 MB
                                message: 'Solo imagen (png,jpeg,jpg), 2 MB como máximo y dimensión de 700 x 700 máximo.'
                            }
                        }
                    },
                    nivel_ingles: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese nivel de inglés'
                            }
                        }
                    },
                    nombre_contacto: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese nombre contacto'
                            }
                        }
                    },
                    telefono_contacto: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese teléfono de contacto'
                            },
                            stringLength: {
                                min: 7,
                                max: 10,
                                message: 'Ingrese celular o teléfono de contacto'
                            }
                        }
                    },
                    eps: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese EPS del usuario'
                            }
                        }
                    },
                    cesantias: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Cotizador de Cesantias del usuario'
                            }
                        }
                    },
                    area: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Área de desempeño del usuario'
                            }
                        }
                    },
                    permiso: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Permisos para Gestión Humana'
                            }
                        }
                    }
                }

            });
        } else {
            $('#frm-usuario').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nombres: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un nombre válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa nombres completos'
                            }
                        }
                    },
                    usuario: {
                        validators: {
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa un usuario válido'
                            },
                            notEmpty: {
                                message: 'Por favor ingresa usuaro'
                            }
                        }
                    },
                    n_documento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa documento'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Por favor ingresa número valido'
                            }
                        }
                    },
                    fecha_nacimiento: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingresa fecha de nacimiento'
                            }
                        },
                        date: {
                            format: 'DD/mm/YYYY',
                            message: 'El formato es DD/MM/YYYY'
                        }
                    },
                    cargo: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor seleccione cargo'
                            }
                        }
                    },
                    correo_corporativo: {
                        validators: {
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Ingrese un correo valido'
                            }
                        }
                    },
                    correo_personal: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese correo personal'
                            },
                            regexp: {
                                regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                message: 'Ingrese un correo valido'
                            }
                        }
                    },
                    telefono: {
                        validators: {
                            stringLength: {
                                min: 7,
                                max: 7,
                                message: 'Ingrese número de teléfono válido'
                            }
                        }
                    },
                    celular: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese número de celular personal'
                            },
                            stringLength: {
                                min: 10,
                                max: 10,
                                message: 'Ingrese únicamente los 10 números de celular'
                            }
                        }
                    },
                    direccion_residencia: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese dirección de residencia'
                            }
                        }
                    },
                    barrio: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese barrio de residencia'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Ingrese nombre barrio completo'
                            }
                        }
                    },
                    localidad: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese localidad de residencia'
                            },
                            stringLength: {
                                min: 5,
                                message: 'Ingrese nombre localidad completo'
                            }
                        }
                    },
                    grado_escolaridad: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese grado de escolaridad'
                            }
                        }
                    },
                    rama: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese rama de escolaridad'
                            }
                        }
                    },
                    foto: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png,jfif',
                                type: 'image/jpeg,image/png',
                                maxSize: 1 * 1024 * 1024, // 5 MB
                                message: 'Solo imagen (png,jpeg,jpg), 2 MB como máximo y dimensión de 700 x 700 máximo.'
                            }
                        }
                    },
                    nivel_ingles: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese nivel de inglés'
                            }
                        }
                    },
                    nombre_contacto: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese nombre contacto'
                            }
                        }
                    },
                    telefono_contacto: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese teléfono de contacto'
                            },
                            stringLength: {
                                min: 7,
                                max: 10,
                                message: 'Ingrese celular o teléfono de contacto'
                            }
                        }
                    },
                    eps: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese EPS del usuario'
                            }
                        }
                    },
                    cesantias: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Cotizador de Cesantias del usuario'
                            }
                        }
                    },
                    area: {
                        validators: {
                            notEmpty: {
                                message: 'Por favor ingrese Área de desempeño del usuario'
                            }
                        }
                    }
                }

            });
        }
    });

    // Validate the form manually
    $('#guardar').click(function () {
        $('#frm-usuario').bootstrapValidator('validate');
    });
    $('#resetBtn').click(function () {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
</script>
