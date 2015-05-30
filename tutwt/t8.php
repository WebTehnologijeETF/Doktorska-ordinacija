<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 8, Uvod</title>
	</head>
	<body>
    <h1>Vijesti</h1>
    <?php
	$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass");
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
		print "<h1>".$vijest['naslov']."</h1>"." "."<p>".$vijest['tekst']."</p>"." "."<small>".$vijest['autor'].
		"</small>"." "."<small>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</small><br>";
		
		if($vijest['brKom'] == 0) print "<small>Nema komentara</small><br>";
		
		else if($vijest['brKom'] == 1) print '<small><a href="javascript:void(0)" onclick="prikaziKomentare('.$vijest['id'].')">'.$vijest['brKom'].' komentar</a></small><br>';
		
		else print '<small><a href="javascript:void(0)" onclick="prikaziKomentare('.$vijest['id'].')">'.$vijest['brKom']." komentara</a></small><br>";
		
		print '
			<span id="v'.$vijest['id'].'"></span>
			<form method="GET" action="t8.php">
			Vaše ime:<br>
			<input type="text" name="autor" id="autor"><br>
			<textarea rows="10" cols="30" name="komentar" id="komentar"></textarea><br>
			<input type="submit" name="buttonPosalji" value="Pošalji komentar">
			<input type="hidden" name="vijest" id="vijest" value = "'.$vijest['id'].'">
			</form>
		';
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
	<script src="prikaziKomentareAjax.js"></script>
  </body>
</html>