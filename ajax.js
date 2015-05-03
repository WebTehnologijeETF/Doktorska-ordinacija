function otvori_stranicu(stranica) {
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById("glavni").innerHTML = ajax.responseText;
			klasa = stranica.slice(0, stranica.length - 5);
			document.getElementById("glavni").className = klasa;
		}
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("glavni").innerHTML = "Greska: nepoznat URL";
	}
	ajax.open("GET", stranica, true);
	ajax.send();
}