<?php 

include("header.php");

$name = $_POST['username'];
$pword =$_POST['password'];
$gender = ($_POST['Gender']);
$email = $_POST['Email'];
$dob = $_POST['birthday'];
$country = $_POST['countryCode'];
$contactno =$_POST['Phone'];
$userimage =$_FILES["image"]['name'];
$genimage = $_FILES['genimage']['name'];
$conimage =$_FILES['countryimage']['name'];
$doc =$_FILES['doc']['name'];



// /* User image */
// $user_id = $_POST['user_id']; 
// $name = $_POST['username'];
// $imagename = 'uname_'.$name;
// $photo = $_FILES['image']['name'];
// $user_source =  $_FILES["image"]["tmp_name"];
// $folder_path = "images/".$user_id."/".$name;

// $user = array($name, $imagename, $photo, $user_source, $folder_path);

// /* Gender image */
// $gen_name = ($_POST['Gender']);
// $gen_imagename = 'gen_'.$gen_name;
// $gen_photo = $_FILES['genimage']['name'];
// $gen_source =  $_FILES["genimage"]["tmp_name"];
// $gen_folder_path = "images/".$user_id."/".$gen_name;

// $gender = array($gen_name, $gen_imagename, $gen_photo, $gen_source, $gen_folder_path);

// /* Country image */
// $c_name = $_POST['countryCode'];
// $c_imagename = 'country_'.$c_name;
// $c_photo = $_FILES['countryimage']['name'];
// $c_source =  $_FILES["countryimage"]["tmp_name"];
// $c_folder_path = "images/".$user_id."/".$c_name;

// $country = array($c_name, $c_imagename, $c_photo, $c_source, $c_folder_path);

// $upload_data = array("user"=>$user, "gender"=>$gender, "country"=>$country); 

// /** 
//  * insert data into db 
//  * fetch primary key after insert
//  * then upload the documents / images based on the primary key 
//  * */  

// foreach($upload_data as $data){
  
//     upload_photos($data[1], $data[2], $data[3], $data[4] );
// }


// function upload_photos($filename,$imagename, $source,$folder_path){
//     // echo $filename."<br>".$imagename."<br>".$source."<br>".$folder_path;

//     $file_extension = pathinfo( $imagename, PATHINFO_EXTENSION );  
//     $basename = $filename.".".$file_extension;
//     $source   = $source; 
    
    
//     if (!file_exists($folder_path)) {
//         mkdir($folder_path, 0777, true);
//         $destination  = $folder_path."/".$basename; 
//         move_uploaded_file( $source, $destination );
//     }
//     else{
//        // move_uploaded_file( $source, $folder_path);
//     }

// }

// // upload_photos($name, $photo, $user_source,$imagename,$folder_path);
 


// // $name = $_POST['username'];
// $docname = 'doc_'.$name;
// $document = $_FILES['doc']['name'];
// $user_source1 =  $_FILES["doc"]["tmp_name"];
// $folder_path1 = "docx/".$user_id."/".$name;

// function upload_doc($username, $filename, $source,$docname,$folder_path1){

//     $file_extension = pathinfo( $filename, PATHINFO_EXTENSION );  
//     $basename = $docname.".".$file_extension;
//     $source   = $source; 
    
    
//     if (!file_exists($folder_path1)) {
//         mkdir($folder_path1, 0777, true);
//         $destination  = $folder_path1."/".$basename; 
//         move_uploaded_file( $source, $destination );
//     }
//     else{
//         // move_uploaded_file( $source, $folder_path1);
//     }

// }

// upload_doc($name, $document, $user_source1,$docname,$folder_path1);

if($name!='' and $pword!='' and $gender!='' and $email!='' and $dob!='' and $country!='' and $contactno!='' and $userimage!='' and $genimage!='' and $conimage!='' and $doc!=''){
    echo "Data successfully submitted";
}
else{
    echo "Data cannot be empty";
}

$data_array =  array(
    'username'=> $name,
    'password' => $pword,
    'gender' => $gender,
    'email' => $email,
    'dob' => $dob,
    'country' => $country,
    'contactno' => $contactno 
);
$encoded = json_encode($data_array);
// Prepare new cURL resource
$ch = curl_init('localhost:4200/createid');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
// Set HTTP Header for POST request
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($encoded))
);

 $resp = curl_exec($ch);
 echo($resp);

curl_close($ch); 

?>