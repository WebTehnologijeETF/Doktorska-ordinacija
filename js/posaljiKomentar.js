var idVijesti = document.getElementById("vijest").value;
document.getElementById("form" + idVijesti).firstElementChild.addEventListener("onsubmit", posaljiKomentar);

function posaljiKomentar() {
    var ajax = new XMLHttpRequest();
    var autor = document.getElementById("autor").value;
    var mail = document.getElementById("mail").value;
    var komentar = document.getElementById("komentar").value;

    autor = encodeURIComponent(autor);
    mail = encodeURIComponent(mail);
    komentar = encodeURIComponent(komentar);

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("form" + idVijesti).innerHTML =
                    document.getElementById("form" + idVijesti).innerHTML + ajax.responseText;
        }
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("form" + idVijesti).innerHTML =
                    document.getElementById("form" + idVijesti).innerHTML + "Greška!";
    }
    ajax.open("GET", "php/dodajKomentar.php?vijest=" + idVijesti + "&autor=" + autor
            + "&komentar=" + komentar + "&mail=" + mail, true);
    ajax.send();
}