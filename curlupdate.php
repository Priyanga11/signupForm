<?php

if(isset($_POST["id"]))
{
    $id=$_POST["id"];
  
   $form_data = array(
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'gender' => ($_POST['Gender']),
    'email' => $_POST['Email'],
    'dob' => $_POST['birthday'],
    'country' => $_POST['countryCode'],
    'contactno' =>$_POST['Phone']
  );

  $client = curl_init("localhost:4200/updatedata/$id");
  curl_setopt($client, CURLOPT_PUT, true);
  curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
  curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($client);
  curl_close($client);
  $result = json_decode($response, true);
  foreach($result as $keys => $values)
  {
   if($result[$keys]['success'] == '1')
   {
    echo 'insert';
   }
   else
   {
    echo 'error';
   }
 }
}

?>