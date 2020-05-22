<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<?php
$uri = substr( $_SERVER['REQUEST_URI'],33);
echo '<title>'.$uri.'</title>';
?>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/business-casual.min.css" rel="stylesheet">
</head>
<body style="background-image: url('../img/back.jpg');">
<!-- PHP-->
<?php
$uri = substr( $_SERVER['REQUEST_URI'],33);
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "mybooks";
          $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $sql = 'SELECT EID,titolo,autore,descrizione FROM libro WHERE EID="'.$uri.'"';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $sql = 'SELECT Eid,Img FROM immagine WHERE Eid="'.$uri.'"';
              $result1 = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                  while($row1 = $result1->fetch_assoc()) {
                    $encoded_image=base64_encode($row1["Img"]);
                echo '  <section class="page-section clearfix"><div class="container"><div class="intro"><img class="intro-img img-fluid mb-3 mb-lg-0 rounded" style="max-height:450px;max-width:400px;" src="data:image/jpeg;base64,'.$encoded_image.'" alt=""><div class="intro-text left-0 text-center bg-faded p-5 rounded"><h2 class="section-heading mb-4"><span class="section-heading-upper">'.$row["autore"].'</span><span class="section-heading-lower">'.$row["titolo"].'</span></h2></div></div></div></section>';
                echo '<section class="page-section cta"><div class="container"><div class="row"><div class="col-xl-9 mx-auto"><div class="cta-inner text-center rounded"><h2 class="section-heading mb-4"><span class="section-heading-upper">Descrizione</span></h2><p class="mb-0">'.$row["descrizione"].'</p></div></div></div></div></section>';
              }}
            
            }
            $conn->close();
?>
<!-- FINE PHP-->



  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; MyBooks 2020</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>