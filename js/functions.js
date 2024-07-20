//verifier si l'adresse mail est valide ou non
function isValidEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

//comparer deux chaines de caracteres
function compare_string(a, b) {
    if(a.length != b.length) {
        return false;
    }
    for(let i=0; i<a.length; ++i) {
        if(a[i] != b[i]) {
            return false;
        }
    }
    return true;
}

// verifier si le telephone est valide ou non
function isValidTelephone(input) {
    if(!isNaN(input) && input.length == 10 && input[0] === '0')
        for(let i = 5; i <= 7; ++i)
            if(i == parseInt(input[1]))
                return true;
    return false;
}
