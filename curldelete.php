<?php

if(isset($_POST["id"]))
{
    $id = $_POST['id'];
    $client = curl_init();
    curl_setopt($client, CURLOPT_URL, "localhost:4200/deletedata/$id");

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($client, CURLOPT_CUSTOMREQUEST, "DELETE");

    $response = curl_exec($client);
    echo $response;
    
    curl_close($client);
}


?>

