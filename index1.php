<!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MyBooks</title>

  
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" style="color:white;" >MyBooks</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">

    <header class="jumbotron my-4"style="background-color:lightblue;"> 
      <h1 class="display-3">Benvenuto su MyBooks</h1>
      <p class="lead">Questo sito ti permetterà di accedere ad un catalogo di libri ed ordinarlo sul web.</p>
    <!--  <a href="#" class="btn btn-primary btn-lg">Call to action!</a>-->
    </header> 

    <div class="row text-center">
      <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "mybooks";
          $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT ID, Eid, Img FROM immagine";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

              $conn1 = new mysqli($servername, $username, $password, $dbname);
            if ($conn1->connect_error) {
              die("Connection failed: " . $conn1->connect_error);
            }
              // output data of each row
            while($row = $result->fetch_assoc()) {
              $sql1 = 'SELECT EID, titolo, link, autore, categoria FROM libro WHERE EID="'.$row["Eid"].'"';
              $result1 = $conn1->query($sql1);
              while($row1 = $result1->fetch_assoc()) {
                $encoded_image=base64_encode($row["Img"]);
                echo '<div class="col-lg-3 col-md-6 mb-4"><div class="card h-100"><img style="max-height:330px;" src="data:image/jpeg;base64,'.$encoded_image.'" alt=""/><div class="card-body"><h4 class="card-title">'.$row1["titolo"].'</h4><p class="card-text"></p></div><div class="card-footer"><a href="dettaglio/dettagli.php/'.$row1["EID"].'" class="btn btn-primary">Scopri i dettagli!</a></div></div></div>';
              }
            }
              $conn1->close();
            } else {
              echo "0 results";
            }
            $conn->close();
       ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MyBooks 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>