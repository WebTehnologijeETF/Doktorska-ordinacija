<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Privatna ordinacija "Osmijeh"</TITLE>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="stil.css">
</HEAD>
<BODY>

<img class="logo" src="logo.png"></img>
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
<!--
<p>
	<h3>Novost #1</h3>
	autor 1, datum 1<br>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
	<i><a href="#">[Detaljnije]</a></i><br>
</p>
<p>
	<h3>Novost #2</h3>
	autor 2, datum 2<br>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
	<i><a href="#">[Detaljnije]</a></i><br>
</p>
<p>
	<h3>Novost #3</h3>
	autor 3, datum 3<br>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
	<i><a href="#">[Detaljnije]</a></i><br>
</p>
-->
</div>
<div class="stablo">
	<ul>
		<li id="2015">+ 2015
		<li id="2014">+ 2014
	</ul>
</div>
<script src="stablo.js"></script>
<script src="ajax.js"></script>
<script src="prikaziKomentareAjax.js"></script>
</BODY>
</HTML>