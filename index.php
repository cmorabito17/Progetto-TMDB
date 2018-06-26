<!DOCTYPE html>
<html>
<head>
<title>Progetto TMDB</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>
<body>

<div><img src="img/logo_tmdb.jpg"></div>

<div class="container">
  <form action="search_person.php" id="form" method="get">
    <label for="fname">Inserisci Nome Attore</label>
    <input type="text" id="name" name="name" required>
    <input type="submit" value="Ricerca">
  </form>
</div>

</body>
</html>