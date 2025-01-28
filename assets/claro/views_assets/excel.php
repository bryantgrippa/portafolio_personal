<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla estilo Excel</title>
    <style>
        .dataTable {
            border-collapse: collapse;
            width: 100%;
            height: 70%;
            overflow: auto;
        }

        .dataTable td,
        .dataTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .dataTable th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Excel</h1>
        </div>

        <section class="section">
            <div class="excel-table-container">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>


                            <tbody>
                                <tr>
                                    <td contenteditable="true"><?php echo "contenido" ?></td>
                                    <td contenteditable="true"><?php echo "contenido" ?></td>
                                    <td contenteditable="true"><?php echo "contenido" ?></td>
                                    <td contenteditable="true"><?php echo "contenido" ?></td>
                                    <td contenteditable="true"><?php echo "contenido" ?></td>
                                    <td contenteditable="true"><?php echo "contenido" ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
        </section>

    </div>

    <script>
        // Función para moverse entre celdas con las flechas direccionales
        document.getElementById('excelTable').addEventListener('keydown', function(e) {
            var arrowKeys = ['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight'];
            if (arrowKeys.includes(e.key)) {
                e.preventDefault();
                var currentCell = document.activeElement;
                var row = currentCell.parentNode.rowIndex;
                var col = currentCell.cellIndex;
                if (e.key === 'ArrowUp' && row > 1) {
                    document.getElementsByTagName('tr')[row - 1].getElementsByTagName('td')[col].focus();
                } else if (e.key === 'ArrowDown' && row < document.getElementsByTagName('tr').length - 1) {
                    document.getElementsByTagName('tr')[row + 1].getElementsByTagName('td')[col].focus();
                } else if (e.key === 'ArrowLeft' && col > 0) {
                    currentCell.parentNode.getElementsByTagName('td')[col - 1].focus();
                } else if (e.key === 'ArrowRight' && col < currentCell.parentNode.getElementsByTagName('td').length - 1) {
                    currentCell.parentNode.getElementsByTagName('td')[col + 1].focus();
                }
            }
        });
    </script>

</body>