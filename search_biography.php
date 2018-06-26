<?php

    $id = $val['id'];

echo'<div style="font-family: Arial; font-size:18px;font-weight:bold; margin-left:20px;">Biografia</div>';

echo'<div style="font-family: Arial; font-size:16px;text-align:justify; margin-left:20px;line-height:20px;">';

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/person/$id?api_key=60a1ae750613a7c0c31edc46eba887a7&language=it",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
));

// ho tolto attibuto language perch� se non presente la traduzione in italiano non visualizza biografia

    $response = curl_exec($curl);

    $err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 
    $result = json_decode($response, true);

    $biography = $result['biography'];

    $cerca = array("[Fonte: Wikipedia.it]",".");

    $sostituisci = array("",".<br>");

    $bio = str_replace($cerca, $sostituisci, $biography);

    echo $bio;

    echo"<br>";

    $nascita =  $result['birthday'];

    $dn = $nascita; 

    $anno = date('Y', strtotime($dn));

    $mese = date('m', strtotime($dn));

    $giorno = date('d', strtotime($dn));

    $cerca_m = array  ("01","02","03","04","05","06","07","08","09","10","11","12");

    $sostituisci_mese = array( "Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre");

    $mm = str_replace($cerca_m, $sostituisci_mese, $mese);

    $data_nascita = "".$giorno."&nbsp;".$mm."&nbsp;".$anno."";

    $d_m =  $result['deathday'];

    $dm = $d_m;

    $annom = date('Y', strtotime($dm));

    $mesem = date('m', strtotime($dm));

    $giornom = date('d', strtotime($dm));

    $data_morte = "".$giornom."&nbsp;".$mm."&nbsp;".$annom."";
   
    $from =  $result['place_of_birth'];

echo'</div>';

}

?>

