function typeText() {
    if(caracter < objets[text].length) {
        document.getElementById("text").innerHTML += objets[text].charAt(caracter++);
    } else {
        if(++text == objets.length) text = 0;
        document.getElementById("text").innerHTML = objets[text].charAt(0);
        caracter = 1;
    }
    setTimeout(typeText, 200);
}
