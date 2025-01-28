<?php

class Destacado
{
    private $pdo;
    public $id_destacado;
    public $usuario_creado;
    public $titulo;
    public $area;
    public $area_2;
    public $area_3;
    public $area_4; 
    public $area_5; 
    public $area_6; 
    public $area_7; 
    public $area_8; 
    public $area_9; 
    public $area_10;
    public $imagen;
    public $resumen;
    public $destacado_noticia;
    public $orden;
    public $publicado;
    public $activo;
    public $nombre_img;
    public $temporal;
    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function Listar() {
        try {
            $result = array();
            $registro_por_pagina = 12;
            $pagina = '';
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            } else {
                $pagina = 1;
            }
            $start_from = ($pagina - 1) * $registro_por_pagina;
             if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE titulo LIKE '%" . $_GET['busqueda'] . "%' AND activo=1  ORDER BY id_destacado DESC LIMIT $start_from, $registro_por_pagina;";
            } else {
                $resto = " WHERE activo=1 ORDER BY id_destacado DESC  LIMIT $start_from, $registro_por_pagina";
            }

            $stm = $this->pdo->prepare("SELECT * FROM destacados ". $resto ." ;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Listar2() {
        try {
            if (isset($_GET["busqueda"]) && $_GET["busqueda"] != "") {
                $resto = " WHERE titulo LIKE '%" . $_GET['busqueda'] . "%' AND activo=1  ORDER BY id_destacado DESC;";
            } else {
                 $resto = " WHERE activo=1 ORDER BY id_destacado DESC";
            }
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM destacados " . $resto . ";");
            $stm->execute();
            return $stm->rowCount();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Obtener($id) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM destacados WHERE id_destacado = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Elimina($id) {
        try {
            $stm = $this->pdo->prepare("DELETE FROM destacados WHERE id_destacado= ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Actualizar($data) {
        try {
            if($data->nombre_img != ""){
            $dir_subida2 = 'assets/img/noticias_general/destacados/';
            $fichero_subido = $dir_subida2 . uniqid() . basename($data->nombre_img);
            $cadena = preg_replace('[\s+]', '', $fichero_subido);
            move_uploaded_file($data->temporal, $cadena);
            $directorio = $cadena;
            unlink($data->url_image);
            } else {
                $directorio=$data->url_image;
            }

            $sql = "UPDATE destacados SET
                    titulo = ?, 
                    usuario_creado = ?,
                    area = ?,
                    area_2 = ?,
                    area_3 = ?,
                    area_4 = ?,
                    area_5 = ?,
                    area_6 = ?,
                    area_7 = ?,
                    area_8 = ?,
                    area_9 = ?,
                    area_10 = ?,
                    imagen = ?,
                    destacado_noticia = ?,
                    orden = ?,
                    publicado = ?
                    WHERE id_destacado=?;";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->titulo,
                                $data->usuario_creado,
                                $data->area,
                                $data->area_2,
                                $data->area_3,
                                $data->area_4,
                                $data->area_5,
                                $data->area_6,
                                $data->area_7,
                                $data->area_8,
                                $data->area_9,
                                $data->area_10,
                                $directorio,
                                $data->destacado_noticia,
                                $data->orden,
                                $data->publicado,
                                $data->id_destacado
                                
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Registrar(Destacado $data) {
        try {
            if (!is_dir("assets/img/noticias_general/destacados/")) {
                mkdir("assets/img/noticias_general/destacados/", 0777, true);
            }
            $dir_subida2 = 'assets/img/noticias_general/destacados/';
            $fichero_subido = $dir_subida2 . uniqid() . basename($data->nombre_img);
            $cadena = preg_replace('[\s+]', '', $fichero_subido);
            move_uploaded_file($data->temporal,$cadena);
            $directorio = $cadena;
            $sql = "INSERT INTO destacados 
            (
                titulo,
                imagen,
                destacado_noticia,
                orden,
                publicado,
                usuario_creado,
                area,
                area_2,
                area_3,
                area_4,
                area_5,
                area_6,
                area_7,
                area_8,
                area_9,
                area_10
            ) 
		        VALUES 
                (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )";

            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->titulo,
                                $directorio,
                                $data->destacado_noticia,
                                $data->orden,
                                $data->publicado,
                                $data->usuario_creado,
                                $data->area,
                                $data->area_2,
                                $data->area_3,
                                $data->area_4,
                                $data->area_5,
                                $data->area_6,
                                $data->area_7,
                                $data->area_8,
                                $data->area_9,
                                $data->area_10
                            )
        
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function Area() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM areas WHERE activo=1;");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



}