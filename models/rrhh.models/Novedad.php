<?php

class Novedad {

    private $pdo;
    public $id_usuario;
    public $nombres;
    public $usuario;
    public $password;
    public $n_documento;
    public $fecha_nacimiento;
    public $fecha_ingreso;
    public $cargo;
    public $correo_corporativo;
    public $correo_personal;
    public $telefono;
    public $celular;
    public $direccion_residencia;
    public $barrio;
    public $localidad;
    public $grado_escolaridad;
    public $rama;
    public $foto;
    public $nivel_ingles;
    public $nombre_contacto;
    public $telefono_contacto;
    public $eps;
    public $cesantias;
    public $area;
    public $activo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function DestacadosPorUsuario($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area = :area OR area = 0) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function DestacadosPorUsuario2($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_2 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario3($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_3 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario4($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_4 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario5($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_5 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario6($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_6 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario7($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_7 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario8($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_8 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario9($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_9 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function DestacadosPorUsuario10($idUsuario) {
        try {
            $result = array();
    
            // Obtén el área asignada del usuario
            $stm = $this->pdo->prepare("SELECT area FROM usuarios WHERE id_usuario = :idUsuario");
            $stm->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stm->execute();
            $areaAsignada = $stm->fetch(PDO::FETCH_ASSOC)['area'];
    
            // Consulta los destacados que tienen el área asignada del usuario O que no tienen área asignada
            $stm = $this->pdo->prepare("SELECT * FROM destacados 
                                       WHERE activo = 1 
                                       AND publicado = 1 
                                       AND (area_10 = :area) 
                                       ORDER BY orden ASC, id_destacado DESC;");
            $stm->bindParam(':area', $areaAsignada, PDO::PARAM_STR);
            $stm->execute();
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Nuevo() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT nuevo FROM usuarios  WHERE id_usuario = " . $_SESSION['id_usuario'] . " AND nuevo = 1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Noticias() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM noticias WHERE activo=1 AND publicado=1 ORDER BY orden ASC, id_noticia DESC;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Birthday() {
        try {
            $result = array();
            //SELECT * FROM usuarios WHERE day(fecha_nacimiento) <= day(DATE_ADD(CURDATE(),INTERVAL 10 DAY))
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE DATE_FORMAT(fecha_nacimiento,'%m %d') = DATE_FORMAT(CURDATE(),'%m %d') AND activo=1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Aniversario() {
        try {
            $result = array();
            //SELECT * FROM usuarios WHERE day(fecha_nacimiento) <= day(DATE_ADD(CURDATE(),INTERVAL 10 DAY))
            $stm = $this->pdo->prepare("SELECT * FROM usuarios WHERE DATE_FORMAT(fecha_ingreso,'%m %d') = DATE_FORMAT(CURDATE(),'%m %d') AND activo=1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Bienvenida() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT a.detalle_area, u.nombres, u.foto, u.genero FROM usuarios u INNER JOIN areas a ON u.area=a.id_area WHERE u.bienvenida = 1 AND u.activo=1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Sobresaliente() {
        try {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sobresaliente;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}
