function swap_connexion(x) {
    var f_register = document.getElementById('form-register').style;
    var f_connecte = document.getElementById('form-connecte').style;
    var register = document.getElementById('register').style;
    var connecte = document.getElementById('connecte').style;
    if(x == 1) {
        register.backgroundColor = 'white';
        connecte.backgroundColor = '#232a34';
        connecte.color = 'white';
        register.color = 'black';
        f_connecte.display = 'flex';
        f_register.display = 'none';
    }
    else {
        connecte.backgroundColor = 'white';
        register.backgroundColor = '#232a34';
        register.color = 'white';
        connecte.color = 'black';
        f_register.display = 'flex';
        f_connecte.display = 'none';
    }
}

// Verification des inputs de login
function validated_login() {
    var mail_login = document.getElementById('mail-login');
    var password_login = document.getElementById('password-login');
    var mail_login_error = document.getElementById('mail-login-error');
    var password_login_error = document.getElementById('password-login-error');
    var mail = mail_login.value.trim();
    var test=true;
    if(!isValidEmail(mail)) {
        mail_login.style.border = 'red solid 2px';
        mail_login.focus();
        mail_login_error.style.display = 'block';
        test = false;
    } else {
        mail_login.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        mail_login_error.style.display = 'none';
    }
    var password = password_login.value.trim();
    if(password.length < 6) {
        password_login.style.border = 'red solid 2px';
        password_login.focus();
        password_login_error.style.display = 'block';
        test = false;
    } else {
        password_login.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        password_login_error.style.display = 'none';
    }
    return test;
}

// Vérification des inputs de register
function validated_register() {
    var nom_register = document.getElementById('nom-register');
    var prenom_register = document.getElementById('prenom-register');
    var mail_register = document.getElementById('mail-register');
    var password_register = document.getElementById('password-register');
    var passwordc_register = document.getElementById('passwordc-register');
    var nom_register_error = document.getElementById('nom-register-error');
    var prenom_register_error = document.getElementById('prenom-register-error');
    var mail_register_error = document.getElementById('mail-register-error');
    var password_register_error = document.getElementById('password-register-error');
    var passwordc_register_error = document.getElementById('passwordc-register-error');
    var test = true;
    var nom = nom_register.value.trim();
    if(nom.length == 0) {
        nom_register.style.border = 'red solid 2px';
        nom_register.focus();
        nom_register_error.style.display = 'block';
        test = false;
    } else {
        nom_register.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        nom_register_error.style.display = 'none';
    }
    var prenom = prenom_register.value.trim();
    if(prenom.length == 0) {
        prenom_register.style.border = 'red solid 2px';
        prenom_register.focus();
        prenom_register_error.style.display = 'block';
        test = false;
    } else {
        prenom_register.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        prenom_register_error.style.display = 'none';
    }
    var mail = mail_register.value.trim();
    if(!isValidEmail(mail)) {
        mail_register.style.border = 'red solid 2px';
        mail_register.focus();
        mail_register_error.style.display = 'block';
        test = false;
    } else {
        mail_register.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        mail_register_error.style.display = 'none';
    }
    var password = password_register.value.trim();
    var passwordc = passwordc_register.value.trim();
    if(password.length < 6 || !compare_string(password, passwordc)) {
        password_register.style.border = 'red solid 2px';
        passwordc_register.style.border = 'red solid 2px';
        password_register_error.style.display = 'block';
        passwordc_register_error.style.display = 'block';
        test = false;
    } else {
        password_register.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        passwordc_register.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        password_register_error.style.display = 'none';
        passwordc_register_error.style.display = 'none';
    }
    return test;
}
