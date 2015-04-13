document.getElementById("mail").addEventListener("blur",validirajMail);
document.getElementById("poruka").addEventListener("blur",validirajPoruku);

function validiraj() {
	var ime=document.getElementById("ime"), mail=document.getElementById("mail"),
	subject=document.getElementById("subject"), poruka=document.getElementById("poruka"),
	greska_mail=document.getElementById("greska_mail");
	if(mail.value=="" || mail.value=="E-mail")
	{
		greska_mail.style.visibility="visible";
		mail.style.backgroundColor="#FFCCCC";
	}
	if(poruka.value=="")
	{
		greska_poruka.style.visibility="visible";
	}
}

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