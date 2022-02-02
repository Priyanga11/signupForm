<?php include('head.php');

?>
<script>
    function passequal(){
     var a= document.forms['fff']['chpassword'];
    var b= document.forms['fff']['copassword'];
    if(a.value!=b.value){
        alert("password doesn't match");
    return false;
    }
    else{
        localStorage.setItem("pass", a.value);
    }
    return true;
}
</script>

<body>
    <div class="container">
    <h1 class="success"><span>Change Password</span></h1>
    <form  action="login.php" name="fff" onSubmit="return passequal()">
        <h2>
            <label for="">Change Password:</label>
                <input type="password" placeholder="Password"  name="chpassword" required><br><br>
            <label for="password">Confirm Password:</label>
                <input type="password" placeholder="Password" name="copassword"  required><br><br>

            <input type="submit">
        </h2>   
    </form>
    </div>
</body>
