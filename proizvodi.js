var ime = document.getElementById("proizvod").value;
var slika = document.getElementById("slika").value;
var cijena = document.getElementById("cijena").value;
var opis = document.getElementById("opis").value;
var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {
	if (ajax.readyState == 4 && ajax.status == 200) {
		alert("Proizvod uspješno dodan!");
	}
	if (ajax.readyState == 4 && ajax.status == 400) {
		alert("Neispravni podaci.");
	}
}
ajax.open("POST", "http://zamger.etf.unsa.ba/wt/proizvodi.php?akcija=dodavanje?brindexa=16174", true);
//	ajax.setRequstHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("naziv=" + ime + "slika=" + slika + "cijena=" + cijena + "opis=" + "opis");
