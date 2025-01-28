<?php
require_once "assets/sga/dompdf/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

class Certificados_PDF
{
  // Propiedad PDO, inicialízala si es necesaria
  private $pdo;

  public function __CONSTRUCT()
  {
    try {
      $this->pdo = Database::conn();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  public function Factura()
  {

    $id = $_REQUEST['id'];

    $consulta = "SELECT * FROM salida WHERE id_salida = $id";
    $stmt = $this->pdo->prepare($consulta);

    $consulta2 = "SELECT * FROM producto";
    $stmt2 = $this->pdo->prepare($consulta2);

    $stmt->execute();
    $stmt2->execute();

    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $datos2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


    foreach ($datos as $fila) : {
        $id_salida = $fila['id_salida'];
        $fecha_venta = $fila['fecha_venta'];
        $producto = $fila['producto'];
        $cantidad = $fila['cantidad'];
        $cliente_nombre = $fila['cliente_nombre'];
        $cliente_id = $fila['cliente_id'];
        $cliente_contacto = $fila['cliente_contacto'];
        $cliente_direccion = $fila['cliente_direccion'];
        $observaciones = $fila['observaciones'];

        foreach ($datos2 as $fila2) :

          $id_producto = $fila2['id_producto'];
    
          if ($id_producto == $producto) {
            $productos = $fila2['nombre'];
          }
        endforeach;
      }
    endforeach;






    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    $dompdf = new Dompdf($options);



    $html = '
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 60%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        h1,
        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Factura</h1>
        <p><strong>Fecha: </strong>'. $fecha_venta .'</p>
        <p><strong>Cliente: </strong>'. $cliente_nombre .'</p>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>ID Cliente</th>
                    <th>Celular Cliente</th>
                    <th>Direccion Cliente</th>
                    <th>Observaciones</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'. $productos .'</td>
                    <td>'. $cantidad .'</td>
                    <td>'. $cliente_id .'</td>
                    <td>'. $cliente_contacto .'</td>
                    <td>'. $cliente_direccion .'</td>
                    <td>'. $observaciones .'</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
        ';



    $dompdf->loadHtml($html);
    $dompdf->render();

    // Cambié la opción 'Attachment' a 1 para que el PDF se descargue automáticamente
    $dompdf->stream('Factura Electronica.pdf', array('Attachment' => 0));
  }
}
