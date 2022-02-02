<?php include('head.php');?>

    <div class="container">
        <h1><span>Login Here</span><h1>
            
<script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
</script>
<script>
$(function(){
        $("#form").on("submit", function(event) {
            event.preventDefault();
            var qqq=localStorage.getItem("username");
            console.log(qqq);
            var ppp=localStorage.getItem("pass");
            console.log(ppp);
            var formData = {
                'uname': $('input[name=username]').val(), 
                'pword': $('input[name=password]').val(),
                'ucheck':qqq,
                'pcheck':ppp
            };
            console.log(formData);

            $.ajax({
                url: "ajaxlogin.php",
                type: "post",
                data: formData,
                success: function(d) {
                    alert("Data submitted Success");
                   $('#errorMessage').html(d)
                }
            });
        });
    })
</script>
        
    <form id="form" action="#" method="POST" name="valid" onsubmit="return validinfo()"> 
        
        <div class="ab">
            <label for="username">UserName:</label>
                <input id="uname" type="text" placeholder="UserName"  name="username" value="" required><br>
            <label for="password">Password:</label>
                <input id="pword" type="password" placeholder="Password" name="password" value="" required><br>
                <input  type="submit" name="submit" value="Login"><br>
        <a href="forgot.php">Forgot Password</a><br>
        <a href="signup.php">SignUp to create an account</a>
        </div>
        <!-- <p id="demo"></p> -->

    </form>
    <!-- <div id="loader" style="display:none">loader image </div> -->

    <div id="errorMessage" class="err"></div>

    </div>


