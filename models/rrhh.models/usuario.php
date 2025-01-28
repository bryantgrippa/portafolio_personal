<?php

class Usuario {

    private $pdo;
    public $id_usuario;
    public $id_usuario2;
    public $nombres;
    public $usuario;
    public $password;
    public $n_documento;
    public $fecha_nacimiento;
    public $fecha_ingreso;
    public $cargo;
    public $foto;
    public $area;
    public $area_1;
    public $area_2;
    public $area_3;
    public $area_4;
    public $area_5;
    public $area_6;
    public $area_7;
    public $activo;
    public $puesto_contratado;
    public $valor_sueldo;
    public $valor_sueldo_letras;
    public $bienvenida;
    public $genero;
    public $supervisor;  
    public $jefe_area;  
    public $permiso;


    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $result = array();
            $registro_por_pagina = 10;
            $pagina = '';
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            } else {
                $pagina = 1;
            }
            $start_from = ($pagina - 1) * $registro_por_pagina;
            if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE (nombres LIKE '%" . $_GET['busqueda'] . "%' OR usuario LIKE '%" . $_GET['busqueda'] . "%' OR n_documento LIKE '%" . $_GET['busqueda'] . "%') ORDER BY id_usuario DESC LIMIT $start_from, $registro_por_pagina";
            } else {
                $resto = " ORDER BY id_usuario DESC LIMIT $start_from, $registro_por_pagina";
            }
            $stm = $this->pdo->prepare("SELECT * FROM usuarios " . $resto . ";");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Listar2() {
        try {
            $result = array();
            if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE nombres LIKE '%" . $_GET['busqueda'] . "%' AND activo=1 OR usuario LIKE '%" . $_GET['busqueda'] . "%' AND activo=1 OR n_documento LIKE '%" . $_GET['busqueda'] . "%' AND activo=1  ORDER BY id_usuario DESC";
            } else {
                $resto = " WHERE activo=1 ORDER BY id_usuario DESC";
            }
            $stm = $this->pdo->prepare("SELECT * FROM usuarios " . $resto . ";");
            $stm->execute();
            return $stm->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?;");
            $stm->execute(array($id));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Supervisor() {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE permiso IN (1,4)");
                $stm->execute();
    
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
    }
    public function jefe_area() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (2,3,5,6) and permiso IN (1,4);");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
}

public function Nomina()
{
    try {
        $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (9) AND activo=1;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function TalentoH()
{
    try {
        $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE cargo IN (6) AND activo=1;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
public function FirmaSupervisor($id_usuario)
{
    try {
        $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
        $stm->execute(array($id_usuario));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function FirmaJefeOperaciones($id_usuario)
{
    try {
        $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
        $stm->execute(array($id_usuario));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function FirmaRRHH($id_usuario)
{
    try {
        $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
        $stm->execute(array($id_usuario));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

public function FirmaNomina($id_usuario)
{
    try {
        $stm = $this->pdo->prepare("SELECT nombres FROM usuarios u WHERE id_usuario=?;");
        $stm->execute(array($id_usuario));
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}





    public function Cargo() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cargos WHERE activo= 1 ORDER BY detalle_cargo ASC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Area() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM areas WHERE activo=1 ORDER BY detalle_area ASC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Permiso() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM permisos WHERE activo=1 ORDER BY detalle_permiso ASC");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ultimo_usuario() {
        try {
            $stm = $this->pdo->prepare("SELECT MAX(id_usuario) AS ultimou FROM usuarios");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $sql ="DELETE from usuarios WHERE id_usuario = ?;";
            $stm = $this->pdo->prepare($sql);

            $stm->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function Actualizar($data) {
        try {

            $sql = "UPDATE usuarios SET 
                    nombres = ?, 
                    usuario = ?,
                    n_documento = ?,
                    fecha_nacimiento = ?,
                    fecha_ingreso = ?,
                    cargo = ?,
                    foto = ?,
                    area = ?,
                    area_1 = ?,
                    area_2 = ?,
                    area_3 = ?,
                    area_4 = ?,
                    area_5 = ?,
                    area_6 = ?,
                    area_7 = ?,
                    permiso = ?,
                    puesto_contratado = ?,
                    valor_sueldo = ?,
                    valor_sueldo_letras = ?,
                    bienvenida = ?,
                    genero = ?,
                    supervisor = ?,
                    jefe_area = ?
                    WHERE id_usuario=?;";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombres,
                                $data->usuario,
                                $data->n_documento,
                                $data->fecha_nacimiento,
                                $data->fecha_ingreso,
                                $data->cargo,
                                $data->foto,
                                $data->area,
                                $data->area_1,
                                $data->area_2,
                                $data->area_3,
                                $data->area_4,
                                $data->area_5,
                                $data->area_6,
                                $data->area_7,
                                $data->permiso,
                                $data->puesto_contratado,
                                $data->valor_sueldo,
                                $data->valor_sueldo_letras,
                                $data->bienvenida,
                                $data->genero,
                                $data->supervisor,
                                $data->jefe_area,
                                $data->id_usuario
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(Usuario $data) {
        try {
            $password = $data->password;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO usuarios (
            nombres,
            usuario,
            password,
            n_documento,
            fecha_nacimiento,
            fecha_ingreso,
            cargo,
            foto,
            area,
            area_1,
            area_2,
            area_3,
            area_4,
            area_5,
            area_6,
            area_7,
            permiso,
            activo,
            puesto_contratado,
            valor_sueldo,
            valor_sueldo_letras,
            bienvenida,
            supervisor,
            jefe_area,
            genero
            ) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->nombres,
                                $data->usuario,
                                $hashed_password,
                                $data->n_documento,
                                $data->fecha_nacimiento,
                                $data->fecha_ingreso,
                                $data->cargo,
                                $data->foto,
                                $data->area,
                                $data->area_1,
                                $data->area_2,
                                $data->area_3,
                                $data->area_4,
                                $data->area_5,
                                $data->area_6,
                                $data->area_7,
                                $data->permiso,
                                1,
                                $data->puesto_contratado,
                                $data->valor_sueldo,
                                $data->valor_sueldo_letras,
                                $data->bienvenida,
                                $data->supervisor,
                                $data->jefe_area,
                                $data->genero
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActivarUsuario($id) {
        try {
            $sql = "UPDATE usuarios SET activo = 1 WHERE id_usuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function DesactivarUsuario($id) {
        try {
            $sql = "UPDATE usuarios SET activo = 0 WHERE id_usuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ModificarC($data) {
        try {
            $password = $data->password;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "UPDATE usuarios SET password = ? WHERE id_usuario=? ";
        $this->pdo->prepare($sql)
        ->execute(
                array(                            
                $hashed_password,
                $data->id_usuario
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
