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
    $rezultat = $veza->prepare("INSERT INTO komentar SET vijest=?, tekst=?, mail=?, autor=?");

    $rezultat->bindValue(1, $data['vijest'], PDO::PARAM_INT);
    $rezultat->bindValue(2, $data['komentar'], PDO::PARAM_STR);
    $rezultat->bindValue(3, $data['mail'], PDO::PARAM_STR);
    $rezultat->bindValue(4, $data['autor'], PDO::PARAM_STR);

    $rezultat->execute();

    if (!$rezultat) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
    }
}

function rest_delete($request) { //brisanje komentara
    $veza = new PDO("mysql:dbname=ordinacijaosmijeh;host=127.5.233.2;charset=utf8", "doktor", "doktorpass");
    $veza->exec("set names utf8");
    $komentarId = explode('=', $request, 2);
    $rezultat = $veza->prepare("delete from komentar where id=?");
    $rezultat->bindValue(1, $komentarId, PDO::PARAM_INT);
    if (!$rezultat) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
    }
}

function rest_put($request, $data) { //editovanje komentara
    $veza = new PDO("mysql:dbname=ordinacijaosmijeh;host=127.5.233.2;charset=utf8", "doktor", "doktorpass");
    $veza->exec("set names utf8");
    $rezultat = $veza->prepare("update komentar set tekst=? where id=?");

    $request->bindValue(1, $data['tekst'], PDO::PARAM_STR);
    $request->bindValue(2, $data['id'], PDO::PARAM_INT);

    if (!$rezultat) {
        $greska = $veza->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
    }
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
        $vijest = filter_input(INPUT_POST, 'vijest', FILTER_SANITIZE_NUMBER_INT);
        $komentar = filter_input(INPUT_POST, 'komentar', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
        $data = array('vijest' => $vijest, 'komentar' => $komentar, 'mail' => $mail, 'autor' => $autor);
        rest_post($request, $data);
        break;
    case 'GET':
        zag();
        $vijest = filter_input(INPUT_GET, 'vijest', FILTER_SANITIZE_NUMBER_INT);
        $data = array('vijest' => $vijest);
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