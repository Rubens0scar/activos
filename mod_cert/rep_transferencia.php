<?php
session_start();
if ($_SESSION["usuario_nombre"]) {
    require("../theme/header_inicio.php");
    ?>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Activos</title>
    <link rel="stylesheet" type="text/css" href="../theme/css/jquery.dataTables.css">
    <style type="text/css" class="init"></style>
    <script type="text/javascript" language="javascript" src="../theme/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function () {
            $('#resultado').DataTable();
        });


    </script>
    <style>
        .button{
            border: 1px solid #DBE1EB;
            font-size: 14px;
            font-family: Arial, Verdana;
            padding-left: 7px;
            padding-right: 7px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            -o-border-radius: 4px;
            background: #4972B5;
            background: linear-gradient(left, #4972B5, #618ACB);
            background: -moz-linear-gradient(left, #4972B5, #618ACB);
            background: -webkit-linear-gradient(left, #4972B5, #618ACB);
            background: -o-linear-gradient(left, #4972B5, #618ACB);
            color: #FFFFFF;
        }

        .button:hover{
            background: #365D9D;
            background: linear-gradient(left, #365D9D, #436CAD);
            background: -moz-linear-gradient(left, #365D9D, #436CAD);
            background: -webkit-linear-gradient(left, #365D9D, #436CAD);
            background: -o-linear-gradient(left, #365D9D, #436CAD);
            color: #FFFFFF;
            border-color: #FBFFAD;
        }
        .estilo_div{
            border:solid 10px #ccc;
            border-radius:15px;
            box-shadow: 8px 8px 10px 0px #818181;
            width:850px;
        }
        .titulo{
            font-family: algerian;
            color: #001459;
            font-size: 180%;
        }
        .subtitulo{
            font-family: algerian;
            /*color: lightblue;*/
            color: #001459;
            font-size: 120%;
        }

        .estilo_subdiv{
            border:solid 3px #ccc;
            border-radius:15px;
            width:450px;
        }
        .inputs{
            float: none;
            padding: 0px;
            font-size: small;
            font-family: verdana;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border: 1px solid rgb(182, 182, 182);
            color: rgb(51,51,51);
        }

        .colEnc{
            display: table-cell;
            padding: 5px;
            font-family: monospace; 
            font-size: 14px;
            color: #063b82;
            background: #CED4D9;
        }
        .colDat{
            display: table-cell;
            padding: 5px;
            font-family: monospace; 
            font-size: 14px;
            color: #063b82;
        }
    </style><br><br><br><br>
    <center>

        <table><tr><td class="titulo">Personal para Reporte de Transferencia de Activos</td></tr>
            <tr><td class="subtitulo" style="text-align: center">Reporte General</td></tr>
        </table><br>

        <div id="nuevo" style="display: none;" class="estilo_subdiv">        

            <br>
        </div>
        <br>

        <table id="resultado" class="display" width="90%" height="55" style="border:1px;" align="center">
            <thead>
                <tr bgcolor='#CCCFF1'>
                    <th class="colEnc">N°</th>
                    <th class="colEnc">C.I.</th>
                    <th class="colEnc">Paterno</th>
                    <th class="colEnc">Materno</th>
                    <th class="colEnc">Nombres</th>
                    <th class="colEnc">Cargo</th>
                    <th class="colEnc">Estado</th>
                    <th class="colEnc">Código de Ubicación</th>
                    <th class="colEnc">Asignaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once '../mod_configuracion/clases/conexion.php';
                $db = Core::Conectar();



                $consulta = "SELECT d.id_dpto, cd_cnt_dpto, d.nom_dpto, a.cd_cnt_area, a.nom_area, p.id_personal, p.cd_ubicacion, p.ci_personal, p.nom_personal,  p.paterno_personal,  p.materno_personal, p.cargo_personal, p.dir_personal, p.fn_personal, p.estado, p.cd_ubi3 
FROM csa.personal p, csa.departamento d, csa.area a 
WHERE p.estado=true and d.cd_cnt_dpto=a.id_dpto and a.id_area=p.id_area
order by a.id_area";
                $resultado = $db->query($consulta);
                $i = 0;

                if ($resultado->rowCount() > 0) {
                    foreach ($resultado as $fila) {

                        $id = $fila[0];
                        $i = $i + 1;
                        ?>
                        <tr bgcolor="#F2F9FF">   
                            <th align="center" class="colDat"><?php echo $i; ?></th>
                            <th align="center" class="colDat"><?php echo $fila["ci_personal"]; ?></th>
                            <th align="center" class="colDat"><?php echo $fila["paterno_personal"]; ?></th>
                            <th align="center" class="colDat"><?php echo $fila["materno_personal"]; ?></th>
                            <th align="center" class="colDat"><?php echo $fila["nom_personal"]; ?></th>
                            <th align="center" class="colDat"><?php echo $fila["cargo_personal"]; ?></th>
                            <th align="center" class="colDat"><?php echo $fila["estado"]; ?></th>
                            <th align="center" class="colDat"><?php
            echo $fila["id_dpto"];
            echo '.';
            echo $fila["cd_cnt_area"];
            echo '.';
            echo $fila["cd_ubicacion"];
                        ?></th>
                           <th align="center" class="colDat"><?php echo "<a href='../mod_inicio/reportes.php?id_personal=" . $fila["id_personal"] . "&op=76 'title='transferencia'>REPORTE</a>"; ?></th>
                        </tr>
                        <?php
                    }
                }
                $db = null;
                ?>       
            </tbody>
        </table>

    </center>

    <?php
    require("../theme/footer_inicio.php");
} else
    header('Location: ../index.php');
?>
