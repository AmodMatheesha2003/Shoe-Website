function checkvalid(){
    var x = document.forms["myform"]["username"].value;
    if(x==""){
        alert("please provide your username");
        return false; 
    }
    var y = document.forms["myform"]["userpassword"].value;
    if(y==""){
        alert("please provide your password");
        return false; 
    }
    return true;
}

