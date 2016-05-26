function getVotos(id) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            showToast(xmlhttp.responseText, 1500);
        }
    };
    xmlhttp.open("GET", "votar.php?id=" +id, true);
    xmlhttp.send();
}