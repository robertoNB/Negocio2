<?php
        include_once("../Utilerias/BaseDatos.php");
        $idtg = $_POST["idTG"];
        $idreg = $_REQUEST["idreg"];
        if ($idreg == 0 ){
            $titulo ="Grafica de ventas Todas las Regiones";
            $data = CargaTodasRegion();
        }else{
            $titulo ="Grafica de ventas x Region";
            $data = CargaVtasXRegion($idreg);
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafica</title>
    <script src="./Chart.js"></script>
    <script src="./Chart.min.js"></script>
</head>
<body>
    <h1><?php echo $titulo;?></h1>
    <canvas id="grafica1" style="width: 100%;" height="400" ></canvas>
    <script>
        var ctx = document.getElementById("grafica1");
        var data = {
            labels:[
                <?php foreach($data as $etiqueta):?>
                "<?php echo $etiqueta['x']; ?>",
                <?php endforeach; ?>
                ],
            datasets:[{
                label:'Ventas por Sucursal',
                data: [
                    <?php foreach($data as $valores):?>
                    <?php echo $valores['y']; ?>,
                    <?php endforeach; ?>
                ],
                backgroundColor: "#3898db",
                borderColor: "#9b59b6",
                borderWidth: 2
            }]
        };
        var options = {
            scales: {
                yAxes:[{
                    ticks:{
                        beginAtZero:true
                    }
                }]
            }
        };
        var chart1 = new Chart(ctx,{
            type:'<?php echo $idtg; ?>',
            data: data,
            options: options
        });
    </script>
</body>
</html>