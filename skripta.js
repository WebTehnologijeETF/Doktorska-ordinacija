document.getElementById("mail").addEventListener("blur", validirajMail);
document.getElementById("poruka").addEventListener("blur", validirajPoruku);
document.getElementById("2015").addEventListener("click", function() {
    pokaziMjesece("2015");
});
document.getElementById("2014").addEventListener("click", function() {
    pokaziMjesece("2014");
});

function validirajMail() {
    var mail = document.getElementById("mail"),
        greska_mail = document.getElementById("greska_mail"), regex = /.+\@.+\..+/;

    if (!regex.test(mail.value)) {
        greska_mail.style.visibility = "visible";
        mail.style.backgroundColor = "#FFCCCC";
    } else if (regex.test(mail.value)) {
        greska_mail.style.visibility = "hidden";
        mail.style.backgroundColor = "white";
    }
}

function validirajPoruku() {
    var poruka = document.getElementById("poruka");
    if (poruka.value == "") {
        greska_poruka.style.visibility = "visible";
    } else {
        greska_poruka.style.visibility = "hidden";
    }
}

function pokaziMjesece(node) {
    var godina = document.getElementById(node);
    if (godina.childElementCount == 0) {
        var mjeseci = ["Januar", "Februar", "Mart", "April", "Maj", "Juni",
            "Juli", "August", "Septembar", "Oktobar", "Novembar", "Decembar"],
			listaMjeseci = document.createElement("UL"), i;
        for (i = 0; i < 12; i++) {
            var mjesec = document.createElement("LI");
            mjesec.appendChild(document.createTextNode(mjeseci[i]));
            mjesec.id = i;
            mjesec.addEventListener("click", pokaziDane);
            listaMjeseci.appendChild(mjesec);
        }
        godina.appendChild(listaMjeseci);
    } else {
        //godina.removeChild(godina.firstElementChild);
    }
}

function pokaziDane(event) {
    var mjesec = event.target;
    if (mjesec.childElementCount == 0) {
        var dani = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        var listaDana = document.createElement("UL");
        for (var i = 1; i <= dani[mjesec.id]; i++) {
            var dan = document.createElement("LI");
            dan.appendChild(document.createTextNode(i));
            listaDana.appendChild(dan);
        }
        mjesec.appendChild(listaDana);
    } else {
        mjesec.removeChild(mjesec.firstElementChild);
    }
}