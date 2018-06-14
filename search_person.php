<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>

<title>Progetto TMDB</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/style_page.css">

</head>

<body>

<div id="header">
<div style="margin-left:180px;margin-top:12px;"><img src="img/logo_tmdb.jpg"></div>
</div>

<div id="header_bottom">
<div style="margin-top:5px;">Ricerca film per attore nel database THE MOVIE DB</div>
</div>

<?php

$name = stripslashes($_GET['name']);

$query = str_replace(" ", "+", $name);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.themoviedb.org/3/search/person?include_adult=false&page=1&language=en-US&query=$query&api_key=60a1ae750613a7c0c31edc46eba887a7",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  
$data = json_decode($response, true);

$data_movie = $data['results'];

  foreach ($data_movie as $val) {

    echo ' <div style="float:left; text-align:right;      display:block; width:50%; height:460px;margin-top:210px;">';

$poster = $val['profile_path'];

    echo '<img src="https://image.tmdb.org/t/p/w342/'.$poster.'" id="img">';

    echo '</div>';

    echo '<div style="float:left; text-align:left; display:block; width:40%; height:460px;margin-top:210px;">';

    echo'<div style="font-family: Arial; font-size:30px; font-weight:bold; margin-left:20px;">';

    echo $val['name'];


    echo'</div>';

    echo '<br />';

    include 'search_biography.php';

    echo '<br />';

    echo '</div>';

    echo'<div style="clear:both;"></div>';

}}

?>
<div id="movie">I suoi film&nbsp;&nbsp;&nbsp;&nbsp;</div>

<br><br><br>

<?php
include 'search_movie.php';
?>

<div id="info"><br><u>Informazioni Personali</u><br></div>

<div style="float:left; text-align:right;background:#081c24;color:#ffffff;display:block; width:50%;height:120px;">
Compleanno : 
<br>
Giorno della morte :
<br>
Luogo di nascita :
<br>
</div>

<div style="float:left; text-align:left;background:#081c24;color:#ffffff;display:block; width:50%;height:120px;">

<?php  

echo $data_nascita;
echo "<br>";
echo $data_morte; 
echo "<br>";
echo $from;

?>

</div>

<div style="clear:both;"></div></div>

<div style="width:100%;font-family:Arial;font-size:14px;color:#ffffff;text-align:center;background:#030a0d;"><br>Copyright &#169; 2018 - DEVELOPER CARMINE MORABITO<br><br></div>

</body>
</html>
