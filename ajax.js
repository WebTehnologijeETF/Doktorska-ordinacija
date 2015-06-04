function otvori_stranicu(stranica) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("glavni").innerHTML = ajax.responseText;
            klasa = stranica.slice(0, stranica.length - 4);
            document.getElementById("glavni").className = klasa;
            if (stranica == "kontakt.htm") {
                // document.getElementById("mail").addEventListener("blur", validirajMail);
                // document.getElementById("poruka").addEventListener("blur", validirajPoruku);
                document.getElementById("tel").addEventListener("blur", validirajTelefon);
                popuniDrzave();
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("glavni").innerHTML = "Greska: nepoznat URL";
    }
    ajax.open("GET", stranica, true);
    ajax.send();
}

function popuniDrzave() {
    var drzave = document.getElementById("drzave");
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var spisakDrzava = JSON.parse(ajax.responseText);
            for (var i = 0; i < spisakDrzava.length; i++) {
                var opcija = document.createElement("OPTION");
                var t = document.createTextNode(spisakDrzava[i].name);
                opcija.appendChild(t);
                drzave.appendChild(opcija);
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("greska_drzave").style.visibility = "visible";
        if (ajax.readyState == 4 && ajax.responseText == "")
            document.getElementById("greska_drzave").style.visibility = "visible";
    }
    ajax.open("GET", "https://restcountries.eu/rest/v1/all", true);
    ajax.send();
}

function validirajTelefon() {
    var tel = document.getElementById("tel");
    var greska_tel = document.getElementById("greska_tel");
    if (tel.value != "") {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var drzava = JSON.parse(ajax.responseText);
                var pozivniBrojevi = drzava[0].callingCodes;
                for (var i = 0; i < pozivniBrojevi.length; i++) {
                    if (tel.value.search(pozivniBrojevi[i]) == 0) {
                        greska_tel.style.visibility = "hidden";
                        tel.style.backgroundColor = "white";
                        break;
                    }
                    else {
                        tel.style.backgroundColor = "#FFCCCC";
                        greska_tel.style.visibility = "visible";
                    }
                }
            }
        }

        if (ajax.readyState == 4 && ajax.status == 404) {
            tel.style.backgroundColor = "#FFCCCC";
            greska_tel.style.visibility = "visible";
        }

        if (ajax.readyState == 4 && ajax.responseText == "") {
            tel.style.backgroundColor = "#FFCCCC";
            greska_tel.style.visibility = "visible";
        }

        ajax.open("GET", "https://restcountries.eu/rest/v1/name/" + document.getElementById("drzave").value, true);
        ajax.send();
    }

    else {
        greska_tel.style.visibility = "hidden";
        tel.style.backgroundColor = "white";
    }
}