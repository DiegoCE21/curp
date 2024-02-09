<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CURP</title>
  <link rel="stylesheet" href="subirarchivo.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/frontImg.jpg" alt="">
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Detector de CURPs</div>
          <form method="post" action="creacion.php" enctype="multipart/form-data">
            <div class="input-boxes">
              <label for="file-input" class="drop-container" id="pdfcurp">
                <span class="drop-title">Suelta tu archivo de CURP aquí</span>
                ó
                <input type="file" accept=".pdf" required id="file-input" name="file-input"> <!-- Added name attribute -->
              </label>
              <div class="button input-box">
                <input type="submit" value="Subir">
              </div>
              <div class="text sign-up-text">
                ¿No conoces tu CURP?
                <a href="https://www.gob.mx/curp/" target="_blank">Consultala aquí</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function cambiarColor() {
      var div = document.getElementById("pdfcurp");
      div.style.background = "#b7b6ff";
    }
  </script>
</body>
</html>
