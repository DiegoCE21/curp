<?php
$pdfPath = $_FILES['file-input']['tmp_name'];
$outputImagePath = '/usr/local/apache/htdocs/code/imagen';
$x = 1000;
$y = 250;
$width = 300;
$height = 200;
$outputImageFile = $outputImagePath . '-1.png';
$escPdfPath = escapeshellarg($pdfPath);
$convertCommand = "/usr/bin/pdftoppm -png -x $x -y $y -W $width -H $height $pdfPath $outputImagePath";
exec($convertCommand, $convertOutput, $convertStatus);

if ($convertStatus === 0) {
    $qrScanCommand = "/usr/bin/zbarimg --quiet --raw $outputImageFile";
    $qrCodeData = shell_exec($qrScanCommand);

    if ($qrCodeData !== null) {
        $pieces = explode("||", $qrCodeData);
        $quitar = 20;
        $nueva_cadena = substr($qrCodeData, $quitar);
        $curp = explode("|", $nueva_cadena);
        ?>
        <!DOCTYPE html>
<html>
<head>
    <title>Pagina</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <p>CURP</p>
                <input type="text" class="color" value="<?php echo $pieces[0] ?>" readonly="true">
            </div>
            <div class="col">
                <p>Apellido paterno:</p>
                <input type="text" class="color" value="<?php echo $curp[0] ?>" readonly="true">
            </div>
            <div class="col">
                <p>Apellido materno:</p>
                <input type="text" class="color" value="<?php echo $curp[1] ?>" readonly="true">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>Nombre:</p>
                <input type="text" class="color" value="<?php echo $curp[2] ?>" readonly="true">
            </div>
            <div class="col">
                <p>Sexo:</p>
                <input type="text" class="color" value="<?php echo $curp[3] ?>" readonly="true">
            </div>
            <div class="col">
                <p>Fecha de nacimiento:</p>
                <input type="text" class="color" value="<?php echo $curp[4] ?>" readonly="true">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>Entidad federativa:</p>
                <input type="text" class="color" value="<?php echo $curp[5] ?>" readonly="true">
            </div>
            <div class="col">
                <p>No. del seguro social:</p>
                <input type="text">
            </div>
            <div class="col">
                <p>Estado civil:</p>
                <select>
                    <option value="soltero">Soltero(a)</option>
                    <option value="casado">Casado(a)</option>
                    <option value="divorciado">Divorciado(a)</option>
                    <option value="viudo">Viudo(a)</option>
                    <option value="unionLibre">Union libre</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>Domicilio actual (Calle y numero):</p>
                <input type="text" readonly="true">
            </div>
            <div class="col">
                <p>Sexo:</p>
                <input type="text" readonly="true">
            </div>
            <div class="col">
                <p>Fecha de nacimiento:</p>
                <input type="text" readonly="true">
            </div>
        </div>

    </div>
</body>
</html>
<?php
    } else {
        echo "No se ha encontrado un codigo QR, asegurate de subir un archivo obtenido de la pagina oficial .";
    }
} else {
    echo "No se ha encontrado un codigo QR, asegurate de subir un archivo obtenido de la pagina oficial .";
}
?>

