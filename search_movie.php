

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
</style>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?with_genres=35&with_cast=$id&sort_by=revenue.desc&language=it&api_key=60a1ae750613a7c0c31edc46eba887a7",
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


   




}}



?>


<?php 
foreach(array_chunk($data_movie, 4) as $curta ) { 

echo'<div width="100%" align="center">';

echo'<ul>';

foreach($curta as $detail) { 

$poster = $detail['poster_path'];
$title = $detail['title'];
$ad = $detail['id'];


echo'<a href="search_detail_movie.php?id='.$ad.'"><img src="https://image.tmdb.org/t/p/w185/'.$poster.'" id="img1"></a>&nbsp;&nbsp;&nbsp;';
}

echo'</ul>';

echo'</div>';

echo'<div width="100%" align="center">';

echo'<ul>';

foreach($curta as $detail) { 

$poster = $detail['poster_path'];
$title = $detail['title'];

echo'<input type="button" class="button" style="width:204px;" value="'.$title.'">&nbsp;&nbsp;&nbsp;';

}

echo'</ul>';

echo'</div>';


}; 

?>
