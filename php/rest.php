<?php

function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}

function rest_get($request, $data) { //preuzimanje svih komentara na vijest
    $veza = new PDO('mysql:host=127.5.233.2;dbname=ordinacijaosmijeh;charset=utf8', 'doktor', 'doktorpass');
    $veza->exec("set names utf8");

    $upit = $veza->prepare("SELECT * FROM komentar WHERE vijest=?");
    $upit->bindValue(1, $data['vijest'], PDO::PARAM_INT);
    $upit->execute();

    print "{ \"komentari\": " . json_encode($upit->fetchAll()) . "}";
}

function rest_post($request, $data) { //dodavanje novog komentara
    $veza = new PDO("mysql:dbname=ordinacijaosmijeh;host=127.5.233.2;charset=utf8", "doktor", "doktorpass");
    $veza->exec("set names utf8");
    $rezultat = $veza->query("INSERT INTO komentar SET vijest='" . $data['vijest'] . "',
    tekst='" . $data['komentar'] . "', mail='" . $data['mail'] . "', autor='" . $data['autor'] . "'");

    if (!$rezultat) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
    }
}

function rest_delete($request) {
    
}

function rest_put($request, $data) { //ažuriranje postojećeg objekta
    
}

function rest_error($request) {
    
}

$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch ($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag();
        $data = $put_vars;
        rest_put($request, $data);
        break;
    case 'POST':
        zag();
        $data = $_POST;
        rest_post($request, $data);
        break;
    case 'GET':
        zag();
        $data = $_GET;
        rest_get($request, $data);
        break;
    case 'DELETE':
        zag();
        rest_delete($request);
        break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request);
        break;
}