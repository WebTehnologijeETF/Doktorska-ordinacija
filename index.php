<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Privatna ordinacija "Osmijeh"</TITLE>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="stil.css">
</HEAD>
<BODY>

<img class="logo" src="logo.png" alt="logo">
<h1>Privatna ordinacija "Osmijeh"</h1>

<div class="meni">
	<ul>
		<li onclick="otvori_stranicu('novosti.php')"><a>Naslovnica</a></li>
		<li onclick="otvori_stranicu('o_nama.htm')"><a>O nama</a></li>
		<li onclick="otvori_stranicu('info.htm')"><a>Informacije</a></li>
		<li onclick="otvori_stranicu('kontakt.htm')"><a>Kontakt</a></li>
		<li onclick="otvori_stranicu('proizvodi.htm')"><a>Proizvodi</a></li>
	</ul>
</div>

<div class="linkovi">
	<ul>
	  <li><a href="http://www.fda.gov/" target="_blank">Food and Drug Agency</a></li>
	  <li><a href="http://www.fmoh.gov.ba/" target="_blank">Federalno ministarstvo zdravstva</a></li>
	</ul>
</div>

<div id="glavni" class="novosti">
<?php include("novosti.php");?>
</div>
<div class="stablo">
	<ul>
		<li id="2015">+ 2015
		<li id="2014">+ 2014
	</ul>
</div>
<script type="text/javascript" src="stablo.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="prikaziKomentareAjax.js"></script>
</BODY>
</HTML>