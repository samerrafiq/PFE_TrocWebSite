// Verification des inputs d'annonce
function validated_annonce() {
    var titre = document.getElementById('titre');
    var categorie = document.getElementById('categorie');
    var besoin = document.getElementById('besoin');
    var description = document.getElementById('description');
    var ville = document.getElementById('ville');
    var image = document.getElementById('image_1');
    var titreError = document.getElementById('titre-error');
    var categorieError = document.getElementById('categorie-error');
    var besoinError = document.getElementById('besoin-error');
    var descriptionError = document.getElementById('description-error');
    var villeError = document.getElementById('ville-error');
    var imageError = document.getElementById('image-error');
    var titre_input = titre.value.trim();
    var test = true;
    if(titre_input.length == 0) {
        titre.style.border = 'red solid 2px';
        titre.focus();
        titreError.style.display = 'block';
        test = false;
    } else {
        titre.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        titreError.style.display = 'none';
    }
    var categorie_input = categorie.value.trim();
    if(categorie_input.length == 0) {
        categorie.style.border = 'red solid 2px';
        categorie.focus();
        categorieError.style.display = 'block';
        test = false;
    } else {
        categorie.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        categorieError.style.display = 'none';
    }
    var besoin_input = besoin.value.trim();
    if(besoin_input.length == 0) {
        besoin.style.border = 'red solid 2px';
        besoin.focus();
        besoinError.style.display = 'block';
        test = false;
    } else {
        besoin.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        besoinError.style.display = 'none';
    }
    var description_input = description.value.trim();
    if(description_input.length == 0) {
        description.style.border = 'red solid 2px';
        description.focus();
        descriptionError.style.display = 'block';
        test = false;
    } else {
        description.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        descriptionError.style.display = 'none';
    }
    var ville_input = ville.value.trim();
    if(ville_input.length == 0) {
        ville.style.border = 'red solid 2px';
        ville.focus();
        villeError.style.display = 'block';
        test = false;
    } else {
        ville.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        villeError.style.display = 'none';
    }
    var image_input = image.value.trim();
    if(image_input.length == 0) {
        image.style.border = 'red solid 2px';
        image.focus();
        imageError.style.display = 'block';
        test = false;
    } else {
        image.style.border = 'rgba(160, 160, 160, 0.6) solid 2px';
        imageError.style.display = 'none';
    }
    return test;
}

function change_image(x) {
    if(x == 1) {
        var file = document.getElementById('image_1').files;
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            document.getElementById('img_1').setAttribute("src", event.target.result);
        }
        fileReader.readAsDataURL(file[0]);
        document.getElementById('containter_2').style.visibility = "visible";
    }
    if(x == 2) {
        var file = document.getElementById('image_2').files;
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            document.getElementById('img_2').setAttribute("src", event.target.result);
        }
        fileReader.readAsDataURL(file[0]);
        document.getElementById('containter_3').style.visibility = "visible";
    }
    if(x == 3) {
        var file = document.getElementById('image_3').files;
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            document.getElementById('img_3').setAttribute("src", event.target.result);
        }
        fileReader.readAsDataURL(file[0]);
        document.getElementById('containter_4').style.visibility = "visible";
    }
    if(x == 4) {
        var file = document.getElementById('image_4').files;
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
            document.getElementById('img_4').setAttribute("src", event.target.result);
        }
        fileReader.readAsDataURL(file[0]);
    }
}
