<?php
try{
	$VeritabaniBaglantisi 	= new PDO("mysql:host=localhost;dbname=sinirsiz-kategori;charset=UTF8", "root", "");
}catch(PDOException $HATA){
	die("Bağlantı Hatası: " . $HATA);
}

function Filtrele($Deger){
	$Bir 	= trim($Deger);
	$Iki 	= strip_tags($Bir);
	$Uc 	= htmlspecialchars($Iki, ENT_QUOTES);
	$Sonuc	= $Uc;
	return $Sonuc;
}
?>