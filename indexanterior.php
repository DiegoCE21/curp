<?php
$pdfPath =         '/usr/local/apache/htdocs/code/curp.pdf';
$outputImagePath = '/usr/local/apache/htdocs/code/imagen';
// Coordenadas y dimensiones de la región que deseas convertir
$x = 1000;    // Coordenada X de la esquina superior izquierda en puntos
$y = 250;    // Coordenada Y de la esquina superior izquierda en puntos
$width = 300;  // Ancho de la región en puntos
$height = 200; // Altura de la región en puntos

$outputImageFile = $outputImagePath . '-1.png';
//echo $outputImageFile;
// Convertir PDF a imagen
$convertCommand = "/usr/bin/pdftoppm -png -x $x -y $y -W $width -H $height $pdfPath $outputImagePath";

$output = exec($convertCommand);
//usr/bin/pdftoppm -png -x 1000 -y 250 -W 300 -H 200 /usr/local/apache/htdocs/code/curp.pdf /usr/local/apache/htdocs/code/imagen

// Escanear código QR
$qrScanCommand = "/usr/bin/zbarimg --quiet --raw $outputImageFile";
$qrCodeData = shell_exec($qrScanCommand);

if ($qrCodeData !== null) {
    $pieces = explode("||", $qrCodeData);
    echo "CURP: " . $pieces[0]; 
    echo "<br>";
    $quitar = 20;
    $nueva_cadena = substr($qrCodeData, $quitar);
    $curp = explode("|", $nueva_cadena);
    echo "Apellido paterno: " . $curp[0];
    echo "<br>"; 
    echo "Apellido materno: " . $curp[1];
    echo "<br>";
    echo "Nombre: " . $curp[2];
    echo "<br>"; 
    echo "Sexo: " . $curp[3];
    echo "<br>"; 
    echo "Fecha de nacimiento: " . $curp[4];
    echo "<br>"; 
    echo "Entidad federativa: " . $curp[5]; 

    unlink("$outputImagePath-1.png");
} else {
    echo "No se pudo escanear un codigo QR.";
}

?>





