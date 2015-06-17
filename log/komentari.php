<?php

$idvijesti = filter_input(INPUT_GET, 'vijest', FILTER_SANITIZE_NUMBER_INT);

$veza = new PDO('mysql:host=127.5.233.2;dbname=ordinacijaosmijeh;charset=utf8', 'doktor', 'doktorpass');
$veza->exec("set names utf8");

$upit = $veza->prepare("SELECT * FROM komentar WHERE vijest=?");
$upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
$upit->execute();

print "{ \"komentari\": " . json_encode($upit->fetchAll()) . "}";
