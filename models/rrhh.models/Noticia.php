<?php
class Noticia{
        private $pdo;
        public $id_noticia;
        public $titulo;
        public $imagen;
        public $resumen;
        public $noticia_completa;
        public $orden;
        public $publicado;
        public $activo;
        public $nombre_img;
        public $temporal;
        
        public $url_image;
        public $tipo;
        public $tamano;        
        public function __CONSTRUCT() {
            try {
                $this->pdo = Database::StartUp();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Obtener($id) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM noticias WHERE id_noticia = ?");
                $stm->execute(array($id));
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Listar() {
            try {
                $result = array();
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
                    $resto = " WHERE titulo LIKE '%" . $_GET['busqueda'] . "%' AND activo=1  ORDER BY id_noticia DESC LIMIT $start_from, $registro_por_pagina;";
                } else {
                    $resto = " WHERE activo=1 ORDER BY id_noticia DESC  LIMIT $start_from, $registro_por_pagina";
                }
                $stm = $this->pdo->prepare("SELECT * FROM noticias ". $resto .";");
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
                    $resto = " WHERE titulo LIKE '%" . $_GET['busqueda'] . "%' AND activo=1  ORDER BY id_noticia DESC;";
                } else {
                     $resto = " WHERE activo=1 ORDER BY id_noticia DESC";
                }            
                $stm = $this->pdo->prepare("SELECT * FROM noticias " . $resto . ";");
                $stm->execute();
                return $stm->rowCount();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Eliminar($id) {
            try {
                $stm = $this->pdo->prepare("UPDATE noticias SET 
                        activo = ?
                        WHERE id_noticia=?;");
    
                $stm->execute(array(0, $id));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Actualizar($data) {
            try {
                if($data->nombre_img != ""){
                $dir_subida2 = 'assets/img/noticias_general/noticias/';
                $fichero_subido = $dir_subida2 . uniqid() . basename($data->nombre_img);
                $cadena = preg_replace('[\s+]', '', $fichero_subido);
                move_uploaded_file($data->temporal, $cadena);
                $directorio = $cadena;
                unlink($data->url_image);
                } else {
                    $directorio=$data->url_image;
                }
    
                $sql = "UPDATE noticias SET
                        titulo = ?, 
                        imagen = ?,
                        noticia_completa = ?,
                        orden = ?,
                        publicado = ?
                        WHERE id_noticia=?;";
    
                $this->pdo->prepare($sql)
                        ->execute(
                                array(
                                    $data->titulo,
                                    $directorio,
                                    $data->noticia_completa,
                                    $data->orden,
                                    $data->publicado,
                                    $data->id_noticia
                                )
                );
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Registrar(Noticia $data) {
            try {
                if (!is_dir("assets/img/noticias_general/noticias/")) {
                    mkdir("assets/img/noticias_general/noticias/", 0777, true);
                }
                $dir_subida2 = 'assets/img/noticias_general/noticias/';
                $fichero_subido = $dir_subida2 . uniqid() . basename($data->nombre_img);
                $cadena = preg_replace('[\s+]', '', $fichero_subido);
                move_uploaded_file($data->temporal, $cadena);
                $directorio = $cadena;
                $sql = "INSERT INTO noticias (titulo,imagen,noticia_completa,orden,publicado) 
                    VALUES (?, ?, ?, ?, ?)";
                $this->pdo->prepare($sql)
                        ->execute(
                                array(
                                    $data->titulo,
                                    $directorio,
                                    $data->noticia_completa,
                                    $data->orden,
                                    $data->publicado
                                )
                );
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
}
?>