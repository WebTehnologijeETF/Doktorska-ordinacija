<?php
$elementiForme = array("ime"=>"", "mail"=>"", "poruka"=>"", "tel"=>"", "drzave"=>"", "subject"=>"");
$mailErr = $porukaErr = $telErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	foreach($elementiForme as $element_kljuc => $element_vrijednost) {
		if($element_kljuc == "mail") {
			if(empty($_POST[$element_kljuc])) 
				$mailErr = "Molimo, unesite Vaš e-mail.";
			else if(!filter_var(sredi($_POST["mail"]), FILTER_VALIDATE_EMAIL))
				$mailErr = "E-mail nije validan.";
		}
		else if($element_kljuc == "poruka")
				$porukaErr = "Molimo, unesite tekst poruke.";
		
		else $element_vrijednost = sredi($_POST[$element_kljuc]);
	}
}

function sredi($ulaz) {
  $ulaz = trim($ulaz);
  $ulaz = stripslashes($ulaz);
  $ulaz = htmlspecialchars($ulaz);
  return $ulaz;
}
?>