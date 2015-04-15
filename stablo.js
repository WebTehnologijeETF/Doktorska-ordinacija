document.getElementById("2015").addEventListener("click", pokaziMjesece);
document.getElementById("2014").addEventListener("click", pokaziMjesece);

function pokaziMjesece(event) {
    var godina = event.currentTarget;
    if (godina.childElementCount == 0) {
		godina.innerHTML=godina.innerHTML.replace("+","-");
        var mjeseci = ["+ Januar", "+ Februar", "+ Mart", "+ April", "+ Maj", "+ Juni",
            "+ Juli", "+ August", "+ Septembar", "+ Oktobar", "+ Novembar", "+ Decembar"],
			listaMjeseci = document.createElement("UL"), i;
        for (i = 0; i < 12; i++) {
            var mjesec = document.createElement("LI");
            mjesec.appendChild(document.createTextNode(mjeseci[i]));
            mjesec.className = i;
            mjesec.addEventListener("click", pokaziDane);
            listaMjeseci.appendChild(mjesec);
        }
        godina.appendChild(listaMjeseci);
    } else {
        godina.removeChild(godina.firstElementChild);
		godina.innerHTML=godina.innerHTML.replace("-","+");
    }
}

function pokaziDane(event) {
	event.stopPropagation();
    var mjesec = event.currentTarget;
    if (mjesec.childElementCount == 0) {
		mjesec.innerHTML=mjesec.innerHTML.replace("+","-");
        var dani = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        var listaDana = document.createElement("UL");
        for (var i = 1; i <= dani[mjesec.className]; i++) {
            var dan = document.createElement("LI");
            dan.appendChild(document.createTextNode(i));
            listaDana.appendChild(dan);
        }
        mjesec.appendChild(listaDana);
    } else {
        mjesec.removeChild(mjesec.firstElementChild);
		mjesec.innerHTML=mjesec.innerHTML.replace("-","+");
    }
}