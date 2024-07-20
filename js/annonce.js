function validated_comment() {
    var content = document.getElementById('contentcomment');
    var contentcomment = content.value.trim();
    if(contentcomment.length == 0) {
        /*content.style.border = 'red solid 2px';*/
        return false;
    }
    return true;
}
