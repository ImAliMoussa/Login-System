function validateEmail(email){
    const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return email.match(mailformat);
}

async function validateSignUp(){
    const username = document.getElementById("username_input").value.trim();
    const email = document.getElementById("email_input").value.trim();
    const pass1 = document.getElementById("password_input").value;
    const pass2 = document.getElementById("password2_input").value;

    let ok = true;
    let error_str = "";
    
    if (!username){
        error_str += "username field is empty<br>";
        ok = false;
    }
    if (!email) {
        error_str += "email field is empty<br>";
        ok = false;
    }
    if (!pass1) {
        error_str += "password field is empty<br>";
        ok = false;
    }
    if (!pass2) {
        error_str += "second password field is empty<br>";
        ok = false;
    }
    if (pass1 && pass2 && pass1 != pass2){
        error_str += "passwords do not match<br>";
        ok = false;
    }
    
    if (email && !validateEmail(email)){
        error_str += "Invalid email<br>";
        ok = false;
    }

    if (ok){    
            $.ajax({
                type: "POST",
                url: 'api.php',
                data: {username: username, email: email},
                async: false,
                timeout: 2000,
                error: function(){
                    console.log("ajax sign up fail");
                    return true;
                },
          
                success: function(data){
                    let a = data[0];
                    let b = data[1];

                    if (a == "1"){
                        ok = false;
                        error_str += "username already taken<br>";
                    }
                    if (b == "1"){
                        ok = false;
                        error_str += "email already taken<br>";
                    }
                }
            });
    }
    
    if (error_str) {
        $("#error_div").html(error_str);
        $("#error_div").show(error_str);
    } else {
        $("#error_div").hide();
    }

    return ok;
}

function validateLogIn(){
    const username = document.getElementById("username_input").value.trim();
    const pass = document.getElementById("password_input").value;

    let ok = true;
    let error_str = "";
    
    if (!username){
        error_str += "username field is empty<br>";
        ok = false;
    }
    if (!pass) {
        error_str += "password field is empty";
        ok = false;
    }

    if (ok){    
        $.ajax({
            type: "POST",
            url: 'api.php',
            data: {username: username, password: pass},
            async: false, 
            timeout: 2000,
            error: function(){
                console.log("ajax sign in fail");
                return true;
            },
      
            success: function(data){
                let a = data[0];

                if (a == 1){
                    error_str += "wrong password";
                    ok = false;
                } else if (a == 2){
                    error_str += "username does not exist";
                    ok = false;
                }
            }
        });
    }

    if (error_str) {
        $("#error_div").html(error_str);
        $("#error_div").show(error_str);
    } else {
        $("#error_div").hide();
    }
    
    return ok;
}