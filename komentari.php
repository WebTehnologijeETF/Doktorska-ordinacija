<?php

$idvijesti = $_GET['vijest'];

$veza = new PDO('mysql:host=localhost;dbname=wt8;charset=utf8', 'wt8user', 'wt8pass');
$veza->exec("set names utf8");

$upit = $veza->prepare("SELECT * FROM komentar WHERE vijest=?");
$upit->bindValue(1, $idvijesti, PDO::PARAM_INT);
$upit->execute();

print "{ \"komentari\": " . json_encode($upit->fetchAll()) . "}";
?>