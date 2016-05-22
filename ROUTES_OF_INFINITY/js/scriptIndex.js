window.addEventListener('load', inicio, false);

var r = 168;
var c = 0;
var control = false;

function inicio() {
    setInterval(rutasCreadas, 10);
}

function rutasCreadas() {
    document.getElementById("info").innerHTML = c + " rutas creadas.";
    if (c < r)
        c++;
}