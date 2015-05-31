var ajax = new XMLHttpRequest();
var komentariID = "v" + id.toString();
ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {

    }
    if (ajax.readyState == 4 && ajax.status == 404)
}
ajax.open("GET", "dodajKomentar.php", true);
ajax.send();
