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