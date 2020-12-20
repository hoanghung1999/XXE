<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-inverse">

      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li class=""><a href="about.php">ABOUT</a></li>
      </ul>
    </nav>
  </div>
  <div class="container">
    <h1 class="text-centet">WELL COME MY WebSite</h1>
    <div class="container" style="margin: 0 auto;">
      <h3 class="text-center"> PARSE</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Year of Birth</th>
            <th>School</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['file'])) {
              $file = $_GET['file'];
              $xmlDoc = new DOMDocument();
              $xmlDoc->load("uploads/" . $file, LIBXML_NOENT | LIBXML_DTDLOAD);
              $xmlList = simplexml_import_dom($xmlDoc);
              foreach ($xmlList->children() as $student) {
                echo '<tr>';
                echo '<td>' . $student->name . '</td>';
                echo '<td>' . $student->year . '</td>';
                echo '<td>' . $student->school . '</td>';
                echo '</tr>';
              }
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>