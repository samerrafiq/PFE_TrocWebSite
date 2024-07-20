function validated_compte() {
    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var email = document.getElementById('email');
    var telephone = document.getElementById('tele');
    var password = document.getElementById('password');
    var passwordc = document.getElementById('passwordc');
    var nomError = document.getElementById('nom-error');
    var prenomError = document.getElementById('prenom-error');
    var emailError = document.getElementById('email-error');
    var telephoneError = document.getElementById('telephone-error');
    var passwordError = document.getElementById('password-error');
    var nom_input = nom.value.trim();
    var test = true;
    if(nom_input.length == 0) {
        nom.style.border = 'red solid 2px';
        nomError.style.display = 'block';
        test = false;
    } else {
        nom.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        nomError.style.display = 'none';
    }
    var prenom_input = prenom.value.trim();
    if(prenom_input.length == 0) {
        prenom.style.border = 'red solid 2px';
        prenomError.style.display = 'block';
        test = false;
    } else {
        prenom.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        prenomError.style.display = 'none';
    }
    var email_input = email.value.trim();
    if(!isValidEmail(email_input)) {
        email.style.border = 'red solid 2px';
        emailError.style.display = 'block';
        test = false;
    } else {
        email.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        emailError.style.display = 'none';
    }
    var telephone_input = telephone.value.trim();
    if(telephone_input.length > 0 && isValidTelephone(telephone_input) == false) {
        telephone.style.border = 'red solid 2px';
        telephoneError.style.display = 'block';
        test = false;
    } else {
        telephone.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        telephoneError.style.display = 'none';
    }
    var password_input = password.value.trim();
    var passwordc_input = passwordc.value.trim();
    if(!compare_string(password_input, passwordc_input) || (password_input.length < 6 && password_input.length > 0)) {
        password.style.border =  'red solid 2px';
        passwordError.style.display = 'block';
        test = false;
    } else {
        password.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        passwordError.style.display = 'none';
    }
    return test;
}

function change_image() {
    var file = document.getElementById('image').files;
    var fileReader = new FileReader();
    fileReader.onload = function(event) {
        document.getElementById('img').setAttribute("src", event.target.result);
    }
    fileReader.readAsDataURL(file[0]);
}
