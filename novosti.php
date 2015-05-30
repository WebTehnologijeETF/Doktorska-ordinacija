<?php
$veza = new PDO("mysql:dbname=ordinacijaosmijeh;host=%;charset=utf8", "doktor", "doktorpass");
$veza->exec("set names utf8");
$rezultat = $veza->query("select v.id, v.naslov, v.tekst,
						UNIX_TIMESTAMP(v.vrijeme) vrijeme2, v.autor, count(k.vijest) brKom 
						from vijest v left join komentar k on v.id=k.vijest
						group by v.id");
if (!$rezultat) {
	$greska = $veza->errorInfo();
	print "SQL greška: " . $greska[2];
	exit();
}
foreach ($rezultat as $vijest) {
	print "<p>";
	print "<h3>" . $vijest['naslov'] . "</h3>";
	print "<small>".$vijest['autor'] . ", " . date("d.m.Y. (h:i)", $vijest['vrijeme2']) . "</small><br>";
	print $vijest['tekst'] . "<br>";
	print '<i><a href="#">[Detaljnije]</a></i><br>';
	print "</p>";
	
	if($vijest['brKom'] == 0) print "<small>Nema komentara</small><br>";
	
	else if($vijest['brKom'] == 1) print '<small><a href="javascript:void(0)" onclick="prikaziKomentare('.$vijest['id'].')">'.$vijest['brKom'].' komentar</a></small><br>';
	
	else print '<small><a href="javascript:void(0)" onclick="prikaziKomentare('.$vijest['id'].')">'.$vijest['brKom']." komentara</a></small><br>";
	
	print '<span id="v'.$vijest['id'].'"></span>';
	
/*	print '		
		<form method="GET" action="t8.php">
		Vaše ime:<br>
		<input type="text" name="autor" id="autor"><br>
		Vaš mail:<br>
		<input type="text" name="mail" id="mail"><br>
		<textarea rows="10" cols="30" name="komentar" id="komentar"></textarea><br>
		<input type="submit" name="buttonPosalji" value="Pošalji komentar">
		<input type="hidden" name="vijest" id="vijest" value = "'.$vijest['id'].'">
		</form>
	';*/
}
if(isset($_REQUEST['vijest'])) {
	$rezultat = $veza->query("INSERT INTO komentar SET vijest='".$_REQUEST['vijest']."',
	tekst='".$_REQUEST['komentar']."', autor='".$_REQUEST['autor']."'");
	
	if (!$rezultat) {
		$greska = $veza->errorInfo();
		print "SQL greška: " . $greska[2];
		exit();
	}
}
?>