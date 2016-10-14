<?php

    class PDF extends FPDF
    {

    function Header()
 
    {
        setlocale(LC_TIME, "spanish");
        
        $fecha = strftime("%d-%b-%Y", strtotime(date('d-m-Y')));
       // seteamos el tipo de letra Arial Negrita 16
    $this->SetFont('Arial','B',16);
 
    // ponemos una celda sin contenido para centrar el titulo o la celda del titulo a la derecha
    $this->Cell(50);
 
    // definimos la celda el titulo
    $this->SetFillColor(79,2,140);//Fondo verde de celda
    $this->SetTextColor(240, 255, 240); //Letra color blanco
    $this->RoundedRect(5, 5, 200, 40, 2,'FD');
    $this->Image('views/app/images/logo.png' , 5 ,5, 40 , 30,'PNG', 'http://www.desarrolloweb.com');
    $this->SetX(-75);
    $this->CellFitSpace(70,7, "SISTEMA DE CREDITO",0,1,'C');
    $this->CellFitSpace(190,7, "PRESTAMIGUITO",0,1,'C');
    $this->CellFitSpace(190,7, utf8_decode("Catalogo de Agentes"),0,1,'C');
    $this->Ln(5);
    $this->CellFitSpace(50,7, "Fecha: ".$fecha,0,0,'C');
    //$this->Cell(100,10,'Encabezado Reporte de Ventas',1,0,'C');
 
    // Salto de línea salta 20 lineas
    $this->Ln(20);
 
    }

    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(5, 50);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(2,157,116);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        $ejeX = 5;
        $letra = 'D';
        $array = array($cabecera);
        foreach($array as $fila)
        {
            //$this->RoundedRect(5, 10, 18, 7, 2, 'FD');
            $this->RoundedRect($ejeX, 50, 200, 7, 2,'FD');
            $this->CellFitSpace(15,7, utf8_decode($fila[0]),0, 0 , 'C');
            $this->CellFitSpace(70,7, utf8_decode($fila[1]),'LR', 0 , 'C');
            $this->CellFitSpace(50,7, utf8_decode($fila[2]),'LR', 
                0 , 'C');
            $this->CellFitSpace(28,7, utf8_decode($fila[3]),'LR', 0 , 'C');

            $this->CellFitSpace(35,7, utf8_decode($fila[4]),0, 0 , 'C');
            $ejeX = $ejeX + 40;
        }
    }
 
    function datosHorizontal()
    {
        $this->SetXY(7,57);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        $ejeY = 57; //Aquí se encuentra la primer CellFitSpace e irá incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        $db = new conexion();
        $id = $_GET['id'];

        if($id == '1')
        {
            $consulta = $db->query("SELECT * FROM cataage;");
        }
        else
        {
            $consulta = $db->query("SELECT * FROM cataage ORDER BY NOM_AGE ASC;");
        }
        

        foreach($consulta as $fila)
        {
            //Por cada 3 CellFitSpace se crea un RoundedRect encimado
            //El parámetro $letra de RoundedRect cambiará en cada iteración
            //para colocar FD y D, la primera iteración es D
            //Solo la celda de enmedio llevará bordes, izquierda y derecha
            //Las celdas laterales colocarlas sin borde
            $this->SetX(7);
            $this->RoundedRect(5, $ejeY, 200, 7, 2);
            $this->SetFont('Arial','',7);
            //$this->CellFitSpace(40,7, utf8_decode($fila['id_user']),0, 0 , 'L' );
            $this->CellFitSpace(13,7, utf8_decode($fila['NUM_AGE']),0, 0 , 'C' );

            $this->CellFitSpace(70,7, utf8_decode($fila['NOM_AGE']),'LR', 0 , 'L' );
            $this->CellFitSpace(50,7, utf8_decode($fila['VTA_AGE']),0,0,'C');
            $this->CellFitSpace(28,7, utf8_decode($fila['NUM_ZON']),'LR', 0 , 'C' );
            $this->CellFitSpace(35,7, utf8_decode($fila['POR_COM']),0, 0 , 'C' );
 
            $this->Ln();
            //Condición ternaria que cambia el valor de $letra
            ($letra == 'D') ? $letra = 'FD' : $letra = 'D';
            //Aumenta la siguiente posición de Y (recordar que X es fijo)
            //Se suma 7 porque cada celda tiene esa altura
            $ejeY = $ejeY + 7;
        }
    }
 
    function tablaHorizontal($cabeceraHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal();
    }
 
    //**************************************************************************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//**********************************************************************************************
 
 function RoundedRect($x, $y, $w, $h, $r, $style = '', $angle = '1234')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' or $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2f %.2f m', ($x+$r)*$k, ($hp-$y)*$k ));
 
        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-$y)*$k ));
        if (strpos($angle, '2')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
 
        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$yc)*$k));
        if (strpos($angle, '3')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
 
        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-($y+$h))*$k));
        if (strpos($angle, '4')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
 
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$yc)*$k ));
        if (strpos($angle, '1')===false)
        {
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$y)*$k ));
            $this->_out(sprintf('%.2f %.2f l', ($x+$r)*$k, ($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }
 
    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }

    function Footer()
 
    {
    // Seteamos la posicion de la proxima celda en forma fija a 1,5 cm del final de la pagina
 
    $this->SetY(-15);
    // Seteamos el tipo de letra Arial italica 10
 
    $this->SetFont('Arial','I',10);
    // Número de página
 
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
} // FIN Class PDF

 
$pdf = new PDF();
$pdf->AliasNbPages();


// $db = new conexion();
// $id = $_GET['id'];
// $consulta = $db->query("SELECT * FROM catacli WHERE NUM_ZON = '$id';");


    $pdf->AddPage();
    $miCabecera = array('Código', 'Nombre','Ventas','Zona','% Comisión');
    $pdf->tablaHorizontal($miCabecera);


//$pdf->Header();
$pdf->Output(); //Salida al navegador

?>