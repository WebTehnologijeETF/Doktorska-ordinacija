function prikaziKomentare(id) {
    var ajax = new XMLHttpRequest();
    var komentariID = "v" + id.toString();
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var komentari = JSON.parse(ajax.responseText);
            komentari = komentari.komentari;
            if (document.getElementById(komentariID).innerHTML == "") {
                var i;
                for (i = 0; i < komentari.length; i++) {
                    document.getElementById(komentariID).innerHTML += "<small>" + komentari[i].autor + ", " +
                            komentari[i].vrijeme + "</small><br>" + komentari[i].tekst + "<br><br>";
                }
                document.getElementById("form" + id.toString()).style.display = "block";
            }
            else {
                document.getElementById(komentariID).innerHTML = "";
                document.getElementById("form" + id.toString()).style.display = "none";
            }                
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById(komentariID).innerHTML = "Greška!";
    }
    ajax.open("GET", "komentari.php?vijest=" + id, true);
    ajax.send();
}
