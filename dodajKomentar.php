<?php

$filtriranaVijest = filter_input(INPUT_GET, 'vijest', FILTER_SANITIZE_NUMBER_INT);
$filriraniKomentar = filter_input(INPUT_GET, 'komentar', FILTER_SANITIZE_STRING);
$filtriraniAutor = filter_input(INPUT_GET, 'autor', FILTER_SANITIZE_STRING);
$filtriraniMail = filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL);

$veza = new PDO("mysql:dbname=ordinacijaosmijeh;host=127.5.233.2;charset=utf8", "doktor", "doktorpass");
$veza->exec("set names utf8");
$rezultat = $veza->query("INSERT INTO komentar SET vijest='".$filtriranaVijest."',
tekst='".$filriraniKomentar."', mail='".$filtriraniMail."', autor='".$filtriraniAutor."'");

if (!$rezultat) {
    $greska = $veza->errorInfo();
    print "SQL greška: " . $greska[2];
    exit();
}
