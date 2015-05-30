function prikaziKomentare(id) {
	var ajax = new XMLHttpRequest();
	var komentariID = "v" + id.toString();
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var komentari = JSON.parse(ajax.responseText);
			komentari = komentari.komentari;
			if(document.getElementById(komentariID).innerHTML == "") {
				var i;
				for(i = 0; i < komentari.length; i++) {
					document.getElementById(komentariID).innerHTML += komentari[i].autor + ", " +
					komentari[i].vrijeme + "<br>" + komentari[i].tekst + "<br>";
				}
			}
			else document.getElementById(komentariID).innerHTML = "";
		}
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById(komentariID).innerHTML = "Greška!";
	}
	ajax.open("GET", "komentari.php?vijest=" + id, true);
	ajax.send();
}