function validated_message() {
    var msg = document.getElementById('content-input').value.trim();
    if(msg.length != 0) {
        return true;
    }
    return false;
}

function updateScroll() {
    var element = document.getElementById("conversation");
    element.scrollTop = element.scrollHeight;
}