

function validation(){
    var username= document.forms['signupform']['username'];
    var password= document.forms['signupform']['password'];
    localStorage.setItem("username", username.value);
    localStorage.setItem("pass", password.value);
    var gender= document.forms['signupform']['Gender'];
    // var Email= document.forms['signupform']['Email'];
    // var DOB= document.forms['signupform']['birthday'];
    // var country= document.forms['signupform']['countryCode'];
    // var ContactNo= document.forms['signupform']['Phone'];
   

    if (document.signupform.username.value == "") {
        document.getElementById("aaa").innerHTML="* Username is required *";
        document.signupform.username.focus();
        return false;
    }
    if (!/^[a-zA-Z]*$/g.test(document.signupform.username.value)) {
        document.getElementById("aaa").innerHTML="* Only characters accepted *";
        document.signupform.username.focus();
        return false;
    }
    if (document.signupform.Password.value == "") {
        document.getElementById("bbb").innerHTML="* Password is required *";
        document.signupform.Password.focus();
        return false;
    }
    if (!/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/g.test(document.signupform.Password.value)) {
        document.getElementById("bbb").innerHTML="* a password must be eight characters including one uppercase letter, one special character and alphanumeric characters *";
        document.signupform.Password.focus();
        return false;
    }
   
    for (var i = 0; i < gender.length; i++) {

        if (gender[i].checked) break;
    
      }
    
      if (i == gender.length) {
    
        // document.getElementById("ccc").style.display = "block";
        document.getElementById("ccc").innerHTML="* Select Gender *";
    
        return false;
      }

    if (document.signupform.Email.value == "") {
        document.getElementById("ddd").innerHTML="* Enter a Email *";
        document.signupform.Email.focus();
        return false;
    }
    if (!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/g.test(document.signupform.Email.value)) {
        document.getElementById("ddd").innerHTML="* Enter valid Email *" ;
        document.signupform.Email.focus();
        return false;
    }
    if (document.signupform.DOB.value == "") {
        document.getElementById("eee").innerHTML="* Enter a DOB *";
        document.signupform.DOB.focus();
        return false;
    }
    if (!/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/g.test(document.signupform.DOB.value)) {
        document.getElementById("eee").innerHTML="* Enter valid DOB *" ;
        document.signupform.DOB.focus();
        return false;
    }
    if (document.signupform.Country.value == "Select") {
        document.getElementById("fff").innerHTML="* Select Country *";
        document.signupform.Country.focus();
        return false;
    }
    if (document.signupform.Phone.value == "") {
        document.getElementById("ggg").innerHTML="* Enter ContactNo *";
        document.signupform.Phone.focus();
        return false;
    }
    if (!/^\d{10}$/g.test(document.signupform.Phone.value)) {
        document.getElementById("ggg").innerHTML="* Enter valid ContactNo *";
        document.signupform.Phone.focus();
        return false;
    }
    if (document.signupform.image.value == "") {
        document.getElementById("hhh").innerHTML="* Upload Image *";
        document.signupform.image.focus();
        return false;
    }
    if (document.signupform.doc.value == "") {
        document.getElementById("iii").innerHTML="* Upload File *";
        document.signupform.doc.focus();
        return false;
    }
    
}
    
function validinfo(){

    var x=document.forms['valid']['username'];
    var y=document.forms['valid']['password'];
    var aaa = localStorage.getItem("username");
    var bbb = localStorage.getItem("pass");
   
    if(x.value!=aaa || y.value!=bbb){
        alert("Invalid Data");
        return false;
    }
    return true;
}