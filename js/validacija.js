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