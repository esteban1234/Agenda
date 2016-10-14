<?php 
    $db = new conexion();
    $RP = $_GET['rp'];
    $ID = $_GET['id'];
    $f_inicial = $_GET['fi'];
    $f_final = $_GET['ff'];
    $suma = 0;
    $num =0;

    if($RP == '1')
    {
      $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">Estado de Cuenta por Cliente</div><br/>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

        $consulta = $db->query("SELECT * FROM totfac WHERE NUM_CLI='$ID';");
    
    $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      
                      <th>N° Credito</th>
                      <th>Fecha Credito</th>
                      
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
            $idcli = $fila['NUM_CLI'];
            $sql = $db->query("SELECT NOM_CLI FROM catacli WHERE NUM_CLI='$idcli';");
            $cli = $db->runs($sql);

            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['FEC_FAC']."</td>
                      <td style='text-align:right'>".'$ '.$fila['TOT_PAG']."</td>
                    </tr>";
            $suma = $suma + $fila['TOT_PAG'];
            $num = $fila['NUM_CLI'];
        }
            $HTML .= "</tbody></table>";
            $nombre = '<div class=""><b>Credito: </b>'.$num.' <br/><b>Nombre: </b>'.$cli['NOM_CLI'].'</div>';

            $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CREDITO</th>
                        <td style="text-align:right"> $'.$suma.'</td>
                    </tr>
                    </thead></table>';
    }

    if($RP == '2')
    {

          $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">VENTAS POR DIAS</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

         $consulta = $db->query("SELECT * FROM catacli");

    $HTML ='<table class="tablav" border="1"><thead>
                    <tr>
                      <th>Credito N°</th>
                      <th>Fecha Credito</th>
                      <th>Fecha Vencimiento</th>
                      <th>Dias por Vencer</th>
                      <th>Vencido mas de 30</th>
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        { 
            $cliente = $fila['NUM_CLI'];
            $query = $db->query("SELECT * FROM totfac WHERE NUM_CLI='$cliente'");
            $resultado = $db->runs($query);   

            $HTML .= "
                    <tr>
                      <td>".$resultado['NUM_FAC']."</td>
                      <td>".$resultado['FEC_FAC']."</td>
                      <td>".$resultado['FEC_FAC']."</td>
                      <td>".$resultado['FEC_PAG']."</td>
                      <td>".$resultado['TOT_FAC']."</td>
                      <td>".$resultado['SAL_DOF']."</td>
                    </tr>";
            $suma = $suma + $resultado['TOT_FAC'];
            
        }
            
              $HTML .= "</tbody></table>";
             $nombre = '<div class=""><b>Credito: </b>'.$num.' <br/><b>Nombre: </b>'.$resultado['NOM_CLI'].'</div><br/>';

            $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CONTADO</th><td>0</td></tr>
                    <tr><th>TOTAL CREDITO</th><td>'.$suma.'</td></tr>
                    </thead></table>';
    }

    if($RP == '3')
    {

         
          $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">VENTAS POR DIAS</div><br/>
                <div class="titulo fecha">Del '.$f_inicial.' Al '.$f_final.'</div>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

         $consulta = $db->query("SELECT * FROM totfac WHERE FEC_FAC BETWEEN '$f_inicial' AND '$f_final';");

    $HTML ='<table class="tablav" border="1"><thead>
                    <tr>
                      <th>Credito N°</th>
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>Fecha de pago</th>
                      <th>Pagos</th>
                      <th>Factura</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        { 
            $cliente = $fila['NUM_CLI'];
            $query = $db->query("SELECT * FROM catacli WHERE NUM_CLI='$cliente';");
            $resultado = $db->runs($query);   

            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$fila['FEC_FAC']."</td>
                      <td>".$resultado['NOM_CLI']."</td>
                      <td>".$resultado['SAL_CLI']."</td>
                      <td>".$fila['TOT_FAC']."</td>
                      
                    </tr>";
            $suma = $suma + $resultado['TOT_FAC'];
            
        }
            
              $HTML .= "</tbody></table>";
             $nombre = '<div class=""><b>Credito: </b>'.$num.' <br/><b>Nombre: </b>'.$resultado['NOM_CLI'].'</div><br/>';

            $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CONTADO</th><td>0</td></tr>
                    <tr><th>TOTAL CREDITO</th><td>'.$suma.'</td></tr>
                    </thead></table>';
    }

    if($RP == '4')
    {

          $encabezado = '
        <div class="estilo">
            <div class="img"><img class="imglogo" src="views/app/images/logo.png" alt="">
                <div class="fecha">Fecha:'.date('d-m-Y').'</div>
            </div>
            <div class="contiene">
                <div class="titulo">SISTEMA DE CREDITO</div>
                <div class="titulo centro">PRESTAMIGUITO</div>
                <div class="titulo pequeno">Estado de Cuenta por Zona</div><br/>
                <div class="num_pag">PAG {PAGENO}</div>
            </div>
        </div>';

     
         $consulta = $db->query("SELECT FAC.NUM_FAC,FAC.FEC_FAC,FAC.TOT_FAC,FAC.NUM_CLI 
           FROM totfac AS FAC
           WHERE FAC.FEC_FAC BETWEEN '$f_inicial' AND '$f_final' AND FAC.NUM_AGE='$ID';");

       $HTML ='<table class="tablac" border="1"><thead>
                    <tr>
                      <th>N° Cliente</th>
                      <th>N° Factura</th>
                      <th>Cliente</th>
                      <th>Fecha</th>
                      <th>Total</th>
                    </tr></thead><tbody>';
        while($fila = $db->runs($consulta))
        {
            $nameid = $fila['NUM_CLI'];
            $sql = $db->query("SELECT NOM_CLI FROM catacli WHERE NUM_CLI = '$nameid';");
            $resultado = $db->runs($sql);

            $HTML .= "
                    <tr>
                      <td>".$fila['NUM_FAC']."</td>
                      <td>".$resultado['NOM_CLI']."</td>
                      <td>".$fila['FEC_FAC']."</td>
                      <td>".$fila['TOT_FAC']."</td>
                    </tr>";
            $suma = $suma + $fila['TOT_FAC'];
        }
            $HTML .= "</tbody></table>";

             $tabla2 = '<br/><table class="tablados" border="1"><thead>
                    <tr><th>TOTAL CREDITO</th><td>'.$suma.'</td></tr>
                    </thead></table>';
    }
  
    

    $mpdf = new mPDF('C','','','',15,15,55,15,10,10);
    
    $stylesheet = file_get_contents('views/app/css/estiloreporte.css');
    $mpdf->WriteHTML($stylesheet,1);

    $mpdf->SetHeader(utf8_decode($encabezado));
    $mpdf->WriteHTML(utf8_decode($nombre));
    $mpdf->WriteHTML(utf8_decode($HTML));
    $mpdf->WriteHTML($tabla2);
    $mpdf->Output();


?>
