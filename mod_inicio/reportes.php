<?php
session_start();
if ($_SESSION["usuario_nombre"]) {
    require_once("../mod_configuracion/clases/conexion.php");
    $db = Core::Conectar();
    require_once("../theme/header_inicio.php");
    ?><head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <script type="text/javascript">
            function imprSelec(imprime)
            {
                var ficha = document.getElementById(imprime);
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write(ficha.innerHTML);
                ventimp.document.close();
                ventimp.print();
                ventimp.close();
            }
        </script>
        <!-- Content Center -->

    <div id="centercontent" align="center">

        <a href="javascript:imprSelec('imprime')"><img src="../theme/images/print.png" width="30" height="30"/></a>
        <br /><br />
        <?php
        try {
            $opcion = $_REQUEST["op"];
            $id = $_SESSION["id"];
            //////////////////////////////////////   
            if ($opcion == "1") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE DEPARTAMENTOS ACTIVOS EN LA COOPERATIVA</h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">N&UacuteMERO </th>
                            <th class="colEnc">C&OacuteDIGO DE DEPARTAMENTO</th>
                            <th class="colEnc">DEPARTAMENTO</th>
                            <th class="colEnc">ESTADO</th>
                        </tr> 
                        <?php
                        $resultado = "SELECT id_dpto, cd_cnt_dpto, nom_dpto, case estado when 'true' then 'ACTIVO' else 'INACTIVO' end estado FROM csa.departamento d order by cd_cnt_dpto";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $i; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["cd_cnt_dpto"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["nom_dpto"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
            //////////////////////////////////////////// 
            if ($opcion == "2") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE &AacuteREAS DE TRABAJO</h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">N&UacuteMERO </th>
                            <th class="colEnc">C&OacuteDIGO DE DEPARTAMENTO</th>
                            <th class="colEnc">DEPARTAMENTO</th>
                            <th class="colEnc">C&OacuteDIGO DE &AacuteREA </th>
                            <th class="colEnc">&AacuteREA </th>
                            <th class="colEnc">ESTADO</th>
                            <th class="colEnc">CODI1</th>
                        </tr> 
                        <?php
                        $resultado = "SELECT a.id_dpto, d.nom_dpto, a.id_area, a.nom_area, a.estado, a.cd_ubi1
FROM csa.area a, csa.departamento d  
WHERE a.estado=true and d.cd_cnt_dpto=a.id_dpto 
order by a.id_area";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $i; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["id_dpto"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["nom_dpto"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["id_area"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["nom_area"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["cd_ubi1"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
            ///////////////////////////////////////////////////// 
            if ($opcion == "3") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE CLASIFICADOR DE ACTIVOS</h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">ID</th>
                            <th class="colEnc">ACR&OacuteNIMO</th>
                            <th class="colEnc">GRUPO CONTABLE</th>
                            <th class="colEnc">C&OacuteDIGO SUB GRUPO</th>
                            <th class="colEnc">DESCRIPCI&OacuteN SUB GRUPO</th>
                            <th class="colEnc">C&OacuteDIGO COMPUESTO</th>
                            <th class="colEnc">FECHA</th>
                            <th class="colEnc">ESTADO</th>
                        </tr> 
                        <?php
                        $resultado = "SELECT a.codigo, ga.gc_cnta_sp, ga.descripcion, a.id_subg, a.nombre, a.fecha_reg, a.od_clas_am, a.estado 
FROM csa.activo a, csa.gam ga
WHERE a.estado=true and a.id_gam=ga.id_gam";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $fila["codigo"]; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["gc_cnta_sp"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["descripcion"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["id_subg"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["nombre"]; ?></td>			
                                    <td align="center" class="colDat"><?php
                                        echo $fila["od_clas_am"];
                                        echo '-';
                                        echo $fila["codigo"];
                                        ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["fecha_reg"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
            ///////////////////////////////////////////////   
            if ($opcion == "4") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE PROVEEDORES DE LA COOPERATIVA</h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">N&UacuteMERO </th>
                            <th class="colEnc">NIT</th>
                            <th class="colEnc">EMPRESA</th>
                            <th class="colEnc">DIRECCI&OacuteN </th>
                            <th class="colEnc">TEL&EacuteFONO </th>
                            <th class="colEnc">CORREO</th>
                            <th class="colEnc">CONTACTO</th>
                            <th class="colEnc">ESTADO</th>
                        </tr> 
                        <?php
                        $resultado = "SELECT id_emp, nit, empresa, direccion, telefonos, correo, contacto, 
case estado when 'true' then 'ACTIVO' else 'INACTIVO' end estado 
FROM csa.empresas order by id_emp
";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $i; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["nit"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["empresa"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["direccion"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["telefonos"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["correo"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["contacto"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
            ///////////////////////////////////////////////////////////////   
            if ($opcion == "5") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE TIPO DE CAMBIO <br/>D&OacuteLAR / UFV </h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">N&UacuteMERO </th>
                            <th class="colEnc">FECHA</th>
                            <th class="colEnc">D&OacuteLAR COMPRA</th>
                            <th class="colEnc">D&OacuteLAR VENTA</th>
                            <th class="colEnc">UFV COMPRA</th>
                            <th class="colEnc">UFV VENTA</th>
                        </tr> 
                        <?php
                        $resultado = "SELECT id_tc, fecha, sus_venta, sus_compra, ufv_venta, ufv_compra
FROM csa.tipo_cambio t 
WHERE t.estado=true 
order by fecha";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $i; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["fecha"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["sus_compra"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["sus_venta"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["ufv_compra"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["ufv_venta"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
/////////////////////////////////////////////    
            if ($opcion == "6") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE TIPO DE MATERIAL</h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">N&UacuteMERO </th>
                            <th class="colEnc">TIPO DE MATERIAL</th>
                            <th class="colEnc">ESTADO</th>
                        </tr> 
                        <?php
                        $resultado = "select id_actmat, act_mat, case estado 
when true then 'ACTIVO' else 'INACTIVO' end estado 
from csa.tipo_activo";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $i; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["act_mat"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
//////////////////////////////////////////////////////////////////
            if ($opcion == "7") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE MOTIVO DE BAJA</h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">N&UacuteMERO </th>
                            <th class="colEnc">MOTIVO</th>
                            <th class="colEnc">ESTADO</th>
                        </tr> 
                        <?php
                        $resultado = "SELECT id_motivo, motivo, case estado when true then 'ACTIVO' else 'INACTIVO' end estado FROM csa.motivo_baja order by id_motivo asc";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $i; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["motivo"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["estado"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
            /////////////////////////////////////////
            if ($opcion == "8") {
                ?>
                <a href="repsis.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
                <div id="imprime" style='overflow-y:auto;width:95%;'>
                    <h2>REPORTE GRUPO CONTABLE</h2>
                    <table width="70%" height="55" style="border:1px;" align="center">
                        <tr bgcolor='#CCCFF1'>
                            <th class="colEnc">N&UacuteMERO </th>
                            <th class="colEnc">C&OacuteDIGO </th>
                            <th class="colEnc">ACR&OacuteNIMO </th>
                            <th class="colEnc">DESCRIPCI&OacuteN </th>
                            <th class="colEnc">A&NtildeOS DE VIDA &UacuteTIL </th>
                            <th class="colEnc">COEFICIENTE % </th>
                            <th class="colEnc">RESPONSABLE DEL REGISTRO</th>
                            <th class="colEnc">FECHA DE REGISTRO</th>
                        </tr> 
                        <?php
                        $resultado = "SELECT g.id_gam, g.gc_cnta_cm, g.gc_cnta_sp, g.descripcion, g.depvidut, g.depcoef, p.nom_personal, g.fecha, case g.estado 
when true then 'ACTIVO' else 'INACTIVO' end 
FROM csa.gam g 
inner join csa.tipo_activo t on t.id_actmat=g.id_actmat 
inner join (select u.id_usuario, nom_personal 
from csa.usuarios u, csa.personal p 
where u.id_personal=p.id_personal) p on p.id_usuario=g.id_usr 
order by g.id_gam";
                        $resultado = $db->query($resultado);
                        $i = 0;
                        if ($resultado->rowCount() > 0) {

                            foreach ($resultado as $fila) {
                                $id = $fila[0];
                                $i = $i + 1;
                                ?>
                                <tr bgcolor="#F2F9FF">   
                                    <th scope="row" class="colDat"><?php echo $i; ?></th>
                                    <td align="center" class="colDat"><?php echo $fila["gc_cnta_cm"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["gc_cnta_sp"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["descripcion"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["depvidut"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["depcoef"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["nom_personal"]; ?></td>
                                    <td align="center" class="colDat"><?php echo $fila["fecha"]; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $db = null;
                        ?>       
                    </table>
                </div> <?php
            }
//////////////////////////////////////////////////////////////////
            if ($opcion == "76") {
                $id_personal = $_REQUEST["id_personal"];
            ?>	
            <div id="imprime" style='overflow-y:auto;width:95%;'>

                <?php
				$consuu="SELECT numero, max(numero) as maximo FROM csa.asignacion_activos WHERE id_personal=$id_personal group by numero ";
				$resuu = $db->query($consuu);
				  if ($resuu->rowCount() > 0) {
                    foreach ($resuu as $filu) {
                        $maximo = $filu["maximo"];
			
				$consa="SELECT * FROM csa.personal WHERE id_personal=$id_personal ";
				$resa = $db->query($consa);
				  if ($resa->rowCount() > 0) {
                    foreach ($resa as $filaa) {
                      
				
				?>
				 <div align="center">
                            <table width="auto">
                                <tr>
                                    <td width="300"><img src="../theme/img/manual_Cooperativas.jpg" width="186" height="100" /></td>
                                    <td align="center"><h2>FORMULARIO DE ASIGNACIÓN</h2><h3>INDIVIDUAL DE ACTIVOS FIJOS</h3></td>
                                    <td width="300" align="right"><h1><?php echo  $maximo; ?></h1></td>
                                </tr>
                            </table></div>
                        <h3 align="right">FECHA ACTUAL: <?php echo date('d/m/Y') ?></h3>
                        <table width="90%" height="55" style="border:1px;" align="center">
                            <tr>  
                                <td><h3> RESPONSABLE: <?php
                                        echo $filaa["paterno_personal"];
                                        echo " ";
                                        echo $filaa["materno_personal"];
                                        echo " ";
                                        echo $filaa["nom_personal"];
                                        ?></h3><h3> CARGO: <?php echo $filaa["cargo_personal"]; ?></h3></td>
                            </tr>    
                        </table>
						<table width="90%" height="55" style="border:1px;" align="center" border="1">
                            <tr bgcolor='#CCCFF1'>
                                <th class="colEnc">N°</th>
                                <th class="colEnc">CÓDIGO </th>
                                <th class="colEnc">DESCRIPCIÓN</th >
                                <th class="colEnc">ESTADO </th>
                                <th class="colEnc">OBSERVACIONES</th>
                            </tr>

				<?php
                $consulta1 = "SELECT p.id_personal, p.nom_personal,  p.paterno_personal,  p.materno_personal, p.cargo_personal, a.od_clas_am, a.codigo, ra.id_regact, aa.numero, extract(year from ra.fecha_compra::date) as anio, ri.descripcion_act, ea.est_tec, aa.observaciones
FROM csa.personal p, csa.activo a, csa.registro_activos ra, csa.asignacion_activos aa, csa.estado_activo ea, csa.registro_individual ri
WHERE ri.id_act=a.codigo and ra.id_regact=ri.id_regact and ri.id_regind=aa.id_regact and p.id_personal=aa.id_personal and ri.estado_activo=ea.id_estado and aa.estado=true and ri.estado=true and p.id_personal=$id_personal and aa.numero=$maximo";

                $resultado1 = $db->query($consulta1);
                $i = 0;
                if ($resultado1->rowCount() > 0) {
                    foreach ($resultado1 as $fila1) {
                        $id = $fila1[0];
                        $i = $i + 1;
                        ?>   
                              <tr bgcolor="#F2F9FF">  
                                <th align="center" class="colDat"><?php echo $i; ?></th>
                                <th align="center" class="colDat"><?php
                                    echo $fila1["od_clas_am"];
                                    echo '-';
                                    echo $fila1["codigo"];
                                    echo '-';
                                    echo $fila1["id_regact"];
                                    echo '-';
                                    echo $fila1["anio"];
                                    ?></th>
                                <th align="center" class="colDat"><?php echo $fila1["descripcion_act"]; ?></th>
                                <th align="center" class="colDat"><?php echo $fila1["est_tec"]; ?></th>
                                <th align="center" class="colDat"><?php echo $fila1["observaciones"]; ?></th></tr>
<?php
						 }
        }
						?>
                        </table><br />
						
                        <h3 align="justify">NOTA: A PARTIR DE LA FECHA QUEDA COMO DEPOSITARIO DE TODOS LOS ITEMS QUE SE DETALLAN EN EL FORMULARIO, CUALQUIER PERDIDA DESTRUCCION O MALTRATO QUE PUEDA SUFRIR, SERA IMPUTADA A SU PERSONA MIENTRAS NO DEMUESTRE LO CONTRARIO.</h3>
                        <table width="60%" height="55" style="border:1px;" align="center" border="1">
                            <tr>
                                <th align="center" width="15%"><p>Firma</p></th>
                            <th align="center" width="15%"><p>Firma</p></th>
                            <th align="center" width="15%"><p>Firma</p></th>
                            <th align="center" width="15%"><p>Firma</p></th></tr>

                            <tr>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>RECIBIDO POR</p></td>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>ENTREGADO POR</p></td>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>Vo.Bo. TESORERO</p></td>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>Vo.Bo. JEFE AREA CONTABLE</p></td></tr>
                        </table>
                    </div></br></br>
                    <center><?php echo "<a href='pdf.php?id_personal=" . $fila1["id_personal"] . " & numero=" . $fila1["numero"] . " &op=76 'title='reporte' />" . "<img src='../theme/img/downalod-pdf.jpg' width='230' height='61'/>" . "</a>"; ?></center>
                    <p align="center">Ver tabla en PDF</p>
                    </div>
                    <?php
					}
					}
                }
            }
        }
        //////////////////////////////////////////////////////////////////
        if ($opcion == "78") {
            $id_personal = $_REQUEST["id_personal"];
            ?>	
            <div id="imprime" style='overflow-y:auto;width:95%;'>

                <?php
				$consuu="SELECT numero, max(numero) as maximo FROM csa.devolucion_activos WHERE id_personal=$id_personal group by numero ";
				$resuu = $db->query($consuu);
				  if ($resuu->rowCount() > 0) {
                    foreach ($resuu as $filu) {
                        $maximo = $filu["maximo"];
			
				$consa="SELECT * FROM csa.personal WHERE id_personal=$id_personal ";
				$resa = $db->query($consa);
				  if ($resa->rowCount() > 0) {
                    foreach ($resa as $filaa) {
                      
				
				?>
				 <div align="center">
                            <table width="auto">
                                <tr>
                                    <td width="300"><img src="../theme/img/manual_Cooperativas.jpg" width="186" height="100" /></td>
                                    <td align="center"><h2>FORMULARIO DE DEVOLUCIÓN</h2><h3>INDIVIDUAL DE ACTIVOS FIJOS</h3></td>
                                    <td width="300" align="right"><h1><?php echo  $maximo; ?></h1></td>
                                </tr>
                            </table></div>
                        <h3 align="right">FECHA ACTUAL: <?php echo date('d/m/Y') ?></h3>
                        <table width="90%" height="55" style="border:1px;" align="center">
                            <tr>  
                                <td><h3> RESPONSABLE: <?php
                                        echo $filaa["paterno_personal"];
                                        echo " ";
                                        echo $filaa["materno_personal"];
                                        echo " ";
                                        echo $filaa["nom_personal"];
                                        ?></h3><h3> CARGO: <?php echo $filaa["cargo_personal"]; ?></h3></td>
                            </tr>    
                        </table>
						<table width="90%" height="55" style="border:1px;" align="center" border="1">
                            <tr bgcolor='#CCCFF1'>
                                <th class="colEnc">N°</th>
                                <th class="colEnc">CÓDIGO </th>
                                <th class="colEnc">DESCRIPCIÓN</th >
                                <th class="colEnc">ESTADO </th>
                                <th class="colEnc">OBSERVACIONES</th>
                            </tr>

				<?php
                $consulta1 = "SELECT p.id_personal, p.nom_personal,  p.paterno_personal,  p.materno_personal, p.cargo_personal, a.od_clas_am, a.codigo, ra.id_regact, aa.numero, extract(year from ra.fecha_compra::date) as anio, ri.descripcion_act, ea.est_tec, aa.observaciones
FROM csa.personal p, csa.activo a, csa.registro_activos ra, csa.devolucion_activos aa, csa.estado_activo ea, csa.registro_individual ri
WHERE ri.id_act=a.codigo and ra.id_regact=ri.id_regact and ri.id_regind=aa.id_regact and p.id_personal=aa.id_personal and ri.estado_activo=ea.id_estado and aa.estado=true and ri.estado=true and p.id_personal=$id_personal and aa.numero=$maximo";

                $resultado1 = $db->query($consulta1);
                $i = 0;
                if ($resultado1->rowCount() > 0) {
                    foreach ($resultado1 as $fila1) {
                        $id = $fila1[0];
                        $i = $i + 1;
                        ?>   
                              <tr bgcolor="#F2F9FF">  
                                <th align="center" class="colDat"><?php echo $i; ?></th>
                                <th align="center" class="colDat"><?php
                                    echo $fila1["od_clas_am"];
                                    echo '-';
                                    echo $fila1["codigo"];
                                    echo '-';
                                    echo $fila1["id_regact"];
                                    echo '-';
                                    echo $fila1["anio"];
                                    ?></th>
                                <th align="center" class="colDat"><?php echo $fila1["descripcion_act"]; ?></th>
                                <th align="center" class="colDat"><?php echo $fila1["est_tec"]; ?></th>
                                <th align="center" class="colDat"><?php echo $fila1["observaciones"]; ?></th></tr>
<?php
						 }
        }
						?>
                        </table><br />
						
                        <h3 align="justify">NOTA: A PARTIR DE LA FECHA QUEDA COMO DEPOSITARIO DE TODOS LOS ITEMS QUE SE DETALLAN EN EL FORMULARIO, CUALQUIER PERDIDA DESTRUCCION O MALTRATO QUE PUEDA SUFRIR, SERA IMPUTADA A SU PERSONA MIENTRAS NO DEMUESTRE LO CONTRARIO.</h3>
                        <table width="60%" height="55" style="border:1px;" align="center" border="1">
                            <tr>
                                <th align="center" width="15%"><p>Firma</p></th>
                            <th align="center" width="15%"><p>Firma</p></th>
                            <th align="center" width="15%"><p>Firma</p></th>
                            <th align="center" width="15%"><p>Firma</p></th></tr>

                            <tr>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>RECIBIDO POR</p></td>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>ENTREGADO POR</p></td>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>Vo.Bo. TESORERO</p></td>
                                <td align="center" style="padding-top: 100px;" width="15%"><p>Vo.Bo. JEFE AREA CONTABLE</p></td></tr>
                        </table>
                    </div></br></br>
                    <center><?php echo "<a href='pdf.php?id_personal=" . $fila1["id_personal"] . " & numero=" . $fila1["numero"] . " &op=76 'title='reporte' />" . "<img src='../theme/img/downalod-pdf.jpg' width='230' height='61'/>" . "</a>"; ?></center>
                    <p align="center">Ver tabla en PDF</p>
                    </div>
                    <?php
					}
					}
                }
            }
        }
		
        //////////////////////////////////////////////////////////////////
        if ($opcion == "77") {
            $id_regact = $_REQUEST["id_regact"];
            ?>
            <a href="../mod_cert/activos.php"><img src="../theme/images/volver.jpg" width="30" height="30"/></a>
            <div id="imprime" style='overflow-y:auto;width:95%;'>
                <h2>DETALLE DE COMPRA</h2>
                <h2>FACTURA <?php echo $id_regact; ?></h2>
                <table width="90%" height="55" style="border:1px;" align="center">
                    <tr bgcolor='#CCCFF1'>
                        <th class="colEnc">N&UacuteMERO </th>
                        <th class="colEnc">REGISTRO</th>
                        <th class="colEnc">ACTIVO</th>
                        <th class="colEnc">CORRELATIVO</th>
                        <th class="colEnc">GESTI&OacuteN </th>
                        <th class="colEnc">RECIBIDO POR</th>
                        <th class="colEnc">DESCRIPCI&OacuteN</th>
                        <th class="colEnc">MARCA</th>
                        <th class="colEnc">MODELO</th>
                        <th class="colEnc">SERIE</th>
                        <th class="colEnc">COSTO</th>
                        <th class="colEnc">OBSERVACIONES</th>
                    </tr> 
                    <?php
                    $consulta = "SELECT ri.id_regact, ri.id_act, ri.correlativo_cantidad, ri.gestion, p.nom_personal, ri.descripcion_act, ri.marca, ri.modelo, ri.serie, ri.costo, ri.observaciones FROM csa.registro_individual ri, csa.personal p WHERE id_regact=$id_regact and p.id_personal=ri.recibido order by ri.correlativo_cantidad;";
                    $resultado = $db->query($consulta);
                    $i = 0;
                    if ($resultado->rowCount() > 0) {

                        foreach ($resultado as $fila) {
                            $id = $fila[0];
                            $i = $i + 1;
                            ?>
                            <tr bgcolor="#F2F9FF">   
                                <th scope="row" class="colDat"><?php echo $i; ?></th>
                                <td align="center" class="colDat"><?php echo $fila["id_regact"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["id_act"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["correlativo_cantidad"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["gestion"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["nom_personal"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["descripcion_act"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["marca"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["modelo"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["serie"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["costo"]; ?></td>
                                <td align="center" class="colDat"><?php echo $fila["observaciones"]; ?></td>			
                            </tr>
                            <?php
                        }
                    }
                    $db = null;
                    ?>       
                </table>
            </div> <?php
        }

        //////////////////////////
        $db = null;
    } catch (PDOException $e) {
        echo "Se tiene un problema con la conexion.<br>Mensaje de error: " . $e->getMessage() . "<br>Por favor comuniquese con personal de sistemas.";
    }
    ?>
    </div>
    <?php
    require("../theme/footer_inicio.php");
} else
    header('Location: ../index.php');
?>
</head>
