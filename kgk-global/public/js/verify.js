function formValidation(){  
    
    var login = document.registration.login;
    var password = document.registration.password;
    var password_confirm = document.registration.password_confirm;
    //alert(password.value);
    var email = document.registration.email;
    var first_name = document.registration.first_name;
    
    var mgender = document.registration.mgender;  
    var fgender = document.registration.fgender;
  
    var noLogin = login_validation_failed(login);
    //alert(noLogin);
    var noPwd = password_validation_failed(password);
    //alert(noPwd);
    var noPwdConf = password_confirm_failed(password, password_confirm);
    //alert(noPwdConf);
    var validEmail = isValidEmail(email, 1);
    var noFirstName = letter_validation_failed(first_name);
     //alert(noFirstName);
    var sexUndefined = validation_sex_failed(mgender,fgender);
    

    var upload_failed = Upload_failed();
 
    if(noLogin){
        document.getElementById('error_login').style.display = 'inline';
    }
    else{
        document.getElementById('error_login').style.display = 'none';
    }
    
    if(noPwd){
        document.getElementById('error_password').style.display = 'inline';
    }
    else{
        document.getElementById('error_password').style.display = 'none';
    }
    
    if(noPwdConf){
        document.getElementById('error_password_confirm').style.display = 'inline';
    }
    else{
        document.getElementById('error_password_confirm').style.display = 'none';
    }
    if(!validEmail){
        document.getElementById('error_email').style.display = 'inline';
    }
    else{
        document.getElementById('error_email').style.display = 'none';
    }
    
    if(noFirstName){
        document.getElementById('error_first_name').style.display = 'inline';
    }
    else{
       document.getElementById('error_first_name').style.display = 'none'; 
    }
    
    if(sexUndefined){
        document.getElementById('error_gender').style.display = 'inline';
    }
    else{
        document.getElementById('error_gender').style.display = 'none';
    }

    if(upload_failed){
        document.getElementById('error_upload').style.display = 'inline';
    }
    else{
        document.getElementById('error_upload').style.display = 'none';
    }
   
    if ( noLogin || noPwd || noPwdConf || !validEmail || noFirstName || sexUndefined || upload_failed)
      return false;
      else{
   return true;
      }   

  
}


function formValidationLogin(){  
    
    var login = document.loginForm.login;
    var password = document.loginForm.password;
    
    var noLogin = login_validation_failed(login);
    //alert(noLogin);
    var noPwd = password_validation_failed(password);
    //alert(noPwd);
    
    if(noLogin){
        document.getElementById('error_login').style.display = 'inline';
    }
    else{
        document.getElementById('error_login').style.display = 'none';
    }
    
    if(noPwd){
        document.getElementById('error_password').style.display = 'inline';
    }
    else{
        document.getElementById('error_password').style.display = 'none';
    }
    
    
    if ( noLogin || noPwd){
      return false;
    }
    else{
        return true;
    }   

  
}


function login_validation_failed(login){  
    var login_len = login.value.length; 
    return (login_len == 0 || login_len < 5 || login_len > 12);
}

function password_validation_failed(password){  
    var passid_len = password.value.length;  
    return (passid_len == 0 || passid_len < 7 || passid_len > 12);
}

function password_confirm_failed(password, password_confirm){  
    
    var passid_len = password.value.length;
    //alert(passid_len);
    var passid_confirm_len = password_confirm.value.length;
    //alert(passid_confirm_len);
    
    
    if(passid_len !=0 && passid_confirm_len!=0){
        if (passid_len != passid_confirm_len){
            return true;
        }
        else{
            return (password.value != password_confirm.value);
        }
    }
    else{
        return true;
    }
   
} 

function letter_validation_failed(first_name){   
    var letters = /^[A-Za-z]+$/;
    return (first_name.value == "" || !first_name.value.match(letters));
}  

function validation_sex_failed(umsex,ufsex){  
    x=0;  

    if(umsex.checked){  
        x++;  
    } 
    if(ufsex.checked){  
        x++;   
    }
    return (x == 0);
}


function Upload_failed() {
//        alert(11);

    var fileUpload = document.getElementById("new_picture");
      
    if (typeof (fileUpload.files) != "undefined") {

        if(fileUpload.files[0]){
            var size = fileUpload.files[0].size;

            var maxSize = document.registration.MAX_FILE_SIZE.value;

            //alert(maxSize);
            //alert(size + " b");

            return (size > maxSize);
        } else {
            return false;
        }
    }
    else
        return false;
}

function isValidEmail(email, strict){
    email = email.value;
    if ( !strict )
        email = email.replace(/^\s+|\s+$/g, '');
    return (/^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i).test(email);
}