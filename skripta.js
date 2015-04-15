document.getElementById("mail").addEventListener("blur", validirajMail);
document.getElementById("poruka").addEventListener("blur", validirajPoruku);
document.getElementById("2015").addEventListener("click", function() {stablo("2015");});
document.getElementById("2014").addEventListener("click", function() {stablo("2014");});

function validirajMail() {
	var mail=document.getElementById("mail"), greska_mail=document.getElementById("greska_mail");
	var regex = /.+\@.+\..+/;
	
	if(!regex.test(mail.value))
	{
		greska_mail.style.visibility="visible";
		mail.style.backgroundColor="#FFCCCC";
	}
	else if(regex.test(mail.value))
	{
		greska_mail.style.visibility="hidden";
		mail.style.backgroundColor="white";
	}
}

function validirajPoruku() {
	var poruka=document.getElementById("poruka");
	if(poruka.value=="") {
		greska_poruka.style.visibility="visible";
	}
	else {
		greska_poruka.style.visibility="hidden";
	}
}

function stablo(node) {
	var godina = document.getElementById(node);
	if(godina.childElementCount == 0) {
		var mjeseci=["Januar","Februar","Mart","April","Maj","Juni",
		"Juli","August","Septembar","Oktobar","Novembar","Decembar"];
		var listaMjeseci=document.createElement("UL");
		for(var i=0;i<12;i++) {
			var mjesec=document.createElement("LI");
			mjesec.appendChild(document.createTextNode(mjeseci[i]));
			listaMjeseci.appendChild(mjesec);
		}
		godina.appendChild(listaMjeseci);
	}
	else {
		godina.removeChild(godina.firstElementChild);
	}
}