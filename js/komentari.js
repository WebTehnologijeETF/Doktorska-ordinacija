function prikaziKomentare(id) {
    document.getElementById("buttonPosalji" + id.toString()).addEventListener("click", posaljiKomentar);
    var ajax = new XMLHttpRequest();
    var komentariID = "v" + id.toString();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var komentari = JSON.parse(ajax.responseText);
            komentari = komentari.komentari;
            if (document.getElementById(komentariID).innerHTML == "") {
                var i;
                for (i = 0; i < komentari.length; i++) {
                    if (komentari[i].mail == "")
                        document.getElementById(komentariID).innerHTML += "<small>" + komentari[i].autor + ", " +
                                komentari[i].vrijeme + "</small><br>" + komentari[i].tekst + "<br><br>";
                    else
                        document.getElementById(komentariID).innerHTML +=
                                "<small>" + "<a href=\"mailto:" + komentari[i].mail
                                + "\" target=\"_blank\">" + komentari[i].autor + "</a>, " +
                                komentari[i].vrijeme + "</small><br>" + komentari[i].tekst + "<br><br>";
                }
                document.getElementById("div" + id.toString()).style.display = "block";
            }
            else {
                document.getElementById(komentariID).innerHTML = "";
                document.getElementById("div" + id.toString()).style.display = "none";
            }
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById(komentariID).innerHTML = "Greška!";
    }
    ajax.open("GET", "php/rest.php?vijest=" + id, true);
    ajax.send();
}

function posaljiKomentar() {
    var ajax = new XMLHttpRequest();
    var autor = document.getElementById("autor").value;
    var mail = document.getElementById("mail").value;
    var komentar = document.getElementById("komentar").value;
    var idVijesti = document.getElementById("vijest").value;

    autor = encodeURIComponent(autor);
    mail = encodeURIComponent(mail);
    komentar = encodeURIComponent(komentar);

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("div" + idVijesti).innerHTML += "Komentar poslan";
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("div" + idVijesti).innerHTML += "Greška!";
    }
    ajax.open("POST", "php/rest.php", true);
    var podaci = "vijest=" + idVijesti + "&autor=" + autor + "&komentar=" + komentar + "&mail=" + mail;
    
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.setRequestHeader("Content-length", podaci.length);
    ajax.setRequestHeader("Connection", "close");
    
    ajax.send(podaci);
}
