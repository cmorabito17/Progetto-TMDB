<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento senza titolo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>

#img1 {
    border: 1px solid #dddddd;
    border-radius: 4px;
    padding: 10px;
    background:#ffffff;
}

.button {
    background-color: #eeeeee;
    border: none;
    color: #000000;
    text-align: center;
    font-size: 14px;
    cursor: pointer;
}

body {
    margin:0;
    font-family: Arial, Helvetica, sans-serif;
	background-color:#eeeeee;
}

#header{
position:fixed;
top:0px;
left:0px;
height:130px;
width:100%;
background:#081c24;
z-index:999999;
}

#headerb{
position:fixed;
top:130px;
left:0px;
height:40px;
font-family: Arial; 
font-size:24px; 
text-align:center;
width:100%;
background:#ffffff;
z-index:999999;
border: 1px solid #dddddd;
}


#footer{

    background:#081c24;
	height:200px; 
	font-family:Arial; 
	font-size:30px; 
	font-weight:bold; 
	text-align:right; 
	padding:20px;
}

</style>

</head>

<body>

<div id="header"><div style="margin-left:180px;margin-top:12px;"><img src="img/logo_tmdb.jpg"></div></div>
<div id="headerb"><div style="margin-top:5px;">Ricerca film per attore nel database THE MOVIE DB</div></div>
<?php

$movie_id = stripslashes($_GET['id']);

$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/$movie_id?api_key=60a1ae750613a7c0c31edc46eba887a7",
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
 
   
$input = json_decode($response, true);

echo ' <div style="float:left; text-align:right;      display:block; width:50%; height:460px;margin-top:210px;">';

$poster = $input['poster_path'];
$original_title = $input['original_title'];
$overview = $input['overview'];

echo'<img src="https://image.tmdb.org/t/p/w342/'.$poster.'" id="img1">';

    echo '</div>';

    echo '<div style="float:left; text-align:left; display:block; width:40%; height:460px;margin-top:210px;">';


echo'<div style="font-family: Arial; font-size:30px; font-weight:bold; margin-left:20px;">';

    echo $original_title;
	
	echo'<br>';
	
	echo'</div>';
	
	echo'<div style="font-family: Arial; font-size:16px;text-align:justify; margin-left:20px;line-height:20px;">';
	
    echo $overview;

    echo'</div>';

    echo '<br />';

    echo '<br />';

    echo '</div>';

echo'<div style="clear:both;"></div>';

}

?>
<br><br><br>
<div style="width:100%;font-family:Arial;font-size:24px;color:#ffffff;text-align:center;background:#081c24;margin-top:30px;"><br><br></div>
<div style="float:left; text-align:right;background:#081c24;color:#ffffff;display:block; width:50%;height:50px;">
</div>

<div style="float:left; text-align:left;background:#081c24;color:#ffffff;display:block; width:50%;height:50px;">
</div>

<div style="clear:both;"></div></div>
<div style="width:100%;font-family:Arial;font-size:14px;color:#ffffff;text-align:center;background:#030a0d;"><br>Copyright &#169; 2018 - DEVELOPER CARMINE MORABITO<br><br></div>

</body>
</html>
