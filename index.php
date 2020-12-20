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
      <div class="jumbotron">
        <form action="controller/pushfile.php" method="POST" enctype="multipart/form-data">
          <div class="title">Upload file </div>
          <input type="file" class="input" name="file">
          <input style="display: inline-block;" type="submit" name="submit">
        </form>
      </div>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name file</th>
            <th>Download</th>
            <th>Parse XML ERR</th>
            <th>Parse XML FIX</th>

          </tr>
        </thead>
        <tbody>
        <?php
        $dir="uploads";
        $files=scandir($dir);
        $size=sizeof($files);
        for($i=2;$i<$size;$i++){
          echo ' <tr>
          <td>'.$files[$i].'</td>
          <td><a href="uploads/'.$files[$i].'">download</a></td>
          <td><a href="parse.php?file='.$files[$i].'">parse</a></td>
          <td><a href="parse_fixed.php?file='.$files[$i].'">parse</a></td>

        </tr>';
        }
        ?> 
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>