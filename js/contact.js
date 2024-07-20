function validated_form() {
    var email = document.getElementById('email');
    var sujet = document.getElementById('sujet');
    var messg = document.getElementById('messg');
    var emailError = document.getElementById('email-error');
    var sujetError = document.getElementById('sujet-error');
    var messgError = document.getElementById('messg-error');
    var succes = document.getElementById('succes');
    var test = true;
    var email_input = email.value.trim();
    if(!isValidEmail(email_input)) {
        email.style.border = "2px red solid";
        emailError.style.display = "block";
        succes.style.display = "none";
        test = false;
    } else {
        email.style.border = "2px rgba(160, 160, 160, 0.6) solid";
        emailError.style.display = "none";
    }
    var sujet_input = sujet.value.trim();
    if(sujet_input.length == 0) {
        sujet.style.border = "2px red solid";
        sujetError.style.display = "block";
        succes.style.display = "none";
        test = false;
    } else {
        sujet.style.border = "2px rgba(160, 160, 160, 0.6) solid";
        sujetError.style.display = "none";
    }
    var messg_input = messg.value.trim();
    if(messg_input.length == 0) {
        messg.style.border = "2px red solid";
        messgError.style.display = "block";
        succes.style.display = "none";
        test = false;
    } else {
        messg.style.border = "2px rgba(160, 160, 160, 0.6) solid";
        messgError.style.display = "none";
    }
    return test;
}

function ren() {
    var a = document.getElementById('email');
    var b = document.getElementById('sujet');
    var c = document.getElementById('messg');
    var d = document.getElementById('email-error');
    var e = document.getElementById('sujet-error');
    var g = document.getElementById('messg-error');
    var h = document.getElementById('succes');
    a.value = b.value = c.value = "";
    a.style.border = b.style.border = c.style.border = "2px rgba(160, 160, 160, 0.6) solid";
    d.style.display = e.style.display = g.style.display = h.style.display = "none";
}
