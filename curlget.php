<?php

$ch =curl_init();

$url ="localhost:4200/getstudent";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e= curl_error($ch)){
    echo $e;
}
else{
    $decoded = json_decode($resp,true);
    // print_r($decoded);
    
}

curl_close($ch);

?>
<head>
<style>
* {
  box-sizing: border-box;
}
h2,input{
    text-align: center;
}

</style>
</head> 
<body>
    <h2>User Details</h2>
<input type="text" id="search" onkeyup="myFunction()" placeholder="Filter names.." title="Type in a name">
<table border="1" id="searchTable" width = "900" align="center">
    <tr>
        <!-- <th>id</th> -->
        <th>username</th>
        <th>password</th>
        <th>gender</th>
        <th>email</th>
        <th>dob</th>
        <th>country</th>
        <th>contactno</th>
        <th>Edit/Delete</th>
    </tr>
    <?php 
    $id=1;
    foreach($decoded as $d){
        ?>
     <tbody>   
    <tr>
       
        <td><?php echo $d['username']?></td>
        <td><?php echo $d['password']?></td>
        <td><?php echo $d['gender']?></td>
        <td><?php echo $d['email']?></td>
        <td><?php echo $d['dob']?></td>
        <td><?php echo $d['country']?></td>
        <td><?php echo $d['contactno']?></td>
        <td><input type="submit" class="remove" id="<?php echo $d['id']?>" name="act" value="Delete" />
            <input type="submit"  class="edit" id="<?php echo $d['id']?>" value="Edit" />

            </td>
    </tr>
    <?php
    $id++;
    }
     ?>
     </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $('.remove').click( function(event){
        if(confirm("Are you sure you want to delete"))
        
        $.ajax({
            url:"curldelete.php",
            method:"POST",
            data:({'id':this.id}),
            // data: new FormData(this),
            success:function(data)
            {
            // fetch_data();
            // alert("Data Deleted using PHP API");
            }
        });
        
        });

        $('.edit').click( function(event){
        if(confirm("Are you sure you want to edit"))
        
        $.ajax({
            url:"curlupdate.php",
            method:"POST",
            data:({'id':this.id}),
            success:function(data)
            {
            // fetch_data();
            // alert("Data Edited using PHP API");
            }
        });
        
        });


</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("searchTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>